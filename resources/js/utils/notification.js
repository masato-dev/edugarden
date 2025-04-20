;(function(exports, global) {
    exports.toast = function(message, alertType) {
        if (toastr[alertType]) {
            toastr[alertType](message);
        } else {
            toastr.info(message);
        }
    }

    exports.fire.confirm = function (title = 'Are you sure?', text = '', icon = 'warning', options = {
        confirmButtonText: 'Xác nhận',
        cancelButtonText: 'Huỷ',
        reverseButtons: true
    }) {
        return Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            ...options
        });
    };
})(window.notification = window.notification || {fire: {}}, window);