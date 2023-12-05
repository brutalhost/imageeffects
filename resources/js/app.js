import "bootstrap/dist/js/bootstrap.min.js";
import htmx from 'htmx.org';
import Toastify from 'toastify-js'

window.htmx = htmx;

(function () {
    console.log("../css/htmx-loaded.css");
    import("../css/htmx-loaded.css");
})();

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
