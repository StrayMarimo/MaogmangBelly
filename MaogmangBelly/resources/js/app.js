import './bootstrap';
import '../css/app.css';

import './products.js';
import './checkout.js';
import './catering.js';
import './reservations.js';
import './map.js';


import.meta.glob(['../images/**']);

$(document).ready(function(){
    $(window).scrollTop(0);
})