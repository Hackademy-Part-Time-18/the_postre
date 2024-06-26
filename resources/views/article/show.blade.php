<x-layout>
    <div class="bg-100"></div>
    <div class="container bg-whitecontainer-fluid p-5 text-center text-black">
        
        <div class="row justify-content-around border-05">
            <div class="col-12 col-md-8 bg-white border-05">
                <div class="">
                    <div class="row justify-content-center text-white">
                        <h1 class="mt-5 text-dark">
                            {{ $article->title }}
                        </h1>
                    </div>
                    <div class="mx-auto w-75 ">
                        <img src="{{ Storage::url($article->image) }}" alt="..." class="img-fluid my-3">
                    </div>
                    <div class="txt-center">
                        <h3> {{ $article->subtitle }}</h3>
                        <div class="my-3 text-muted fst-italic">
                            <p>{{ $article->category->name }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <p>{{ $article->body }}</p>
                <div class="card-footer text-muted d-flex justify-content-between align-items-center2 mb-3"> Redatto il
                    {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
                    <a href="{{ route('article.index') }}" class="btn btn-dark bg-message border-0 text-white">Tutti gli articoli</a>
                        <a href="{{ route('homepage') }}" class="btn btn-dark bg-message border-0 text-white">Torna alla Home</a>
                </div>
                <div class="d-flex justify-content-betweeen">
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <form action="{{ route('revisor.accept' , compact('article'))}}" method="post">
                            @csrf
                            <button class="btn btn-success mb-3 mx-1 text-white">Accetta articolo</button>
                        </form>
                        <form action="{{ route('revisor.reject' , compact('article'))}}" method="post">
                        @csrf
                        <button class="btn btn-danger  mb-3 mx-1 text-white">Rifiuta articolo</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
