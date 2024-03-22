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
        @if (request()->route()->getname() != 'user')
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav mx-auto align-items-start">

                    @auth
                    @if (Auth::user()->is_admin&&Auth::user()->is_revisor&&Auth::user()->is_writer)
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('work.with.us') }}">Lavora con noi</a></li>
                    @endif
                    @endauth
                    @if (request()->route()->getName() == 'homepage')
                        <li class="nav-item"><a class="nav-link" href="#recent">Recenti</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Chi siamo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contattaci</a></li>
                    @endif
                </ul>
                {{-- navbar (user login) --}}
                @if (request()->route()->getName() != 'register' && request()->route()->getName() != 'login')
                    <ul class="navbar-nav mx-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('article.create') }}" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Benvenuto {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" style="text-shadow:none;" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user') }}">Profilo</a>
                                    </li>
                                    @if (Auth::user()->is_admin)
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin
                                                dashboard</a></li>
                                    @endif
                                    @if (Auth::user()->is_revisor)
                                        <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Revisor
                                                dashboard</a></li>
                                    @endif
                                    @if (Auth::user()->is_writer)
                                    <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci articolo</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
                                    </li>
                                    <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endauth
                        {{-- navbar(user no login) --}}
                        @guest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"> Unete a noi </a>
                                <ul class="dropdown-menu mb-2" style="text-shadow:none;" aria-labelledby="navbarDropdown">
                                    <li><a id="btn-accedi" class="dropdown-item"
                                            href="{{ route('register') }}">Registrati</a>
                                    </li>
                                    <li><a id="btn-registrati" class="dropdown-item" href="{{ route('login') }}">Accedi</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                @endif
        @endif
        <div class="mx-auto col">
            <form action="{{ route('search.articles') }}" method="get" class="d-flex">
                <input class="form-control mx-2" name="key" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
    </div>
</nav>
