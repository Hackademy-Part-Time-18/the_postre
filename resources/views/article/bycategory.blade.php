<x-layout>
    <div class="bg-100"></div>
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3 d-flex">
            {{-- create article card --}}
            @foreach ($articles as $article)
                <div class="col mb-4">
                    <x-card 
                    title="{{ $article->title }} " 
                    subtitle="{{ $article->subtitle }}"
                    image="{{ $article->image }}" 
                    category="{{ $article->category->name }}"
                    data="{{ $article->created_at->format('d/m/Y') }}" 
                    user="{{ $article->user->name }}"
                    url="{{ route('article.show', compact('article')) }}" 
                    />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>