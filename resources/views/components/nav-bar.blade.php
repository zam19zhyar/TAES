<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-black" href="/">TAES</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item text-white">
            <a class="nav-link" href="/">Home</a>
        </li>
    </ul>
    @auth
    <span class="navbar-text">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{auth()->user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </span>
    @endauth
</nav>
