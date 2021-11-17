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
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif
            <div class="body">
                <div class="mb-4 text-sm" >
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>
        
                
                <form class="form-auth-small m-t-20" method="POST" action="{{ route('verification.send') }}">
                @csrf
                    
                    <button type="submit" class="btn btn-primary btn-round btn-block">{{ __('Resend Verification Email') }}</button>
                </form>
                @if (Route::has('logout'))
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class=" btn btn-primary" style="margin-top: 20px">{{ __('logout') }}</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection


