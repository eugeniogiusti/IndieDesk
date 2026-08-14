<div class="space-y-6">

    {{-- Navigazione mese --}}
    @include('timesheets.partials._nav', $showData)

    {{-- Avviso tariffa non impostata --}}
    @if(! $project->hourly_rate && $project->type === 'client_work')
        @include('timesheets.partials._no-rate-warning')
    @endif

    {{-- Form mensile: griglia + note + riepilogo --}}
    @include('timesheets.partials._form', $showData)

    {{-- Storico mesi salvati --}}
    @if($showData['timesheetMonths']->count() > 0)
        @include('timesheets.partials._history', $showData)
    @endif

</div>
