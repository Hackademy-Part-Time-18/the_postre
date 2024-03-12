<x-layout :navbar="false">
<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di amministratore</h2>
            <x-admin-requests-table :adminRequests="$adminRequests"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di revisore</h2>
            <x-revisor-requests-table :revisorRequests="$revisoreRequests"/>
        </div>
    </div>
</div>

<div class="container my-3">
    <div class="row">
        <div class="col-12">
            <h2>Richiesta di scrittore</h2>
            <x-writer-requesst-table :writerRequests="$writerRequests"/>
        </div>
    </div>
</div>

</x-layout>