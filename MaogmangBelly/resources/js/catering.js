$(document).ready(function() {
    $('#addToCatering').on('click', function(e){
         e.preventDefault();

        let inputVal = $('#availProductQuantity').val(); // get input value
      
        if (parseInt(inputVal) < 50) {
            $('#invalidQty').text('Quantity must be at least 50');
        } else {
            $('#invalidQty').text('');
            $('#orderType').val('C');
            $('#availProductForm').submit();
        }
      
    })

})