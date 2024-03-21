<x-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <x-sidebar/>
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