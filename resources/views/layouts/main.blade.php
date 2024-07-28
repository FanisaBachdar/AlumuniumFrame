<!doctype html>
<html lang="en">
  <head> <title>Alumunium Frame| {{ $title }}</title>
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="{{ asset('/css/font/bootstrap-icons.min.css') }}">
    {{-- My Style --}}
    <link rel="stylesheet" href="/css/style.css">
  </head>
  
  <body>
    @include('partials.navbar')
      <div class="container mt-4">
       @yield('container')
      </div>
     <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>