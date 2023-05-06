$(document).ready(function () {
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
                    $('#minRequiredToast .toast-body').text(
                        'You should have at least 10 menu items'
                    );
                    $('#minRequiredToast small').text('Reservations');
                    $('#minRequiredToast').show();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    })


});
