@extends('layouts.app')
@section('content')
<div class="container-fluid contactbg justify-content-center">
    <div class="row mx-5 w-80">
        <div class="col">
            <div class="text-center">
                <h1 class="contact-title">CONTACT US</h1>
                <p class="contact-caption"> We're here to help! If you have any questions, <br> 
                    concerns or feedback about our products or services, <br>
                    please don't hesitate to get in touch. <br>
                    Our friendly customer support team is available to assist you <br>
                    in any way we can. Simply fill out the form, or reach out to us via phone. <br>
                    We appreciate your business and look forward to hearing from you!</p>
            </div>
            <div class="row m-5">
                <div class="contact-caption col-8 mx-auto">
                    <i class="bs bi-telephone-fill"></i>&nbsp&nbsp (+63) - 9069420143 <br />
                    <i class="bs bi-geo-alt"></i>&nbsp&nbsp Bagumbayan Sur, Naga City, Camarines Sur
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mx-5">
                <div class="col-10">
                    <form action="mail_contactus">
                        @csrf
                        <input type="text" class="contact-box form-control my-2 mb-3 mt-0" name="name_user" placeholder="Name">
                        <input type="email" class="contact-box form-control my-2 mb-3" name="email_user" placeholder="Email">
                        <input type="text" class="contact-box form-control my-2 mb-3" name="number_user" placeholder="Contact Number">
                        <textarea class="contact-box-2 form-control my-2 mb-3" name="message_user" placeholder="Message"rows="5"></textarea>
                        <div class="form-group row justify-content-center mx-2 mb-3">
                            <button type="submit" class="contact-box contact-red btn btn-danger">Contact Us Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection