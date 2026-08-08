<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Queries\Clients\ClientIndexQuery;
use App\Queries\Clients\ClientShowQuery;
use App\Queries\Clients\ClientStatsQuery;
use App\Services\Clients\ClientExcelExporter;

class ClientController extends Controller
{
    /**
     * List clients with filters and aggregated stats for index cards.
     */
    public function index()
    {
        $clients = (new ClientIndexQuery())->handle();
        $stats = (new ClientStatsQuery())->handle();

        return view('clients.index', compact('clients', 'stats'));
    }

    /**
     * Export the filtered clients list to an .xlsx file.
     */
    public function export(ClientExcelExporter $exporter)
    {
        return $exporter->download();
    }

    /**
     * Store a newly created client.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index')
            ->with('success', __('clients.created_successfully'));
    }

    /**
     * Display the specified client with related data.
     */
    public function show(Client $client)
    {
        $data = (new ClientShowQuery($client))->handle();

        return view('clients.show', [
            'client' => $client,
            ...$data,
        ]);
    }

    /**
     * Update the specified client.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        // if the request arrives from show, return to show
        if ($request->input('back') === 'show') {
            return redirect()->route('clients.show', $client)
                ->with('success', __('clients.updated_successfully'));
        }

        return redirect()->route('clients.index')
            ->with('success', __('clients.updated_successfully'));
    }

    /**
     * Soft delete the specified client.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', __('clients.deleted_successfully'));
    }

    /**
     * Restore a soft deleted client.
     */
    public function restore($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('trash.index')
            ->with('success', __('clients.restored_successfully'));
    }

    /**
     * Permanently delete a client.
     */
    public function forceDelete($id)
    {
        $client = Client::withTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('trash.index')
            ->with('success', __('clients.permanently_deleted'));
    }
}
