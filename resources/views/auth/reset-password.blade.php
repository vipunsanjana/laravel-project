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
                <p class="lead">{{ __('Add new password') }}</p>
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('password.update') }}">
                @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control round @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email', $request->email) }}"  required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control round @error('password') is-invalid @enderror" id="password"  placeholder="Password" autofocus required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label sr-only">Password</label>
                        <input type="password" name="password_confirmation" class="form-control round @error('password_confirmation') is-invalid @enderror" id="password_confirmation"  placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-round btn-block">{{ __('Reset Password') }}</button>
                    
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection


