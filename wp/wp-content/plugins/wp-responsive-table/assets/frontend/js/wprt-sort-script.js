(function( $ ) {
    'use strict';

    $('.wprt-container').find('table').addClass('table').wrap("<div class='table-responsive wprt_style_display'></div>");

})( jQuery );

window.addEventListener("DOMContentLoaded", function() {

    (function(cssClass) {
        function g(c) {
            return function(b, a) {
                b = b.cells[c].textContent;
                a = a.cells[c].textContent;
                b = +b || b;
                a = +a || a;
                return b > a ? 1 : b < a ? -1 : 0
            }
        }

        var d = document.querySelectorAll(cssClass);

        d.forEach(function(table) {

            var e = [].slice.call(table.rows, 1);

            [].slice.call(table.rows[0].cells).forEach(function(firstRowElement, b) {
                var flag = 0;
                firstRowElement.classList.add("is-sort");
                var span = document.createElement('span');
                span.className = "sort-icon";
                firstRowElement.appendChild(span);
                firstRowElement.addEventListener("click", function() {

                    [].slice.call(table.rows[0].cells).forEach(function(rowElement) {
                        rowElement.classList.remove("active");
                    });

                    if(!flag){
                        firstRowElement.classList.add("sort-asc","active");
                        firstRowElement.classList.remove("sort-desc");
                    }
                    else{
                        firstRowElement.classList.add("sort-desc","active");
                        firstRowElement.classList.remove("sort-asc");
                    }
                    e.sort(g(b));
                    flag && e.reverse();
                    e.forEach(function(flag) {
                        table.appendChild(flag)
                    });
                    flag ^= 1
                })
            })
        });
    })(".table")
});