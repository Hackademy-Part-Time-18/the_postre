<x-layout>
    <div class="bg-100"></div>

    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Bentornato amministratore
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
    {{-- section navigate  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta ruolo amministratore</h2>
                <x-request-table :roleRequests="$adminRequests" role="amminnistratore" />
            </div>
        </div>
    </div>
    <div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta ruolo revisore</h2>
                <x-request-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>
    <div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta ruolo scrittore</h2>
                <x-request-table :roleRequests="$writerRequests" role="scrittore" />
            </div>
        </div>
    </div>
    <div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metainfo-table :metaInfo="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container bg-white p-1 my-5" style="border-radius: 0.5em">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Le categorie della piattaforma</h2>
                <x-metainfo-table :metaInfo="$categories" metaType="categories" />
                <form action="{{ route('admin.storeCategory') }}" class="d-flex" method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control me-2"
                        placeholder="Inserisci una nuova categoria">
                    <button type="submit" class="btn btn-success text-white">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
