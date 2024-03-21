<<<<<<< HEAD
    <div class="card h-100 w-100">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text">{{ $subtitle }}</p>
            <p class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</p>
            @if ($tags)
                <p class="small fst-italic text-capitalize">
                    @foreach ($tags as $tag)
                        #{{ $tag->name }}

                    @endforeach
                </p>
            @endif
        </div>
        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
            Redatto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
            <a href="{{ route('article.show', compact('article')) }}"
                class="btn btn-dark bg-message text-white border-0">Leggi</a>
        </div>
=======
<div class="card h-100 w-100">
    <img src="{{ $image }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $subtitle }}</p>
        <p class="small text-muted fst-italic text-capitalize">{{ $category }}</p>
>>>>>>> ee676aea487a2058760ce17d2dabf7a3389c69c9
    </div>
    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
        Redatto il {{ $data }} da {{ $user }}
        <a href="{{ $url }}"
            class="btn btn-dark bg-message text-white border-0">Leggi</a>
    </div>
</div>
