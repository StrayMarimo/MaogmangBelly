@extends('layouts.app')
@section('content')
    <div class="container">
        {{ Auth::User()->name }} <br>
        {{ Auth::User()->email }}
        @if(Auth::User()->is_admin)
       <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="{{route('get_orders')}}" class="btn btn-danger px-4 py-2">See All Customer's Purchases</a>
        </div>
        @else 
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="{{route('get_orders')}}" class="btn btn-danger px-4 py-2">See My Purchases</a>
        </div>
        @endif
        @if (Auth::User()->email_verified_at == null)
            <button onclick="Auth::routes(['verify' => true]);">Verify email</button>
        @endif
        <div class="">
            @if (Auth::User()->is_admin == 1)
                <form action="admin_mail">
                    @csrf
                    <textarea class="contact-box-2 form-control my-2 mb-3" name="message_admin" placeholder="Message"rows="5"></textarea>
                    <div class="form-group row justify-content-center mx-2 mb-3">
                        <button type="submit" class="contact-box contact-red btn btn-danger">Send to Customers</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
