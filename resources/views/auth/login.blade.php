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
                <p class="lead">Login to your account</p>
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group">
                        <label for="email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control round @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}" autocomplete="email" autofocus required>
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
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                        <input type="checkbox"  name="remember"  id="remember_me" value="{{ old('remember') ? 'checked' : '' }}">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <input type="hidden"  name="invite_id"  id="invite_id" value="{{ request()->query('id'); }}">
                    <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                    @if (Route::has('password.request'))
                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></span>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-user"></i> <a href="{{ route('register',['id'=> request()->query('id')]) }}">{{ __('Register') }}</a></span>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection

