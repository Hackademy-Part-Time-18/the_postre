<x-layout>
    <div class="bg-100"></div>
    <div class="container bg-whitecontainer-fluid p-5 text-center text-black">
        <div class="row justify-content-center text-white">
            <h1 class="display-1">
                {{ $article->title }}
            </h1>
        </div>
        <div class="row justify-content-around border-05">
            <div class="col-12 col-md-8 bg-white border-05">
                <div class="">
                    <div class="mx-1 w-100">
                        <img src="{{ Storage::url($article->image) }}" alt="..." class="img-fluid my-3">
                    </div>
                    <div class="txt-center">
                        <h2> {{ $article->subtitle }}</h2>
                        <div class="my-3 text-muted fst-italic">
                            <p>Redatto da{{ $article->user->name }} il {{ $article->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                </div>
                <hr>
                <p>{{ $article->body }}</p>
                <div class="card-footer text-muted d-flex justify-content-between align-items-center2 mb-3"> Redatto il
                    {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
                    <a href="{{ route('article.index') }}" class="btn btn-dark bg-message border-0 text-white">Torna
                        indietro</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
