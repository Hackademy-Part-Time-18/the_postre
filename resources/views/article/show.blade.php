<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                {{$article->title}}
            </h1>
        </div>
    </div>
    <div>
        <div class="container my-5">
            <div class="row justify-content-around">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <img src="{{Storage::url($article->image)}}" alt="..." class="img-gluid my-3">
                        <div class="txt-center">
                            <h2> {{$article->subtitle}}</h2>
                            <div class="my-3 text-muted fst-italic">
                                <p>Redatto da{{$article->user->name}} il {{$article->created_at->format('d/m/Y')}} </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>{{$article->body}}</p>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center2"> Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}
                        <a href="{{route('article.index')}}" class="btn btn-info text-white">Torna indietro</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <x-layout />