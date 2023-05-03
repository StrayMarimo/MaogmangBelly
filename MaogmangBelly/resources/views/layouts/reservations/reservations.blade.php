@extends('layouts.app')
@section('content')
reservations page
<div class="container-fluid reservationbg">
    <div class="card" id="reservecard">
    <div>
        <div class="text-center" id="checkout_reservations">
            <h1>Your Reservation</h1>
            <div class="row g-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" aria-label="First name">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                </div>
            </div>
        </div>
        <h5>Delivery Option</h5>
        <select class="form-select" aria-label="Default select example">
            <option selected>Select an option</option>
            <option value="1">Pickup</option>
            <option value="2">Delivery</option>
        </select>
            <div>
                <label for="date">Choose a date:</label>
                <input type="date" id="date" name="date">

                <label for="time">Choose a time:</label>
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

        <h5>Products</h5>
        <div class="input-group">
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
            <option selected>Choose...</option>
            <option value="1">Saging</option>
            <option value="2">Nyoging</option>
            <option value="3">Banaging</option>
        </select>
        <button class="btn btn-outline-secondary" type="button">Add</button>
        </div>
    </div>

    <h5>Selected Products</h5>
    <ul class="list-group">
        <li class="list-group-item">Saging</li>
        <li class="list-group-item">Nyoging</li>
    </ul>
    <h5>Comment</h5>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
    </div>
    <input class="btn btn-primary" type="submit" value="Submit">
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