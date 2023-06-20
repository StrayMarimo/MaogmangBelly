@extends('layouts.app')
@section('content')
    <div class="container" style="font-family: 'Lexend';">
        <h5 class="mb-1"> Name: </h5> {{ Auth::User()->name }} <br><br>
        <h5 class="mb-1"> Email: </h5> {{ Auth::User()->email }}
        @if (Auth::User()->email_verified_at == null)
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" style="border-radius: 30px; background-color: #74c23d; color: white; border-style: none; width: 10vw">{{ __('Verify Email')
                    }}</button>
            </form>
     
        @endif
        @if(Auth::User()->is_admin)
       <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="{{route('orders.index')}}" class="btn btn-danger px-4 py-2" style="border-radius: 30px;">See All Customer's Purchases</a>
        </div>
        @else 
        <div style="margin-top: 10vh" class="d-flex justify-content-center">
            <a href="{{route('orders.index')}}" class="btn btn-danger px-4 py-2">See My Purchases</a>
        </div>
        @endif
        <div class="">
            @if (Auth::User()->is_admin == 1)
                <h5> Newsletter Message: </h5>
                <form action="admin_mail">
                    @csrf
                    <textarea class="contact-box-2 form-control my-2 mb-3" name="message_admin" placeholder="Insert Message Here..."rows="5"></textarea>
                    <div class="form-group row justify-content-center mx-2 mb-3">
                        <button type="submit" class="contact-box contact-red btn btn-danger">Send to Customers</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
