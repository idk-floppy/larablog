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
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('.delete-modal-trigger').on('submit', async (event) => {
    event.preventDefault();

    let object = JSON.parse(event.target.getAttribute('data-object'));
    let url = event.target.getAttribute('data-url');

    let question = await Swal.fire({
        title: `Delete ${object['text']}?`,
        text: "You won't be able to revert this action!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#FF6666',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'DELETE'
    });

    let response = async function (alert) {
        if (alert.isConfirmed) {
            await $.ajax({
                type: 'POST',
                url: url,
                success: async function () {
                    await Swal.fire({
                        title: `Success`,
                        text: "Record deleted",
                        icon: 'success'
                    });
                    let arrURL = window.location.pathname.split('/');
                    if (arrURL.includes('tags') || arrURL.includes('posts')) {
                        location.reload();
                    } else {
                        history.back();
                    }
                },
                error: function () {
                    Swal.fire({
                        title: `Oops...`,
                        text: "Server Error",
                        icon: 'error'
                    });
                }
            });
        }
    };

    response(question);
});
