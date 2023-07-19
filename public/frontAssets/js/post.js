var form = $('#form');
var save_btn = $(form).find('button[type=submit]');
var old_text = save_btn.html();

form.validate({
    rules: {
        password: {
            minlength: 8
        },
        password_confirmation: {
            minlength: 8,
            equalTo: "#password"
        }
    },

    errorPlacement: function (error, element) {
        error.insertAfter(element);
        if (element.hasClass('selectpicker')) {
            error.insertAfter(element.parent(".bootstrap-select"));
        }

    },

    highlight: function (element) {
        jQuery(element).closest('.form-control').removeClass('has-success').addClass('has-error');
    },

    submitHandler: function (f, e) {
        e.preventDefault();


        save_btn
            .attr("disabled", !0)
            .html(`
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>جاري التحميل</span>
                        `);

        var formData = new FormData(form[0]);
        var url = form.attr('action');
        var redirectUrl = form.attr('to');
        var _method = form.attr('method');


        $.ajax({
            "url": url,
            "type": _method,
            "data": formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {

                if (isJson(response)) {
                    response = jQuery.parseJSON(response);
                }
                save_btn.attr("disabled", !1)
                    .html(old_text)

                if (response.errors != undefined && Object.keys(response.errors).length) {

                    var $errors = response.errors;
                    var errorsHtml = '<ul style="list-style-type: none">';
                    $.each($errors, function (key, value) {
                        errorsHtml += '<li style="font-family: \'Droid.Arabic.Kufi\' !important">' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul>';

                    customToasterAlert(false, (window.errorMessage ?? window.error_message) + errorsHtml);

                    // customToasterAlert(
                    //     'error',
                    //     'Something went wrong!',
                    //     errorsHtml
                    // );
                    return;

                } else {


                    if (response.redirectUrl) {
                        redirectUrl = response.redirectUrl;
                    }
                    if (response.status) {

                        if ($(form).closest('.modal').length) {
                            $(form).closest('.modal').modal('toggle');
                        }

                        if (!response.type) {
                            customToasterAlert(response.status, response.message, function (event) {
                                if (redirectUrl) {
                                    window.location = redirectUrl
                                } else {
                                    location.reload();
                                }
                            });
                        } else {
                            customToasterAlert(response.type, response.message, function (event) {
                                if (redirectUrl) {
                                    window.location = redirectUrl
                                } else {
                                    location.reload();
                                }
                            });
                        }


                    } else {
                        customToasterAlert(false, response.message);
                    }
                }

            },
            error: function (jqXhr) {
                save_btn.attr("disabled", !1).html(old_text);
                getErrors(jqXhr, '/client');
            }
        });
    }
});


function getErrors(jqXhr, path) {
    // hideLoader();
    switch (jqXhr.status) {
        case 401 :
            $(location).prop('pathname', path);
            break;
        case 400 :
            customSweetAlert(
                'error',
                jqXhr.responseJSON.message,
                ''
            );
            break;
        case 422 :
            (function ($) {
                var $errors = jqXhr.responseJSON.errors;
                var errorsHtml = '<ul style="list-style-type: none">';
                $.each($errors, function (key, value) {
                    errorsHtml += '<li style="font-family: \'Droid Arabic Kufi\' !important">' + value[0] + '</li>';
                });
                errorsHtml += '</ul>';
                customToasterAlert(false, (window.errorMessage ?? window.error_message) + errorsHtml);

            })(jQuery);

            break;
        default:
            errorCustomSweet();
            break;
    }
    return false;
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
