<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
      <div class="main-wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')
      </div>
      
      <div class="main-content">
        @yield('content')
      </div>

      @include('partials.js')
    </div>
</body>
</html>
