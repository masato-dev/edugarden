
;(function(exports, global) {
    exports.toast = function(message, alertType) {
        if (toastr[alertType]) {
            toastr[alertType](message);
        } else {
            toastr.info(message);
        }
    }
})(window.notification = window.notification || {}, window);