<x-layout>
<x-sidebar/>
@foreach($articles as $article)
<x-card image="https://picsum.photos/200/300"
:title="$article->title"/>
@endforeach
</x-layout>