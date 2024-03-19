<x-layout>
<x-sidebar/>
@foreach($articles as $article)
<x-card :article="$article"/>
@endforeach
</x-layout>