@extends('layouts.app')

@section('content')

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('uploads/logo/logo.png') }}"  class="d-inline-block align-top mr-2" width="50%" alt="logo"></a>
        </div>
        <div class="card">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="body">
                <p class="lead">Register</p>
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="form-group">
                        <label for="firstName" class="control-label sr-only">First Name</label>
                        <input type="text" name="first_name" class="form-control round @error('first_name') is-invalid @enderror" id="first_name" placeholder="First Name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus required>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="control-label sr-only">Last Name</label>
                        <input type="text" name="last_name" class="form-control round @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" value="{{ old('last_name') }}" autocomplete="last_name" required>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control round @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control round @error('password') is-invalid @enderror" id="password"  placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label sr-only">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control round @error('password_confirmation') is-invalid @enderror" id="password_confirmation"  placeholder="Confirm Passwowrd" required autocomplete="current-password">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">Register</button>
                    @if (Route::has('login'))
                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('login',['id'=> request()->query('id')]) }}">{{ __('Already have an account? please login') }}</a></span>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection

