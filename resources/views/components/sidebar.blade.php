<div  class="sidebar close">
     <div class="header-sidebar">
        <div class="image-text">
            <span class="image">
                <i class="bi bi-person"></i>
            </span>

            <div class="text logo-text">
                <span class="name">{{ Auth::user()->name }}</span>
                <span class="profession">empleado</span>
            </div>
        </div>

        <i onclick="toggleSidebar()" class='bi bi-caret-right-fill toggle'></i>
    </div>

    <div onmouseover="toggleSidebar()" class="menu-bar">
        <div class="menu">

            <ul class="menu-links px-0">
                <li class="sidebar-link">
                    <a href="{{ route('homepage') }}">
                        <i class='bi bi-house icon' ></i>
                        <span class="text nav-text">Homepage</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-journal-plus icon' ></i>
                        <span class="text nav-text">Crea nuovo annuncio</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-cpu icon'></i>
                        <span class="text nav-text">Dashboard Admin</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-sunglasses icon' ></i>
                        <span class="text nav-text">Dashboard revisore</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-vector-pen icon' ></i>
                        <span class="text nav-text">Dashboard scrittore</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-bookmark-heart icon' ></i>
                        <span class="text nav-text">Like</span>
                    </a>
                </li>

                <li class="sidebar-link">
                    <a href="#">
                        <i class='bi bi-balloon-heart icon' ></i>
                        <span class="text nav-text">Messaggi di Ringraziamento</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="bottom-content">
            <li class="">
                <a href="#">
                    <i class='bi bi-box-arrow-left icon' ></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            {{-- <li class="mode">
                <div class="sun-moon">
                    <i class='bi bi-moon icon moon'></i>
                    <i class='bi bi-sun icon sun'></i>
                </div>
                <span class="mode-text text">Dark mode</span>

                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li> --}}

        </div>
    </div>

</div>
<script src="/js/sidebar.js"></script>