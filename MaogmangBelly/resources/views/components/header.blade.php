<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link {{request()->is('/products') ? 'active' : ''}}" href="/products"><p class="active">PRODUCTS</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/catering') ? 'active' : ''}}" href="/catering"><p>CATERING</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/reservations') ? 'active' : ''}}" href="/reservations"><p>RERSERVATIONS</p></a>
      </li>
      <a class="navbar-brand {{request()->is('/catering') ? 'active' : ''}}" href="{{ url('/') }}">
        <img src="/assets/logo.png" alt="logo">
        <p>Maogmang</p>
        <p>Belly</p>
      </a>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/about') ? 'active' : ''}}" href="/about"><p>ABOUT</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/order') ? 'active' : ''}}" href="/order"><p>ORDER</p></a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{request()->is('/login') ? 'active' : ''}}" href="/login"><p>LOGIN</p></a>
      </li>
    </ul>
  </div>
</nav>