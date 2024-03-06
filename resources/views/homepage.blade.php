<x-layout>
    <div>
        <div>
            <h1>The Postre</h1>
        </div>
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($article⇒img) }}" class="card-img-top" alt="{{ $article⇒title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article⇒title }}</h5>
                        <p class="card-text">{{ substr($article⇒description, 0, 20)}} </p>
                        <a href="{{ route('articles.category', $article⇒category) }}" class="card-text">{{ $article⇒category→name }}</a>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Leggi</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


</x-layout>