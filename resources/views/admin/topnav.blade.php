<!-- Start Header/Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark custom-navbar" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Furni<span>.</span><span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                @guest
                    <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/user.svg') }}" alt="User">
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #3b5d50;">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit " class="dropdown-item ">
                                    Logout
                                </button>
                            </form>
                        </li>
                        @if (Auth::check() && Auth::user()->usertype == 'admin')
                            <li><a class="dropdown-item" href="{{ route('adminhome') }}">Admin Dashboard</a></li>
                        @endif
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
