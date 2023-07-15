<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ $title?? __('translate.app_name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>--}}

    <link rel="stylesheet" href="{{ asset('frontAssets/css/animate.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/fontawesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/lightcase.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/swiper.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/jquery.steps.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap.rtl.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontAssets/css/main.css') }}"/>


    @stack('front_css')

</head>
