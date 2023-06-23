import * as utils from './utils.js';

$(document).ready(function () {
    // handle click event of the button
    $('.orderHistoryBtn').click(function () {
        let target = $(this).data('target');
        let order_id = $(this).data('order-id');
        let getOrders = utils.ajaxParams('/order_line/' + order_id, 'GET');
        (getOrders.success = function (response) {
            let order_lines = response;
            $.each(order_lines, function (index, order_line) {
                let elem = '.orderHistory' + order_id;
                $(elem + '#productName' + index).text(order_line['name']);
                $(elem + '#unitPrice' + index).text(order_line['price']);
                $(elem + '#quantity' + index).text(order_line['quantity']);
                $(elem + '#totalPrice' + index).text(order_line['total_price']);
            });
            $(target).toggle();
        }),
        $.ajax(getOrders);
    });

    // hide all collapse elements initially
    $('.collapse').hide();

    // reformats date
    $('td.date-purchased').each(function () {
        // Get the original date string from the td element
        var dateString = $(this).text().trim();
        // Set the text of the td element to the reformatted date
        $(this).text(utils.formatDate(dateString));
    });
});
