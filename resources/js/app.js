import "bootstrap/dist/js/bootstrap.min.js";
import htmx from 'htmx.org';
import Toastify from 'toastify-js'
// import Alpine from 'alpinejs'
// window.Alpine = Alpine
//
// Alpine.start()

window.htmx = htmx;

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
