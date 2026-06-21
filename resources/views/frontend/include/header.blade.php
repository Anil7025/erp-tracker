@php
  $navItems = [
      'frontend.product' => 'Product',
      'frontend.features' => 'Features',
      'frontend.pricing' => 'Pricing',
      'frontend.about' => 'About',
      'frontend.contact' => 'Contact',
  ];
@endphp

<nav class="navbar navbar-expand-lg navbar-light site-navbar sticky-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('frontend.home') }}">
      <span class="brand-mark"><i class="fa-solid fa-layer-group"></i></span>
      InvFlow
    </a>
    <input class="nav-toggle" type="checkbox" id="mainNavToggle" aria-label="Toggle navigation">
    <label class="navbar-toggler" for="mainNavToggle" aria-controls="mainNav">
      <span class="navbar-toggler-icon"></span>
    </label>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        @foreach ($navItems as $routeName => $label)
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs($routeName) ? 'active' : '' }}" @if(request()->routeIs($routeName)) aria-current="page" @endif href="{{ route($routeName) }}">
              {{ $label }}
            </a>
          </li>
        @endforeach
      </ul>
      <div class="nav-auth">
        @auth
          <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-outline-primary btn-sm">Logout</button>
          </form>
        @else
          <a class="btn btn-outline-primary btn-sm {{ request()->routeIs('frontend.login') ? 'active' : '' }}" @if(request()->routeIs('frontend.login')) aria-current="page" @endif href="{{ route('frontend.login') }}">Login</a>
          <a class="btn btn-primary btn-sm {{ request()->routeIs('frontend.register') ? 'active' : '' }}" @if(request()->routeIs('frontend.register')) aria-current="page" @endif href="{{ route('frontend.register') }}">Sign Up</a>
        @endauth
      </div>
    </div>
  </div>
</nav>