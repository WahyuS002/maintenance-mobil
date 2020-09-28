@extends('layouts.auth')

@section('content')

<!-- ############ LAYOUT START-->
<div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Driver Login
      </div>
      <form method="POST" action="{{ route('driver.login.submit') }}">
        @csrf
        <div class="md-form-group float-label">
            <input id="nik" type="nik" ng-model="user.email" class="md-input form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

            <label for="nik">{{ __('NIK') }}</label>

            @error('nik')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="md-form-group float-label">
            <input id="password" type="password" ng-model="user.password" class="md-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            <label for="password">{{ __('Password') }}</label>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="m-b-md">
            <label class="md-check" for="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i class="primary"></i> Keep me signed in
            </label>
        </div>
            <button type="submit" class="btn primary btn-block p-x-md">
                {{ __('Sign in') }}
            </button>

            {{-- @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif             --}}
      </form>
    </div>

    <div class="p-v-lg text-center">
      <div class="m-b"><a ui-sref="access.forgot-password" href="{{ route('password.request') }}" class="text-primary _600">Forgot password?</a></div>
        <div>Do not have an account? <a ui-sref="access.signup" href="{{ route('register') }}" class="text-primary _600">Sign up</a></div>
    </div>
  </div>

<!-- ############ LAYOUT END-->
@endsection
