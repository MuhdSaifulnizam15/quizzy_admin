<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') &dash; {{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('vendors/template/dist/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendors/template/dist/modules/fontawesome/css/all.min.css')}}">

<!-- CSS Libraries -->
@yield('additional_css')

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('vendors/template/dist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/template/dist/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/template/dist/css/custom.css') }}">
