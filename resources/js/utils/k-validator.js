;(function (exports, global) {
    exports.validate = function (form, options) {
        const jForm = $(form);
        jForm.validate({
            ...options,
            errorPlacement: function(error, element) {
                error.addClass('text-danger');
                element.closest('.k-input-container').append(error);
            }
        });
        return jForm.valid();
    }
})(window.kValidator = window.kValidator || {}, window);