import './bootstrap';
import jQuery from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.css';
window.jQuery = window.$ = jQuery;

var navlinks = $('#navlinks');
var burger = $('#burger');
burger.on('click', () => {
    navlinks.toggleClass(['hidden', 'flex']);
});

select2();



$(window).on('load', () => {
    if ($(".select2").length) {
        $(".select2").select2({
            placeholder: "Select tags",
            tags: true,
            maximumSelectionLength: 3,
            tokenSeparators: [],
            ajax: {
                delay: 1000,
                url: 'api/search',
                data: (params) => {
                    var query = {
                        search: params.term
                    }
                    return query;
                },
                processResults: (data) => {
                    var newData = $.map(data, (obj) => {
                        obj.id = obj.text;
                    });
                    console.log(data);
                    return {
                        results: data
                    };
                }
            },
            createTag: (params) => {
                var regExp = /^[a-zA-Z0-9\ö\ü\ó\ő\ú\é\á\ű\í]+$/g;
                if (!regExp.test(params.term) || params.term.length > 32) {
                    return null;
                }

                return {
                    id: params.term.toLocaleLowerCase(),
                    text: params.term.toLocaleLowerCase()
                }
            }
        });
        console.log("select2 init");
    }
});
