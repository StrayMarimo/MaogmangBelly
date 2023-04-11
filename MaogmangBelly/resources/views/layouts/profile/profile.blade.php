@extends('layouts.app')
@section("content")
<div class="container">
    {{Auth::User()->name}} <br>
   {{Auth::User()->email}}

   @if (Auth::User()->email_verified_at==null)
        <button onclick="Auth::routes(['verify' => true]);">Verify email</button>
   @endif
</div>
@endsection