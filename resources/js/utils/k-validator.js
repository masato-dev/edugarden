;(function (exports, global) {
    exports.validate = function (form, options, errorReplacement = null) {
        const jForm = $(form);
        jForm.validate({
            ...options,
            errorPlacement: errorReplacement || function(error, element) {
                error.addClass('text-danger');
                element.closest('.k-input-container').append(error);
            }
        });
        return jForm.valid();
    }
})(window.kValidator = window.kValidator || {}, window);