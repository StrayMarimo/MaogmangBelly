<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav  mx-auto">
      <li class="nav-item">
        <a class="nav-link {{request()->is('/products') ? 'active' : ''}}" href="{{route('products')}}">
          <p class="{{request()->is('products') ? 'active' : ''}}">PRODUCTS</p>
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
        <img src="{{Vite::image('logo.png')}}" alt="logo">
        <p>Maogmang</p>
        <p class="{{request()->url() == url('') ? 'active' : '' }} mx-2">Belly</p>
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
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
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
<div style="height: 5vh" class="white"></div>