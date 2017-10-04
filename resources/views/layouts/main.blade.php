<!DOCTYPE html>
<html lang="en">

  <head>
    @include('partials._head')
  </head>

  <body>

    <div class="container"><!-- start of div.container -->
      @yield('content')
    </div><!-- end of div.container -->
    
    @include('partials._javascript')
    
  </body>
</html>