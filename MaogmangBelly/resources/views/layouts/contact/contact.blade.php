@extends('layouts.app')
@section('content')
<div class="contactbg">
    <div class="row">
        <div class="col">
            <div class="text-center">
                <h1>CONTACT US</h1>
                <p>We're here to help! If you have any questions, concerns or feedback about our products or services,
                    please don't hesitate to get in touch. Our friendly customer support team is available to assist you in
                    any way we can. Simply fill out the form, or reach out to us via phone. We appreciate your business and
                    look
                    forward to hearing from you!</p>
            </div>
            <div class="row m-5">
                <div class="col-8 mx-auto">
                    <i class="bs bi-telephone-fill"></i> (+63) - 9069420143 <br />
                    <i class="bs bi-geo-alt">Bagumbayan Sur, Naga City, Camarines Sur</i>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container px-5 mx-5">
                <div class="row">
                    <div class="col-10">
                        <form action="mail_contactus">
                            @csrf
                            <input type="text" class="form-control my-2" name="name_user" placeholder="Name">
                            <input type="email" class="form-control my-2" name="email_user" placeholder="Email">
                            <input type="text" class="form-control my-2" name="number_user" placeholder="Contact Number">
                            <textarea class="form-control my-2" name="message_user" placeholder="Message"rows="5"></textarea>
                            <div class="form-group row justify-content-center mx-2">
                                <button type="submit" class="btn btn-danger">Contact Us Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection