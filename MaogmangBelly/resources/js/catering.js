$(document).ready(function () {
    // Handle clicks on the Confirmation button
    $('#buyCateringBtn').on('click', function (e) {
        e.preventDefault();
         if ($('#checkoutAddress #address').val().trim() !== '' && $('#cateringDate #date').val() !== ''){
            
            let date = $('#cateringDate #date').val().toString();

            console.log(date);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: '/available_date?date=' + date,
                method: 'GET',
                success: function (response) {
                    console.log(response);
                    if (response == 0)
                       $('#confirmCheckoutCatering').modal('show'); 
                    else
                    {
                        $('#minRequiredToast .toast-body').text('Date is already taken');
                        $('#minRequiredToast small').text('Catering Booking Date');
                        $('#minRequiredToast').show();
                        $('#minRequiredToast').delay(2000).fadeOut('slow');
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        } else {
              $('#minRequiredToast .toast-body').text('Address and Date are required');
              $('#minRequiredToast small').text('Catering');
              $('#minRequiredToast').show();
              $('#minRequiredToast').delay(2000).fadeOut('slow');
        }

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
