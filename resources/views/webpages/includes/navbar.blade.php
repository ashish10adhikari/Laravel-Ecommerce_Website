<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Furni<span>.</span><span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                </li>
                <li class="nav-item {{ request()->is('aboutus') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('aboutus') }}">About us</a>
                </li>
                <li class="nav-item {{ request()->is('services') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('services') }}">Services</a>
                </li>

                <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                </li>

                @guest
                    <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth
                <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/user.svg') }}" alt="User">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #3b5d50;">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                            @if (Auth::check() && Auth::user()->usertype == 'admin')
                                <a class="dropdown-item" href="{{ route('adminhome') }}">Admin Dashboard</a>
                            @endif
                        </div>
                    </div>
                </li>
                
                    <li><a class="nav-link" href="{{ route('cart') }}"><img src="{{ asset('images/cart.svg') }}">[0]</a>
                    </li>
                @endauth
            </ul>


        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
