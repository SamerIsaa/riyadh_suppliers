<!DOCTYPE html>
<html dir="rtl">

@include('front.layout.head')
<body><!-- begin:: Page -->
<div class="main-wrapper">

    <!-- begin:: Header -->
    @include('front.layout.header')

    @yield('content')

    <!-- start:: footer -->
    @include('front.layout.footer')
    <!-- end:: footer -->
</div><!-- end:: Page -->

@include('front.layout.scripts')
</body>
</html>
