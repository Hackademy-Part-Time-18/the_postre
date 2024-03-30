    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 @if (request()->route()->getname() == 'homepage') text-visibility @else navbar-shrink @endif"
        @if (request()->route()->getname() == 'homepage') id="mainNav"
    @else
    id="mainNav2" @endif>
        <div class=" container px-4 px-lg-5 ">
            <a class="navbar-brand" href="{{ route('homepage') }}"> ThePostre</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav mx-auto align-items-start">

                    @auth
                        @if (Auth::user()->is_admin && Auth::user()->is_revisor && Auth::user()->is_writer)
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('work.with.us') }}">Lavora con
                                    noi</a></li>
                        @endif
                    @endauth
                    @if (request()->route()->getName() == 'homepage')
                        <li class="nav-item"><a class="nav-link" href="#recent">Recenti</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Chi siamo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contattaci</a></li>
                    @endif
                </ul>

                {{-- search bar --}}
                <div class="mx-auto col">
                    <form action="{{ route('search.articles') }}" method="get" class="d-flex">
                        <input class="form-control mx-2 text-dark border border-dark" name="key" type="text"
                            placeholder="Cerca" aria-label="Search">
                        <button class="btn btn-dark bg-white btn-outline-dark search-btn" type="submit"><i
                                class="bi bi-search text-black"></i></button>
                    </form>
                </div>
                {{-- navbar (user login) --}}
                <ul class="navbar-nav mx-auto align-items-start">
                    @auth
                        <li class="nav-item"><div class="nav-link" href="">Benvenuto {{ Auth::user()->name }}
                            </div></li>
                        <li class="mx-auto">
                            <a class="btn btn-dark bg-message border-0" href="#"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                        </li>
                        <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                            @csrf
                        </form>
                    @endauth
                    {{-- navbar(user no login) --}}
                    @guest
                        <li class="mx-1"><a id="btn-accedi" class="btn btn-dark bg-message border-0"
                                href="{{ route('register') }}">Registrati</a>
                        </li>
                        <li class="mx-1"><a id="btn-registrati" class="btn btn-dark bg-message border-0"
                                href="{{ route('login') }}">Accedi</a>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
