<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
  <div class="container col-12">
              <div class="container-fluid">
                <div>
                    <ul>

                    </ul>
                </div>
              </div>
      <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
              <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('homepage') }}">Home</a></li>
                {{-- navbar (user login) --}}
              @auth
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="{{route('article.create')}}" id="navbarDropdown" role="button"
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
                {{-- navbar(user no login) --}}
              @guest
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false"> Benvenuto Ospite </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                      <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                  </ul>
              @endguest
          </ul>
      </div>
      {{-- search bar --}}
      <div class="container-fluid mx-auto">
        <form class="d-flex input-group w-auto">
          <input
            type="search"
            class="form-control rounded"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="search-addon"
          />
          <span class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
          </span>
        </form>
      </div>
  </div>

</nav>

