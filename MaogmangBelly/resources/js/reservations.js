$(document).ready(function () {
    $('#addToReservations').on('click', function (e) {
        e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value

        if (parseInt(inputVal) < 10) {
            $('#minRequiredToast .toast-body').text('Quantity must be at least 10');
            $('#minRequiredToast small').text('Reservations');
            $('#minRequiredToast').show();
        } else {
            $('#invalidQty').text('');
            $('#orderType').val('R');
            $('#availProductForm').submit();
        }
    });


    $('#checkoutReservationBtn').on('click', function (e) {
        let order_id = $(this).data('order-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '/order_count?id=' + order_id,
            method: 'GET',
            success: function (response) {
                if (response >= 5) {
                    $('#invalidReservationQuantity').hide();
                } else {
                    e.preventDefault();
                    $('#invalidReservationQuantity').html(
                        '<p>You should add at least 5 menu items'
                    );
                    // show the error message
                    $('#invalidReservationQuantity').show();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
