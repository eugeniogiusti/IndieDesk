<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreClientFollowupRequest;
use App\Http\Requests\Clients\UpdateClientFollowupRequest;
use App\Models\Client;
use App\Models\ClientFollowup;

class ClientFollowupController extends Controller
{
    /**
     * Store a new follow-up for the given client.
     */
    public function store(StoreClientFollowupRequest $request, Client $client)
    {
        $client->followups()->create($request->validated());

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.created'));
    }

    /**
     * Update an existing client follow-up.
     */
    public function update(UpdateClientFollowupRequest $request, Client $client, ClientFollowup $followup)
    {
        $followup->update($request->validated());

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.updated'));
    }

    /**
     * Delete a client follow-up.
     */
    public function destroy(Client $client, ClientFollowup $followup)
    {
        $followup->delete();

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.deleted'));
    }

    /**
     * Toggle the completed state of a client follow-up.
     */
    public function toggleComplete(Client $client, ClientFollowup $followup)
    {
        $followup->update(['completed' => !$followup->completed]);

        return redirect()->route('clients.show', $client)->with('success', __('clients.followup.updated'));
    }
}
