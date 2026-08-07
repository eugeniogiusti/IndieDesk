<?php

namespace App\Queries\Clients;

use App\Models\Client;
use App\Models\Cost;
use App\Models\Document;
use App\Models\Meeting;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Collection;

/**
 * Query for the client show page.
 *
 * Fetches the latest N entities linked to the client via their projects:
 * projects, tasks, meetings, payments, costs, documents.
 * Projects are loaded once and hydrated across all collections to prevent N+1 queries.
 */
class ClientShowQuery
{
    private Collection $projectIds;

    public function __construct(
        private Client $client,
        private int $limit = 5
    ) {
        // Include both directly-owned projects (client_id) and SaaS
        // projects this client is linked to via the client_project pivot.
        $this->projectIds = $client->projects()->pluck('id')
            ->merge($client->saasProjects()->pluck('projects.id'))
            ->unique()
            ->values();
    }

    public function handle(): array
    {
        $tasks     = $this->getTasks();
        $meetings  = $this->getMeetings();
        $payments  = $this->getPayments();
        $costs     = $this->getCosts();
        $documents = $this->getDocuments();

        $this->hydrateProjects([$tasks, $meetings, $payments, $costs, $documents]);

        // Set back-relation on taskDocuments so they don't lazy-load task->project
        foreach ($tasks as $task) {
            foreach ($task->taskDocuments as $doc) {
                $doc->setRelation('task', $task);
            }
        }

        return [
            'projects'  => $this->getProjects(),
            'tasks'     => $tasks,
            'meetings'  => $meetings,
            'payments'  => $payments,
            'costs'     => $costs,
            'documents' => $documents,
        ];
    }

    private function getProjects()
    {
        return Project::whereIn('id', $this->projectIds)
            ->latest()
            ->take($this->limit)
            ->get();
    }

    private function getTasks(): Collection
    {
        return Task::whereIn('project_id', $this->projectIds)
            ->with('taskDocuments')
            ->latest()
            ->take($this->limit)
            ->get();
    }

    private function getMeetings(): Collection
    {
        return Meeting::whereIn('project_id', $this->projectIds)
            ->latest('scheduled_at')
            ->take($this->limit)
            ->get();
    }

    private function getPayments(): Collection
    {
        return Payment::whereIn('project_id', $this->projectIds)
            ->latest('paid_at')
            ->take($this->limit)
            ->get();
    }

    private function getCosts(): Collection
    {
        return Cost::whereIn('project_id', $this->projectIds)
            ->latest('paid_at')
            ->take($this->limit)
            ->get();
    }

    private function getDocuments(): Collection
    {
        return Document::whereIn('project_id', $this->projectIds)
            ->latest('uploaded_at')
            ->take($this->limit)
            ->get();
    }

    private function hydrateProjects(array $lists): void
    {
        $projectIds = collect($lists)
            ->flatMap(fn(Collection $items) => $items->pluck('project_id'))
            ->filter()
            ->unique()
            ->values();

        if ($projectIds->isEmpty()) {
            return;
        }

        $projects = Project::select('id', 'name')
            ->whereIn('id', $projectIds)
            ->get()
            ->keyBy('id');

        foreach ($lists as $items) {
            foreach ($items as $item) {
                if ($item->project_id && isset($projects[$item->project_id])) {
                    $item->setRelation('project', $projects[$item->project_id]);
                }
            }
        }
    }
}
