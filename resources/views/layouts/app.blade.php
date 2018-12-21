<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        Metronic | Dashboard
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <!--begin::Page Vendors -->
    <link href="{{ asset('assets/css/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
    <link href="{{ asset('assets/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />
</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- BEGIN: Header -->
        @include('partials.header')
        <!-- END: Header -->
        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            @include('partials.sidebar')
            <!-- END: Left Aside -->
            @yield('content')
        </div>
        <!-- end:: Body -->
        <!-- begin::Footer -->
        @include('partials.footer')
        <!-- end::Footer -->
    </div>
    <!-- end:: Page -->
    <!-- begin::Scroll Top -->
    <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
        <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    <!--begin::Base Scripts -->
    <script src="{{ asset('assets/js/vendors.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
    <!--end::Base Scripts -->
    <!--begin::Page Vendors -->
    <script src="{{ asset('assets/js/fullcalendar.bundle.js') }}" type="text/javascript"></script>
    <!--end::Page Vendors -->
    <!--begin::Page Snippets -->
    <script src="{{ asset('assets/js/dashboard.js') }}" type="text/javascript"></script>
    <!--end::Page Snippets -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.error('{{ $error }}','Error',{
                closeButton:true,
                progressBar:true,
            });
        @endforeach
    @endif
    </script>
    @stack('js')
</body>
<!-- end::Body -->

</html>
