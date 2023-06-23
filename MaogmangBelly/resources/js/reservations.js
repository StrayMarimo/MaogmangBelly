import * as utils from './utils.js';
$(document).ready(function () {
    // handle clicks on adding reservation service on details page
    $('#addToReservations').on('click', function (e) {
        e.preventDefault();
        let inputVal = $('#availProductQuantity').val(); // get input value
        if (parseInt(inputVal) < 10)
            utils.showToaster('Quantity must be at least 10', 'Reservations');
        else {
            $('#invalidQty').text('');
            $('#orderType').val('R');
            $('#availProductForm').submit();
        }
    });

    // Handle clicks on buy reservation btn
    $('#confirmReservationBtn').on('click', function (e) {
        e.preventDefault();
        if (
            $('#reservationAddress #address').val().trim() !== '' &&
            $('#reservationDate #date').val() !== ''
        ) {
            let date = $('#reservationDate #date').val().toString();
            let getAvailability = utils.ajaxParams('/available_date?date=' + date, 'GET');
            (getAvailability.success = function (response) {
                if (response == 0) $('#confirmReservation').modal('show');
                else
                    utils.showToaster(
                        'Date is already taken',
                        'Reservation Booking Date'
                    );
            }),
                $.ajax(getAvailability);
        } else utils.showToaster('Address and Date are required', 'Reservations');
    });
    
    // handle clicks on confirm reservation btn modal
    $('#checkoutReservationBtn').on('click', function (e) {
        let order_id = $(this).data('order-id');
        e.preventDefault();

        let getOrderCount = utils.ajaxParams('/order_count?id=' + order_id, 'GET');
        getOrderCount.success = function (response) {
            if (response >= 5) $('#checkoutReservationForm').submit();
            else {
                $('#confirmReservation').modal('hide');
                utils.showToaster(
                    'You should have at least 5 menu items',
                    'Reservations'
                );
            }
        };
        $.ajax(getOrderCount);
    });
});
