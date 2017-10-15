<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Company name</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left mr-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/shop">Shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">Contact</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('cart.shoppingCart')}}"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i> Shopping Cart <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQtyItems : ''}}</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? Auth::user()->name : "User Management"}}<span class="caret"></span></a>
          @if(Auth::check())
            <ul class="dropdown-menu">
              <li><a href="{{route('user.profile')}}">User Profile</a></li>
              <li><a href="{{route('products.index')}}">Products</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="{{route('logout')}}">Logout</a></li>
            </ul>
          @else
            <ul class="dropdown-menu">
              <li><a href="{{route('login')}}">Login</a></li>
              <li><a href="{{route('register')}}">Register</a></li>
            </ul>
          @endif
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>