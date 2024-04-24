import './bootstrap';

import Alpine from 'alpinejs';
import 'select2';
import Swal from 'sweetalert2';
window.Swal = Swal;
window.Alpine = Alpine;

Alpine.start();

$(document).ready(function() {
    $('#items').select2();
});





