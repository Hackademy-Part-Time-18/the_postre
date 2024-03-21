<x-layout>
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3">
            {{-- create article card --}}
            @foreach($articles as $article)
            <x-card title={{ $article->title }} 
                subtitle={{ $article->subtitle }}
                image={{ $article->image }}
                category={{ $article->category->name }}
                 data={{ $article->created_at->format('d/m/Y') }}
                user={{ $article->user->name }}
                 url="{{ route('article.show', compact('article')) }}" />
            @endforeach
        </div>
    </div>
</x-layout>