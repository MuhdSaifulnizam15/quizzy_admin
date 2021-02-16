@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
  <section class="section">
    <div class="section-header">
      <h1>My Profile</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::check() ? Str::words(Auth::user()->name, 2, '...') : 'user' }}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        
    </div>
  </section>
@endsection
