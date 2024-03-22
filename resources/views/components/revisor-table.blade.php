<table class="table">

    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Scritto da</th>
            <th scope="col">Scritto il</th>
            <th scope="col">Leggi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($articles as $article)

        <tr>
            <th scope="row">{{ $article->id}}</th>
            <td>{{ $article->title}}</td>
            <td>{{ $article->category->name}}</td>
            <td>{{ $article->user->name}}</td>
            <td>{{ $article->created_at->format('Y-m-d') }}</td>
            <td>
                @if (is_null($article->is_accepted))
                <a href="{{ route('article.show', $article)}}" class="btn btn-primary">Leggi</a>
                @else
                <a href="{{ route('revisor.detail', $article)}}" class="btn btn-primary">Riporta in revisione</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>


</table>