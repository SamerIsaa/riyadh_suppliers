<script>
    window.ok = "{{ __('constants.confirm') }}";
    window.cancel = "{{ __('constants.cancel') }}";
    window.delete = "{{ __('constants.delete') }}";
</script>
<!--end::Global Config-->

<script src="{{ asset('frontAssets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/lightcase.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/swiper.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jquery.steps.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/function.js') }}"></script>

<script src="{{asset('frontAssets/js/toastr.min.js')}}"></script>
<script src="{{asset('frontAssets/js/jquery.validate.js')}}" type="text/javascript"></script>

@include('front.layout.partials.toaster')


@stack('front_js')

<!--end::Page Vendors-->
<script>
    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });


    $.extend($.validator.messages, {

        required: "هذا الحقل مطلوب",
        remote: "يرجى التأكد  من هذا الحقل للمتابعة",
        email: "يجب إدخال عنوان البريد الإلكتروني بالشكل الصحيح ",
        url: "رجاء إدخال عنوان موقع إلكتروني صحيح",
        date: "رجاء إدخال تاريخ صحيح",
        dateISO: "رجاء إدخال تاريخ صحيح (ISO)",
        number: "رجاء إدخال عدد بطريقة صحيحة",
        digits: "رجاء إدخال أرقام فقط",
        creditcard: "رجاء إدخال رقم بطاقة ائتمان صحيح",
        equalTo: "من فظلك ادخل نفس القيمة مرة أخرى.",
        extension: "رجاء إدخال ملف بامتداد موافق عليه",
        maxlength: $.validator.format("الحد الأقصى لعدد الحروف هو {0}"),
        minlength: $.validator.format("الحد الأدنى لعدد الحروف هو {0}"),
        rangelength: $.validator.format("عدد الحروف يجب أن يكون بين {0} و {1}"),
        range: $.validator.format("رجاء إدخال عدد قيمته بين {0} و {1}"),
        max: $.validator.format("رجاء إدخال عدد أقل من أو يساوي {0}"),
        min: $.validator.format("رجاء إدخال عدد أكبر من أو يساوي {0}")
    });

</script>
