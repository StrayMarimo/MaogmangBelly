<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="/assets/logo.png" alt="logo" height="36"></a>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/products') ? 'active' : ''}}" href="/products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/catering') ? 'active' : ''}}" href="/catering">Catering</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/contact') ? 'active' : ''}}" href="/contact">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('/about') ? 'active' : ''}}" href="/about">About Us</a>
                </li>
                <li>
                    <form class="d-flex" action="/search" role="search">
                        <input class="form-control me-4 search-box" type="text" name="query" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <a class="dropdown-item" href="profile">
                            Profile
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

                @endguest
                <li class="nav-item">
                    <form action="/checkout_order">
                        @csrf
                        <button class="btn">Order({{$order_qty}})</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>