<x-layout>
    @foreach ($articles as $article)
    <x-card title={{ $article->title }} 
        subtitle={{ $article->subtitle }}
        image={{ $article->image }}
        category={{ $article->category->name }}
         data={{ $article->created_at->format('d/m/Y') }}
        user={{ $article->user->name }}
         url="{{ route('article.show', compact('article')) }}" />
    @endforeach
</x-layout>