document.addEventListener('DOMContentLoaded', function () {

    const methods = {
        PHONE: 'phone',
    };

    $.validator.addMethod(methods.PHONE, function (value, element) {
        return this.optional(element) || value[0] == '0' && value.length == 10;
    });
});