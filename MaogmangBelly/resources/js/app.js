import './bootstrap';
import '../css/app.css';

import './products.js';
import './checkout.js';
import './catering.js';
import './reservations.js';
import './map.js';
import './history.js';


import.meta.glob(['../images/**']);

$(document).ready(function () {
<<<<<<< HEAD
    // /*! Fades in page on load */
    // $('body').css('display', 'none');
    // $('body').fadeIn(500);
    // // $('body').addClass('visible');
    
    
=======

>>>>>>> 409f94fd3787cad569c6318f736fef71b78a647a
    $(window).scrollTop(0);
    var minDate = new Date();
    minDate.setDate(minDate.getDate() + 5); // add 5 days to today's date

    // format the minimum date as YYYY-MM-DDTHH:MM
    var minDateFormatted = minDate.toISOString().slice(0, 16);

    // set the minimum date for the datetime input field
    $('#date').attr('min', minDateFormatted);
});

