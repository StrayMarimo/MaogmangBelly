$(document).ready(function (){
    $('#addToReservations').on('click', function(e) {
        e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value

         if (parseInt(inputVal) < 10) {
            $('#invalidQty').text('Quantity must be at least 10');
        } else {
            $('#invalidQty').text('');
             $('#orderType').val('R');
            $('#availProductForm').submit();
        }
    })
})