@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                <div class="row">
                    <img class="col-lg-6 d-none d-lg-block" src="{{ asset('img/perpus (2).jpg') }}">
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="col-md-10">
                                <center><h1 class="h3 text-gray-900 mb-4">Welcome</h1><center>
                            </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-md-10">
                                            <input id="username" 
                                                type="username" 
                                                class="form-control @error('username') is-invalid @enderror" 
                                                placeholder="Username"
                                                name="username" 
                                                value="{{ old('username') }}" 
                                                required autocomplete="username" autofocus
                                                style="border-radius: 30px; height: 45px;">

                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">

                                        <div class="col-md-10">
                                            <input id="password" 
                                                type="password" 
                                                class="form-control @error('password') is-invalid @enderror" 
                                                placeholder="Password"
                                                name="password" 
                                                required autocomplete="current-password"
                                                style="border-radius: 30px; height: 45px;">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div style="margin-left: 1vh;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-10">
                                            <center><button type="submit" 
                                                class="btn btn-primary" 
                                                style="border-radius: 30px; width: 250px; height: 45px">
                                                {{ __('Login') }}
                                            </button><center>
                                            <hr>

                                            @if (Route::has('password.request'))
                                                <center><a href="{{ route('register') }}">
                                                    {{ __('Register') }}
                                                </a></center>
                                            @endif
                                        </div>
                                        <!-- <div class="col-md-10">
                                            <center><a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a></center>
                                        </div> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           </div>
    </div>
</div>
@endsection
