<x-layout>
<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di amministratore</h2>
            <x-admin-requests-table :adminRequests="$adminRequests" role="amministratore"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di revisore</h2>
            <x-revisor-requests-table :revisorRequests="$revisoreRequests" role="revisore"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di scrittore</h2>
            <x-writer-request-table :writerRequests="$writerRequests" role="scrittore"/>
        </div>
    </div>
</div>

</x-layout>