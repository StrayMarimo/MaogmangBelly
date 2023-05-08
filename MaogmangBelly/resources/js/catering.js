$(document).ready(function () {
    // Handle clicks on the Confirmation button
    $('#buyCateringBtn').on('click', function (e) {
        e.preventDefault();
        $('#confirmCheckoutCatering').modal('show');
    });

    $('#minRequiredToast button').on('click', function(){
         $('#minRequiredToast').hide();
    }); 
    $('#addToCatering').on('click', function (e) {
        e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value

        if (parseInt(inputVal) < 50) {
            $('#minRequiredToast .toast-body').text( 'Quantity must be at least 50');
            $('#minRequiredToast small').text('Catering');   
            $('#minRequiredToast').show();
             $('#minRequiredToast').delay(2000).fadeOut('slow');
        } else {
            $('#orderType').val('C');
            $('#availProductForm').submit();
        }
    });

    $('#checkoutCateringBtn').on('click', function (e) {
        console.log('shdjka');
        e.preventDefault();
        let order_id = $(this).data('order-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '/order_count?id=' + order_id,
            method: 'GET',
            success: function (response) {
                if (response >= 10)
                {
                    $('#checkoutCateringForm').submit();
                }
                else 
                { 
                     $('#confirmCheckoutCatering').modal('hide');
                    $('#minRequiredToast .toast-body').text(
                        'You should have at least 10 menu items'
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
    })


});
