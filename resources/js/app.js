import "bootstrap/dist/js/bootstrap.min.js";
import Toastify from 'toastify-js'
import htmx from 'htmx.org';

window.htmx = htmx;

if (window.htmx) {
    (function () {
        console.log("../css/htmx-loaded.css");
        import("../css/htmx-loaded.css");
    })();
}

// htmx.logger = function(elt, event, data) {
//     if(console) {
//         console.log(event, elt, data);
//     }
// }

function executeScript(responseText) {
    eval(responseText); // Выполнение полученного скрипта
}

document.addEventListener('htmx:afterSwap', function(event) {
    const xhr = event.detail.xhr;
    const reswapHeader = xhr.getResponseHeader('Hx-Reswap');
    if (reswapHeader === 'none') {
        executeScript(xhr.response);
    }
});
