<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link {{request()->is('/products') ? 'active' : ''}}" href="/products"><p class="{{request()->is('products') ? 'active' : ''}}">PRODUCTS</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/catering') ? 'active' : ''}}" href="/catering"><p class="{{request()->is('catering') ? 'active' : ''}}">CATERING</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/reservations') ? 'active' : ''}}" href="/reservations"><p class="{{request()->is('reservations') ? 'active' : ''}}">RERSERVATIONS</p></a>
      </li>
      <a class="navbar-brand {{request()->is('/') ? 'active' : ''}}" href="{{ url('/') }}">
        <img src="/assets/logo.png" alt="logo">
        <p>Maogmang</p>
        <p class="{{request()->url() == url('') ? 'active' : '' }} mx-2">Belly</p>
      </a>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/about') ? 'active' : ''}}" href="/about"><p class="{{request()->is('about') ? 'active' : ''}}">ABOUT</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/order') ? 'active' : ''}}" href="/order"><p class="{{request()->is('order') ? 'active' : ''}}">ORDER</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/login') ? 'active' : ''}}" href="/login"><p class="{{request()->is('login') ? 'active' : ''}}">LOGIN</p></a>
      </li>
    </ul>
  </div>
</nav>
<div style="height: 5vh" class="white"></div>