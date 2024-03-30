<x-layout>
    <div class="bg-100"></div>

<div class="container-fluid p-5 text-center text-white">
    <div class="row justify-content-center">
        <h1 class="display-1">
            Bentornato scrittore
        </h1>
    </div>
</div>

    {{-- message --}}
    @if (session('message'))
    <div class="alert alert-danger text-center"><i class="bi bi-exclamation-circle mx-1"></i>{{ session('message') }}
    </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success text-center"><i class="bi bi-check-circle mx-1"></i>{{ session('success') }}
    </div>
    @endif
<div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Articoli in fase di revisione</h2>
            <x-writer-articles-table :articles="$unrevisionedArticles"/>
        </div>
    </div>
</div>
<div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Articoli pubblicati</h2>
            <x-writer-articles-table :articles="$acceptedArticles"/>
        </div>
    </div>
</div>
<div class="container bg-white p-1 my-5" style="border-radius: 0.5em" >
    <div class="row justify-content-center">
        <div class="col-12">
            <h2>Articoli respinti</h2>
            <x-writer-articles-table :articles="$rejectedArticles"/>
        </div>
    </div>
</div>
</x-layout>