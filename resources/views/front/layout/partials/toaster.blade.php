<script>
    function customToasterAlert(type ,title , func) {
        var then_function = func || function () {
        };

        var locale='{{app()->getLocale()=='ar'?true:false}}'
        var dir='{{app()->getLocale()=="ar"?'left':'right'}}'
        toastr.options = {
            "positionClass": "toast-bottom-"+dir,
            "rtl": locale,
            "onHidden" : then_function,
            "fadeOut": 4500,
            "timeOut": 4500,
            "extendedTimeOut": 4500
        }

        if (type){
            toastr.success(title);
        }else {
            toastr.error(title);
        }

    }

    function errorCustomSweet() {
        customToasterAlert(
            false,
            '@lang('messages.error')'
        );
    }

</script>
