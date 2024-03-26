<x-layout>


    {{-- header --}}
    {{-- <div class=" bg-header"></div> --}}
    <header class="mb-5 header-home">
        <ul class=' slider'>
            @foreach ($mostViewedArticles as $article)
            <li class='item ' style="background-image: url('{{ Storage::url($article->image) }}')">
                <div class='content'>
                    <h2 class='title'>{{ $article->title }}</h2>
                    <p class='description'>{{ $article->subtitle }}
                    </p>
                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-dark bg-message text-white border-0" style="text-shadow:none;">Continua a
                        leggere</a>
                </div>
            </li>
            @endforeach
        </ul>
        <nav class='nav-header'>
            <i id="header-btn-left" class="btn prev bi bi-caret-left-square-fill text-white" style="font-size: 2.5rem;" name="arrow-back-outline"></i>
            <i id="header-btn-right" class="btn next bi bi-caret-right-square-fill text-white" style="font-size: 2.5rem;" name="arrow-forward-outline"></i>
        </nav>
    </header>



    {{-- message --}}
    @if (session('message'))
    <div class="alert alert-success text-center"><i class="bi bi-exclamation-circle mx-1"></i>{{ session('message') }}
    </div>
    @endif
    {{-- section navigate  --}}
    <x-btn-nav />


    {{-- Recent Article; Articoli recenti --}}
    <div id="recent" class="container my-2">
        <div class="row justify-content-center">
            {{-- Create article cards --}}
            <div class="col-md-8">
                <div class="row">
                    <h3>Articoli Recenti</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
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
            {{-- Create carousels for most viewed articles by category --}}
            <div class="col-md-4">
                <div class="row">
                    <h3>Categorie più Ricercate</h3>
                </div>
                @foreach ($mostViewedArticlesByCategory as $category => $articles)
                <div class="mb-1">
                    <h4 class="link-secondary">{{ $articles->first()->category->name }}</h4>
                    <div id="{{ $articles->first()->category->name }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($articles as $key => $article)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <a href="">
                                    <img src="{{ Storage::url($article->image) }}" class="d-block w-100" style="height: 200px; object-fit: cover;" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>{{ $article->title }}</h5>
                                        <p>{{ $article->subtitle }}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#{{ $articles->first()->category->name }}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#{{ $articles->first()->category->name }}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Conosci il mondo-->

    {{-- Create carousels for most viewed articles by category --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="custCarousel" class="carousel slide align-items-center" data-ride="carousel">
                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.imgur.com/weXVL8M.jpg" alt="Hills">
                        </div>

                        <div class="carousel-item">
                            <img src="https://i.imgur.com/Rpxx6wU.jpg" alt="Hills">
                        </div>

                        <div class="carousel-item">
                            <img src="https://i.imgur.com/83fandJ.jpg" alt="Hills">
                        </div>

                        <div class="carousel-item">
                            <img src="https://i.imgur.com/JiQ9Ppv.jpg" alt="Hills">
                        </div>
                    </div>

                    <!-- Left right -->
                    <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#custCarousel" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                    <!-- Thumbnails -->
                    <ol class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel">
                                <img src="https://i.imgur.com/weXVL8M.jpg" class="img-fluid">
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel">
                                <img src="https://i.imgur.com/Rpxx6wU.jpg" class="img-fluid">
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel">
                                <img src="https://i.imgur.com/83fandJ.jpg" class="img-fluid">
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel">
                                <img src="https://i.imgur.com/JiQ9Ppv.jpg" class="img-fluid">
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Come nasce "ThePostre" ?</h2>
                    <hr>
                    <p class="text-white-75 mb-4">
                        The_Postre racconta l'esperienza collaborativa tra Maelo, Luca e Nicolò, che dopo un incontro fortuito, hanno unito le proprie competenze per concepire un progetto di eccellenza. Attraverso una sinergia di passioni e competenze nel campo della tecnologia, del design e della scrittura, abbiamo dedicato impegno e creatività per sviluppare una piattaforma unica. Il risultato è stato un sito web che offre agli utenti una vasta gamma di articoli, notizie e racconti coinvolgenti. Questa esperienza dimostra come individui con differenti background possano convergere verso un obiettivo comune e realizzare progetti di straordinaria rilevanza lavorando insieme.
                    </p>
                        <a class="btn btn-light btn-xl" href="#recent">Dai un occhiata ai nostri ultimi articoli!</a>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Restiamo in contatto!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Hai qualche suggerimento o vuoi contactarci</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">

                    <form action="{{ route('send') }}" method="POST">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input value="{{ old('name') }}" required name="name" class="form-control" id="name" placeholder="Nome" type="text" />
                            <label for="name">Nome</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" value="{{ old('email') }}" required name="email" />
                            <label for="email">Email</label>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" value="{{ old('phone') }}" name="phone" />
                            <label for="phone">Cellulare</label>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" name="message"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
            {{-- <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-5 mb-lg-0">
                    <i class="bi-phone fs-2 mb-3 text-muted"></i>
                    <div>+1 (555) 123-4567</div>
                </div>
            </div> --}}
        </div>
    </section>
</x-layout>