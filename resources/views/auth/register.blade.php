@extends('layouts.master')

@section('content')
<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <img class="col-lg-6 d-none d-lg-block" src="{{ asset('img/perpus.jpg') }}">
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="col-md-10">
                        <center><h1 class="h3 text-gray-900 mb-4">Create an Account!</h1></center>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-10">
                                <input id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Name"
                                    name="name" value="{{ old('name') }}" 
                                    required autocomplete="name" autofocus
                                    style="border-radius: 30px; height: 45px;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-10">
                                <input id="username" 
                                    type="username" 
                                    class="form-control @error('username') is-invalid @enderror" 
                                    placeholder="Username"
                                    name="username" 
                                    value="{{ old('username') }}" 
                                    required autocomplete="username"
                                    style="border-radius: 30px; height: 45px;">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-5 mb-3 mb-sm-0">
                                <input id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Password" 
                                    name="password" 
                                    required autocomplete="new-password"
                                    style="border-radius: 30px; height: 45px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-sm-5">
                                <input id="password-confirm" 
                                    type="password" 
                                    class="form-control" 
                                    placeholder="Password Confirm"
                                    name="password_confirmation" 
                                    required autocomplete="new-password"
                                    style="border-radius: 30px; height: 45px;">
                            </div>
                        </div><br>

                        <div class="row mb-0">
                            <div class="col-md-10">
                                <center><button type="submit" 
                                    class="btn btn-primary"
                                    style="border-radius: 30px; width: 250px; height: 45px">
                                    {{ __('Register') }}
                                </button></center><br>
                            </div><hr>
                            <div class="col-md-10">
                                <center>
                                    <a href="{{ route('login') }}">{{ __('Already have an account? Login!') }}</a>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
