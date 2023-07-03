<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{@$title ?? __('panel.privacy')}}</title>
    <meta name="author" content="Xmartlabs" />
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    @if(app()->isLocale('ar'))
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css" integrity="sha512-3Lr2MkT5iW+jVhwKFUBa+zQk8Uklef98/3mebU6wNxTzj65enYrFXaeuqPAYWxcQd1GAt9aUBvYHOIcl2SUsKA==" crossorigin="anonymous" />
    @endif
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Roboto" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">

    <link href="css/custom.css" rel="stylesheet" type="text/css" />

    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Jared-Bot" />
    <meta property="og:url" content="https://jaredbot.com" />
    <meta property="og:image" content="https://d18tndtkm7kj2p.cloudfront.net/jared/jared-illustration.png" />
    <meta property="og:title" content="Jared-Bot" />
    <meta property="og:description" content="Update your Android project dependencies instantly and automatically. Trust Jared and he'll deliver." />

    <meta property="fb:app_id" content="1895239457410968" />
</head>

<body>

<div class="container terms-and-conditions">
    <h1 class="text-center">{{@$page->title}}</h1>
    <hr>
    <div class="row">
        <div class="col col-xs-12">

            <div class="col col-xs-11 col-xs-offset-1 col-sm-11 col-sm-offset-1">
                {!! @$page->content !!}
            </div>
        </div>
    </div>

</div>

<footer class="footer">
    <div class="row">
        <div class="col col-sm-4 col-xs-12 text-center">
            <a href="https://xmartlabs.com" target="_blank">
                <img class="footer-logo" src="{{asset('logo.png')}}" srcset="images/xmartlabs-logo-grey@2x.png 2x, images/xmartlabs-logo-grey@3x.png 3x" />
            </a>
        </div>


        <div class="col col-sm-3 col-sm-offset-1 col-xs-12">
            <p class="footer-text">@lang('landing.copy_rights')</p>
        </div>
    </div>
</footer>
</body>


<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<html>
