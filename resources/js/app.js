import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
window.jQuery = window.$ = jQuery;
import EasyMDE from 'easymde';
window.EasyMDE = EasyMDE;
import Swal from 'sweetalert2';
window.Swal = Swal;

// Navbar
var navlinks = $('#navlinks');
var burger = $('#burger');
burger.on('click', () => {
    navlinks.toggleClass(['hidden', 'flex']);
});

select2();

$('#delete').on('click', () => {
    $('#dialog').show();
});
$('#cancel').on('click', () => {
    $('#dialog').hide();
});
