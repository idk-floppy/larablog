import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.css';

window.jQuery = window.$ = jQuery;
select2();

$(document).ready(function () {
    if ($(".select2").length) {
        $(".select2").select2({
            placeholder: "Select tags",
            tags: true,
            tokenSeparators: [],
        });
        console.log("select2 init");
    }
});
