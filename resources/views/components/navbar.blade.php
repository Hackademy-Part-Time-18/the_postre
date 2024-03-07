{{--  --}}
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.html">Home</a></li>
            </ul>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
            @guest
            <li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href=" id=" navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"> Benvenuto Ospite </a>
                </li>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                    <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a>
                    </li>
                </ul>
                </li>
            @endguest
        </div>
    </div>
</nav>
