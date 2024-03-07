<x-layout>
    <div>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">A Free Bootstrap Business Theme</span>
                <span class="site-heading-lower">Business Casual</span>
            </h1>
        </header>
     
    <p>
            @foreach($articles as $article)
        <div class="card" style="width: 18rem;">
            <img src="{{Storage::url($article->img) }}" class="card-img-top" alt="{{ $article->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $article->title }}</h5>
                <p class="card-text">{{ substr($article->description, 0, 20)}}</p>
                <a href="{{ route('articles.category', $article->category) }}" class="card-text">{{ $article->category→name }}</a>
                <a href="{{ route('articles.show', $article) }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @endforeach
    </p>

    </div>
</x-layout>