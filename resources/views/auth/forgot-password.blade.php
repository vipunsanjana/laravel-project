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
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="body">
                <div class="mb-4 text-sm" >
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="control-label sr-only">Email</label>
                    <input type="email" name="email" class="form-control round @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" autofocus required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    
                    <button type="submit" class="btn btn-primary btn-round btn-block">{{ __('Email Password Reset Link') }}</button>
                </form>

                <a href="/" class="btn btn-primary btn-round btn-block" style="margin-top: 15px"> Back to login</a>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection



