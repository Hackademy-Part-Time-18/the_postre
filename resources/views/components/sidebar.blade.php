<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>

</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">The Postre</span>
            </a>
            <div class="nav_list">
                <a href="#" class="nav_link active">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">{{ Auth::user()->name }}</span>
                </a>
                <a class="nav_link" href="{{ route('article.create') }}">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name">Crea un articolo</span>
                </a>
                @if (Auth::user()->is_admin)
                <a class="nav_link" href="{{ route('admin.dashboard') }}">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="nav_name"> Admin dashboard </span>
                </a>
                @endif
                @if (Auth::user()->is_revisor)
                <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                    <i class='bx bx-bookmark nav_icon'></i>
                    @csrf
                </form>
                @endauth
            </div>
        </div>
    </nav>
</div>
<!--Container Main start-->
<div class="height-100 bg-light">
    <h4>Main Components</h4>
</div>
<!--Container Main end-->