<x-layout>
    <div class="bg-100"></div>
    <div class="container-fluid p-5 text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                {{ $user->name }}
            </h1>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
    
                                <div class="col-md-5">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div>
                                                @if ( $user->profile_image == NULL)
                                                <i class="bi bi-person-circle"></i>
                                                @else
                                                <img src="{{ Storage::url($user->profile_image) }}"
                                                class="img-lg rounded-circle mb-4" style="height: 150px; width:150px" alt="profile image">                                                @endif
                                                <h4 class="primary-text">{{ $user->name }}</h4>
                                                <p class="text-muted mb-0">Utente
                                                    @if ($user->is_admin)
                                                        <span>Admin</span>
                                                    @endif
                                                    @if ($user->is_writer)
                                                        <span>Scrittore</span>
                                                    @endif
                                                    @if ($user->is_revisor)
                                                        <span>Revisore</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <p class="mt-2 card-text">
                                                @if ($user->description == NULL)
                                                Senza Descrizione
                                                @else
                                                {{ $user->description }}
                                                @endif
                                            </p>
                                            <p class="mt-2 card-text">
                                                {{ $user->email }}
                                            </p>
                                            <p class="mt-2 card-text text-secondary">
                                                {{ $user->date_of_birth }}
                                            </p>
                                            {{-- <div class="border-top pt-3">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <h6>4354</h6>
                                                        <p>Post</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>455K</h6>
                                                        <p>Followers</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <h6>34K</h6>
                                                        <p>Likes</p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3 d-flex">
            {{-- create article card --}}
            @foreach ($articles as $article)
            <div class="col mb-2">
                <x-card :title="$article->title " :subtitle="$article->subtitle"
                    :image="$article->image" :category="$article->category->id"
                    :data="$article->created_at->format('d/m/Y')" :user="$article->user->id"
                    :url="route('article.show', compact('article'))" :nameCategory="$article->category->name"
                    :nameUser="$article->user->name" :readDuration="$article->readDuration()"
                    :tags="$article->tags"
                />
            </div>
        @endforeach
            </div>
    </div>
</x-layout>
