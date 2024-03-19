<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-message" id="mainNav">
    <div class=" container px-4 px-lg-5 ">
        <a class="navbar-brand" href="{{ route('homepage') }}"> ThePostre</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if ( request()->route()->getName() != 'user')
        <div class="collapse navbar-collapse " id="navbarResponsive">
            <ul class="navbar-nav mx-auto align-items-start">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</a>
                    <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li><a id="btn-registrati" class="dropdown-item" href="{{ route('articles.category',$category->name)}}">{{ $category['name'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @auth
                @if (auth()->user()->is_writer != 1 && auth()->user()->is_revisor != 1 && auth()->user()->is_admin != 1)
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
                    <a class="nav-link dropdown-toggle" href="{{ route('article.create') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('user') }}">Profilo</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisciarticolo</a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Benvenuto Ospite </a>
                    <ul class="dropdown-menu mb-2" aria-labelledby="navbarDropdown">
                        <li><a id="btn-accedi" class="dropdown-item" href="{{ route('register') }}">Registrati</a>
                        </li>
                        <li><a id="btn-registrati" class="dropdown-item" href="{{ route('login') }}">Accedi</a>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
            @endif

            <div class="mx-auto">
                <form action="{{route('search.articles')}}" method="get" class="d-flex">
                    <input class="form-control me-2" name="key" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
            @endif
        </div>
    </div>
</nav>