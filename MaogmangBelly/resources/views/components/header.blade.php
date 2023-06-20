<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item search">
        <form class="d-flex justify-content-middle h-100" action="{{ route('search') }}" role="search" id="form-search">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1" style="background-color: black; border:none;"><button class="btn" type="submit"><i class="bi bi-search" style="color: white"></i></button></span>
          </div>
          <input type="text" class="form-control search-box" style="background-color: black; border: none; border-bottom:#c1272d 2px solid" name="query" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
        </div>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/product.index') ? 'active' : ''}}" href="{{route('product.index')}}">
          <p class="{{request()->is('product.index') ? 'active' : ''}}">PRODUCTS</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/catering') ? 'active' : ''}}" href="{{route('catering')}}">
          <p class="{{request()->is('catering') ? 'active' : ''}}">CATERING</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/reservations') ? 'active' : ''}}" href="{{route('reservations')}}">
          <p class="{{request()->is('reservations') ? 'active' : ''}}">RERSERVATIONS</p>
        </a>
      </li>
      <a class="navbar-brand {{request()->is('/') ? 'active' : ''}}" href="{{ url('/') }}">
        <img src="{{Vite::image('logo.png')}}" alt="logo" width="80px">
        <p>Maogmang</p>
        <p class="{{request()->url() == url('') ? 'active' : '' }} mx-3">Belly</p>
      </a>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/about') ? 'active' : ''}}" href="{{route('about')}}">
          <p class=" {{request()->is('about') ? 'active' : ''}}">ABOUT</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/order') ? 'active' : ''}}" href="{{route('order')}}">
          <p class=" {{request()->is('order') ? 'active' : ''}}">ORDER</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/contact') ? 'active' : ''}}" href="{{route('contact')}}">
          <p class=" {{request()->is('contact') ? 'active' : ''}}">CONTACT US</p>
        </a>
      </li>
      @guest
      @if (Route::has('login'))
      <li class="nav-item login">
        <a class="nav-link {{request()->is('/login') ? 'active' : ''}}" href="{{route('login')}}" id="signingLink"> 
          <p class="{{request()->is('login') ? 'active' : ''}}">LOGIN</p>
        </a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown login">
        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre style="font-size:0.5 rem;">
          {{ Auth::user()->first_name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-up" aria-labelledby="navbarDropdown">
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
    </ul>
  </div>
  </div>
</nav>
<div style="height: 3vh" class="white"></div>