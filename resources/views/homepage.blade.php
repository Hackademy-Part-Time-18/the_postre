<x-layout>

    {{-- <div style="height: 5000px"> --}}

    {{-- header --}}
    <header class="masthead justify-content-center" name="page-top">
        <div class="row gx-4 gx-lg-6 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Il tuo posto preferito per sapere la vita degli altri</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">!!Tutto lo sapiamo!!</p>
                <a class="btn btn-primary btn-xl" href="{{ route('article.index') }}">Tutti gli articoli</a>
            </div>
        </div>
    </header>


    {{-- message --}}
    @if (session('message'))
        <div class="alert alert-success bg-message text-center"><i
                class="bi bi-exclamation-circle mx-1"></i>{{ session('message') }}
        </div>
    @endif

    {{-- Recent Article  ; Articoli recenti --}}
    <div id="recent" class="container my-2">
        <div class="row justify-content-around row-cols-1 row-cols-md-3">
            {{-- create article card --}}
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

    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">abbiamo cio che ti serve!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur,
                        veniam sint. Laborum error vitae, adipisci, atque harum quidem, sed quae quasi expedita
                        provident iste quos maxime fugiat iusto nulla voluptatum!</p>
                    <a class="btn btn-light btn-xl" href="#recent">Andiamo!</a>
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
                            <input value="{{ old('name') }}" required name="name" class="form-control"
                                id="name" placeholder="Enter your name..." type="text" />
                            <label for="name">Nome</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com"
                                value="{{ old('email') }}" required name="email" />
                            <label for="email">Email</label>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890"
                                value="{{ old('phone') }}" name="phone" />
                            <label for="phone">Cellulare</label>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..."
                                style="height: 10rem" name="message"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>

                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton"
                                type="submit">Submit</button></div>
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
