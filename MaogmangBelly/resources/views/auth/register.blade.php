@extends('layouts.app')

@section('content')
<div class="signing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-auto">
                <div class="card" style="border-radius: 12px;">
                    <div class="mt-5 text-center">
                        <p>Please sign up to continue</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="name" type="text"
                                    class="boxbox form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="floatingInput">Name</label>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="email" type="email"
                                    class="boxbox form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                <label for="floatingInput">Email</label>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="password" type="password"
                                    class="boxbox form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                                <label for="floatingInput">Password</label>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-box form-floating mb-3 col-md-auto">
                                <input id="password-confirm" type="password" class="boxbox form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <label for="floatingInput">Confirm Password</label>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-auto">
                                    <button type="submit" class="red-btn btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
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