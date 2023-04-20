@extends('layouts.app')

@section('content')
<div class="signing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <div class="card auth" style="border-radius: 12px;">
                    <div class="mt-5 text-center">
                        <p>Please log in to continue</p>
                    </div>
                    <div class="card-body auth">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="email" type="email"
                                    class="boxbox form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="password" type="password"
                                    class="boxbox form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="check-box form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>

                                        <!-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif -->
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-auto">
                                    <button type="submit" class="red-btn btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <p>or login using</p>
                            </div>
                            <div class="google col-md-auto justify-content-center">
                                <a href="{{ url('auth/google') }}">
                                    <img src="/assets/google.png" alt="logo">
                                </a>
                            </div>
                            <div class="mt-3 text-center">
                                <p>Don't have an account?</p>
                            </div>
                            <div class="mt-2 text-center">
                                <a href="/register">
                                    <h6>Sign up</h6>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection