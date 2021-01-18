<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body>
    <div id="app">
      <section class="section">
        <div class="container mt-5">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </section>

      @include('partials.footer')
      @include('partials.js')
    </div>
</body>
</html>

<!-- 
  @if(session()->has('info'))
  <div class="alert alert-primary">
      {{ session()->get('info') }}
  </div>
  @endif
  @if(session()->has('status'))
  <div class="alert alert-info">
      {{ session()->get('status') }}
  </div>
  @endif 
-->