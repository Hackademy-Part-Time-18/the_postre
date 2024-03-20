<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">

        <div class="row justify-content-center">
            <h1 class="display-1 text-capitalize">
                user {{ $user->name }}
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
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
