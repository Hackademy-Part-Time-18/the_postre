<div>
    <div class="card h-100 w-100">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->subtitle }}</p>
            <p class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</p>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
            Redatto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}
            <a href="{{ route('article.show', compact('article')) }}"
                class="btn btn-dark bg-message text-white border-0">Leggi</a>
        </div>
    </div>
</div>