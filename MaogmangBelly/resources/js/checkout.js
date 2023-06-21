// Wait for the document to finish loading before executing this code
$(document).ready(function () {
    // Handle clicks on the Confirmation button
    $('#buyOrderBtn').on('click', function (e) {
        if ($('#orderAddress #address').prop('required') === false || $('#orderAddress #address').val().trim() !== '') {
            $('#confirmCheckout').modal('show');
            e.preventDefault();
        } else {
             $('#minRequiredToast .toast-body').text('Address is required');
             $('#minRequiredToast small').text('Reservations');
             $('#minRequiredToast').show();
             $('#minRequiredToast').delay(2000).fadeOut('slow');
        }
    });

    // Handle clicks on Confirmed Modal button
    $('#ConfirmCheckout').on('click', function (e) {
        e.preventDefault();
        $('#checkoutConfirmForm').submit();
    });

    // Handle clicks on the "Pickup" radio button
    $('input:radio[name=forPickUp]').click(function () {
        // Hide the address picker and make the "Address" field not required
        $('#addressPicker').hide();
        $('#address').prop('required', false);

        // Check the "Pickup" radio button and uncheck the "Delivery" radio button
        $('#forPickup').prop('checked', true);
        $('#forDelivery').prop('checked', false);
    });

    // Handle clicks on the "Delivery" radio button
    $('input:radio[name=forDelivery]').click(function () {
        // Show the address picker and make the "Address" field required
        $('#addressPicker').show();
        $('#address').prop('required', true);

        // Check the "Delivery" radio button and uncheck the "Pickup" radio button
        $('#forDelivery').prop('checked', true);
        $('#forPickup').prop('checked', false);
    });

    // Handle change on order quantity on checkout page
    $('.input-item-quantity').change(function () {
        let item_id = $(this).attr('id').substring(14);
        let minQty = $(this).attr('min');
        let qty = $(this).val();

        if (parseInt(qty) < parseInt(minQty)) {
            console.log(qty, minQty);
            $('#input-number-error').text('Quantity must be at least ' + minQty);
        } else {
            $('#input-number-error').text('');
            $('#edit-order-form-' + item_id).submit();
        }
    });
    // hide all collapse elements initially
    $('.collapse').hide();

    // handle click event of the button
    $('.orderHistoryBtn').click(function () {
           let target = $(this).data('target');
           let order_id = $(this).data('order-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                url: '/order_line/' + order_id,
                method: 'GET',
                success: function (response) {
                    let order_lines = response;
                    $.each(order_lines, function(index, order_line){
                        $('.orderHistory'+ order_id + '#productName' + index).text(order_line['name']);
                        $('.orderHistory' + order_id + '#unitPrice' + index).text(
                            order_line['price']
                        );
                        $('.orderHistory' + order_id + '#quantity' + index).text(
                            order_line['quantity']
                        );
                        $('.orderHistory' + order_id + '#totalPrice' + index).text(
                            order_line['total_price']
                        );
                    })
                    $(target).toggle();
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
           // toggle the collapse element with the corresponding ID


          
    });
});
