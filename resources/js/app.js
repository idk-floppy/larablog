import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
window.jQuery = window.$ = jQuery;
import EasyMDE from 'easymde';
window.EasyMDE = EasyMDE;
import Swal from 'sweetalert2';
window.Swal = Swal;
import DataTables from 'datatables.net-dt';
window.DataTables = DataTables;

// Navbar
var navlinks = $('#navlinks');
window.navlinks = navlinks;
var burger = $('#burger');
window.burger = burger;

select2();
