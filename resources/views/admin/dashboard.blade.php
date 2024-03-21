<x-layout>
<div class="container-fluid p-5 bg-info text-center text-white">
    <div class="row justify-content-center">
        <h1 class="display-1">
            Bentornato amministratore
        </h1>
    </div>
</div>

@if (session('message'))
    <div class="alert alert-success text-center">
        {{ session('message')}}
    </div>
@endif
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richiesta ruolo amministratore</h2>
            <x-request-table :roleRequests="$adminRequests" role="amminnistratore"/>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richiesta ruolo revisore</h2>
            <x-request-table :roleRequests="$revisorRequests" role="revisore"/>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Richiesta ruolo scrittore</h2>
            <x-request-table :roleRequests="$writerRequests" role="scrittore"/>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>I tags della piattaforma</h2>
            <x-metainfo-table :metaInfo="$tags" metaType="tags"/>
        </div>
    </div>
</div>
</x-layout>