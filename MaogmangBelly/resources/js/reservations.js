$(document).ready(function () {
    // Handle clicks on the Confirmation button
    $('#confirmReservationBtn').on('click', function (e) {
        if ($('#reservationAddress #address').val().trim() !== '' && $('#reservationDate #date').val() !== ''){
            $('#confirmReservation').modal('show');
        } else {
              $('#minRequiredToast .toast-body').text('Address and Date are required');
              $('#minRequiredToast small').text('Reservations');
              $('#minRequiredToast').show();
              $('#minRequiredToast').delay(2000).fadeOut('slow');
        }
        e.preventDefault();
       
    });

    $('#addToReservations').on('click', function (e) {
        e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value

        if (parseInt(inputVal) < 10) {
            $('#minRequiredToast .toast-body').text('Quantity must be at least 10');
            $('#minRequiredToast small').text('Reservations');
            $('#minRequiredToast').show();
             $('#minRequiredToast').delay(2000).fadeOut('slow');
        } else {
            $('#invalidQty').text('');
            $('#orderType').val('R');
            $('#availProductForm').submit();
        }
    });


    $('#checkoutReservationBtn').on('click', function (e) {

        let order_id = $(this).data('order-id');
         e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '/order_count?id=' + order_id,
            method: 'GET',
            success: function (response) {
                if (response >= 5) {
                    $('#checkoutReservationForm').submit();
                } else {
                     $('#confirmReservation').modal('hide');
                    $('#minRequiredToast .toast-body').text(
                        'You should have at least 5 menu items'
                    );
                    $('#minRequiredToast small').text('Reservations');
                    $('#minRequiredToast').show();
                     $('#minRequiredToast').delay(2000).fadeOut('slow');
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
