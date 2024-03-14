<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class=" container px-4 px-lg-5 ">
        <a class="navbar-brand" href="{{ route('homepage') }}">ThePostre</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">{{ asset('favicon.ico') }}</span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav mx-auto align-items-start">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    @if (request()->route()->getName() == 'homepage'||request()->route()->getName() == 'work.with.us')
                        data-bs-toggle="dropdown" aria-expanded="false">Categoria</a>
                    <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                                <li><a id="btn-registrati" class="dropdown-item"
                                        href="">{{ $category['name'] }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @if (request()->route()->getName() == 'homepage'||request()->route()->getName() == 'work.with.us')
                    @auth
                        
                    <li class="nav-item"><a class="nav-link" href="{{ route('work.with.us') }}">Lavora con noi</a>
                    </li>
                    @endauth
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Portfolio</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                @endif
            </ul>
            <ul class="navbar-nav mx-auto">
                {{-- navbar (user login) --}}
                @if (request()->route()->getName() != 'register' && request()->route()->getName() != 'login')
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('article.create') }}" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Benvenuto {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="">Profilo</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci
                                        articolo</a>
                                </li>
                                <li><a class="dropdown-item" href="#"
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
                                data-bs-toggle="dropdown" aria-expanded="false"> Benvenuto Ospite </a>
                            <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                                <li><a id="btn-accedi" class="dropdown-item" href="{{ route('register') }}">Registrati</a>
                                </li>
                                <li><a id="btn-registrati" class="dropdown-item" href="{{ route('login') }}">Accedi</a>
                                </li>
                            </ul>
                        </li>
                    @endguest
                @endif
            </ul>
            <div class="mx-auto">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</nav>
