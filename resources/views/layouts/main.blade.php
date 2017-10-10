<!DOCTYPE html>
<html lang="en">

  <head>

    @include('partials._head')

  </head>

  <body>

    @include('partials._navbar')

    <div class="container"><!-- start of div.container -->

      @include('partials._messages')

      @if(Auth::check())
        <p>Logged in</p>
      @else
        <p>Logged out</p>
      @endif
      @yield('content')

    </div><!-- end of div.container -->
    
    @include('partials._javascript')

    @include('partials._footer')
    
  </body>
  
</html>