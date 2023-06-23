import * as utils from './utils.js';

$(document).ready(function () {
    // handle click on adding catering order on details page
    $('#addToCatering').on('click', function (e) {
        e.preventDefault();
        // get item quantity
        let inputVal = $('#availProductQuantity').val();

        // check if input is at least fixed minimum
        if (parseInt(inputVal) < 50) {
            utils.showToaster('Quantity must be at least 50', 'Catering');
        } else {
            // invoke post request
            $('#orderType').val('C');
            $('#availProductForm').submit();
        }
    });

    // Handle click on buy catering btn
    $('#buyCateringBtn').on('click', function (e) {
        e.preventDefault();

        // check if address and date fields are empty
        if (
            $('#checkoutAddress #address').val().trim() !== '' &&
            $('#cateringDate #date').val() !== ''
        ) {
            // check if date is already reserved for a catering or reservation service
            let date = $('#cateringDate #date').val().toString();
            let checkAvilability = utils.ajaxParams(
                '/available_date?date=' + date,
                'GET'
            );
            (checkAvilability.success = function (response) {
                if (response == 0) $('#confirmCheckoutCatering').modal('show');
                else utils.showToaster('Date is already taken', 'Catering Booking Date');
            }),
            $.ajax(checkAvilability);
        } else utils.showToaster('Address and Date are required', 'Catering');
    });

    // handle clicks on confirm catering btn modal
    $('#checkoutCateringBtn').on('click', function (e) {
        e.preventDefault();

        // get order id
        let order_id = $(this).data('order-id');

        // check if amount of order lines meets min requirements
        let checkMinItem = utils.ajaxParams('/order_count?id=' + order_id, 'GET');
        checkMinItem.success = function (response) {
            if (response >= 10)
                $('#checkoutCateringForm').submit();
            else {
                $('#confirmCheckoutCatering').modal('hide');
                utils.showToaster(
                    'You should have at least 10 menu items',
                    'Catering'
                );
            }
        };
        $.ajax(checkMinItem);
    });

    // handle click on close button of toaster
    $('#minRequiredToast button').on('click', function () {
        $('#minRequiredToast').hide();
    });
});
