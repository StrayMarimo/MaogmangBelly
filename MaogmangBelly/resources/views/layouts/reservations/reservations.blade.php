@extends('layouts.app')
@section('content')
<div class="container-fluid reservationbg">
    <div class="card" id="reservecard">
    <div>
        <div class="text-center" id="checkout_reservations">
            <h1 class="contact-title" style="color: white">Reservation</h1>
        </div>
        <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Name</h5>
            <div class="row g-3">
                <div class="col" style="font-family: 'Franklin Gothic Medium';">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col" style="font-family: 'Franklin Gothic Medium';">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                </div>
            </div>
        <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Delivery Option</h5>
        <select class="form-select" aria-label="Default select example" style="font-family: 'Franklin Gothic Medium';">
            <option selected style="font-family: 'Franklin Gothic Medium';">Select an option</option>
            <option value="1">Pickup</option>
            <option value="2">Delivery</option>
        </select>
            <div class="mt-2 mb-2">
                <label for="date" style="color: white; font-family: 'Lexend';">Choose a date:</label>
                <input type="date" id="date" name="date">

                <label for="time" style="color: white; font-family: 'Lexend';">Choose a time:</label>
                <input type="time" id="time" name="time">
            </div>

            <!-- <script>
            const dateInput = document.getElementById("date");
            const timeInput = document.getElementById("time");

            // Add event listeners to both inputs
            dateInput.addEventListener("input", updateDateTime);
            timeInput.addEventListener("input", updateDateTime);

            // Function to update the output
            function updateDateTime() {
                const selectedDate = dateInput.value;
                const selectedTime = timeInput.value;
                console.log(`You selected ${selectedDate} at ${selectedTime}`);
            }
            </script> -->

        <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Products</h5>
        <div class="input-group">
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" style="font-family: 'Franklin Gothic Medium';">
            <option selected>Choose...</option>
            <option value="1">Saging</option>
            <option value="2">Nyoging</option>
            <option value="3">Banaging</option>
        </select>
        <button class="contact-red btn btn-outline-secondary" style="color: white; border: 2px solid #A72322;" type="button">Add</button>
        </div>
    </div>

    <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Selected Products</h5>
    <ul class="list-group" style="font-family: 'Franklin Gothic Medium';">
        <li class="list-group-item">Saging</li>
        <li class="list-group-item">Nyoging</li>
    </ul>
    <h5 class="mt-3 mb-2" style="color: white; font-family: 'Lexend';">Comment</h5>
    <div class="form-floating">
        <textarea class="form-control mb-3" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2" style="font-family: 'Franklin Gothic Medium';">Comments</label>
    </div>
    <input class="contact-red btn btn-primary" style="border: 2px solid #A72322; color: white; font-family: 'Lexend';" type="submit" value="Submit">
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function(){
        @if($scroll)
        setTimeout(() => {
            $('html, body').animate({
            scrollTop: $('#checkout_reservations').offset().top
            }, 'slow');
        }, 500);
        @endif
    })
</script>
@endsection