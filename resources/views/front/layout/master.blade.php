<!DOCTYPE html>
<html dir="rtl">

@include('front.layout.head')
<body><!-- begin:: Page -->
<div class="main-wrapper">

    <!-- begin:: Header -->
    @if(isset($show_header) && $show_header)

        @include('front.layout.header')
    @endif

    @yield('content')

    <!-- start:: footer -->
    @if(isset($show_header) && $show_header)
        @include('front.layout.footer')
    @endif
    <!-- end:: footer -->
</div><!-- end:: Page -->

@include('front.layout.scripts')
</body>
</html>
