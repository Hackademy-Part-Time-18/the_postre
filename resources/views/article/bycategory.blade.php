<x-layout>
    <div class="bg-100"></div>
    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                {{ $category->name }}
            </h1>
        </div>
    </div>
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3 d-flex">
            {{-- create article card --}}
            @foreach ($articles as $article)
            <div class="col mb-2">
                <x-card title="{{ $article->title }} " subtitle="{{ $article->subtitle }}"
                    image="{{ $article->image }}" category="{{ $article->category->id }}"
                    data="{{ $article->created_at->format('d/m/Y') }}" user="{{ $article->user->id }}"
                    url="{{ route('article.show', compact('article')) }}" nameCategory="{{ $article->category->name }}"
                    nameUser="{{ $article->user->name }}"
                />
            </div>
        @endforeach
        </div>
    </div>
</x-layout>