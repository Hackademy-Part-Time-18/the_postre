<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class=" container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('navbar') }}">ThePostre</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-content-between" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('article.create') }}">article</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
            <ul class="navbar-nav mx-auto">
                {{-- navbar (user login) --}}
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('article.create') }}">Inserisci articolo</a></li>
                        </ul>
                    @endguest
            </ul>
            <div class="container px-4 px-lg-5">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"
                            style="border: orange !important;"></i></button>
                </form>
            </div>
        </div>
</nav>
{{--     public function navbar($url = null) {
        $urlPath = parse_url(url()->previous(), PHP_URL_PATH); // Ottieni il percorso dell'URL precedente
    
        // Verifica se l'URL precedente contiene un hash, come /#example
        if (strpos($urlPath, '#') !== false) {
            return redirect()->to('#page-top');
        }
    
        // Se l'URL attuale è / o /homepage o nessun valore è stato fornito
        if ($url === '/' || $url === 'homepage' || $url === null) {
            return redirect()->to('#page-top');
        } else {
            return redirect()->route('homepage');
        }
    }    
    
 --}}
