@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- ############ LAYOUT START-->
<div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
        Admin Login
      </div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="md-form-group float-label">
            <input id="email" type="email" ng-model="user.email" class="md-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            <label for="email">{{ __('E-Mail Address') }}</label>         

            @error('email')
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
