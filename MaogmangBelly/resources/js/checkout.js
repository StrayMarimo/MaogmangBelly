// Wait for the document to finish loading before executing this code
$(document).ready(function () {
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
});
