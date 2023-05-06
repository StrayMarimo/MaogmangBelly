$(document).ready(function () {
    $('#addToCatering').on('click', function (e) {
        e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value

        if (parseInt(inputVal) < 50) {
            $('#invalidQty').text('Quantity must be at least 50');
        } else {
            $('#invalidQty').text('');
            $('#orderType').val('C');
            $('#availProductForm').submit();
        }
    });

    $('#checkoutCateringBtn').on('click', function (e) {
      
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
                     $('#invalidFoodQuantity').hide();
                }
                else 
                {
                    e.preventDefault();
                    $('#invalidFoodQuantity').html('<p>You should add at least 10 menu items');
                    // show the error message
                    $('#invalidFoodQuantity').show();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    })


});
