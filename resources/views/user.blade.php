<x-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <x-sidebar/>
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3 d-flex">
            {{-- create article card --}}
            <div class="col-md-8">
                <div class="row">
                    <h3>Articoli Recenti</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
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
        </div>
    </div>
</x-layout>