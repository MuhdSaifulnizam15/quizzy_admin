@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="login-brand">
        <img src="{{ asset('assets/img/quizzy.png') }}" alt="logo" width="80" class="shadow-light rounded-circle p-1">
        </div>
        <div class="card card-primary">
            <div class="card-header"><h4>Register</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}"  class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                        
                        @error('name')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                        @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password-confirm" class="d-block">Password Confirmation</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                        <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-muted text-center">
            Already have an account? <a href="{{ route('login') }}">Sign In Here</a>
        </div>

        <div class="simple-footer">
            Copyright &copy; {{ config('app.name') }} {{ date('Y') }}
            <div class="bullet"></div> 
            All Rights Reserved
        </div>
    </div>
@endsection