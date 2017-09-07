<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    @section('meta')
        <meta content="ITPC ERP" name="description"/>
    @show
    <meta content="" name="author"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ $base_url }}assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"  type="text/css"/>
    <link href="{{ $base_url }}assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"  type="text/css"/>

    <link href="{{ $base_url }}assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{ $base_url }}assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
    @section('css')

    @show
    <link href="{{ $base_url }}assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{ $base_url }}assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ $base_url }}assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ $base_url }}assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{ $base_url }}assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('/') }}sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico"/>

    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed|Hanuman');*/
        body{
            font-family: 'Encode Sans Semi Condensed', sans-serif;
            font-family: 'Hanuman', serif;
        }
        @media (max-width: 991px){
            .page-sidebar .page-sidebar-menu .sidebar-search input, .page-sidebar .page-sidebar-menu>li .sub-menu {
                background-color: #FFFFFF!important;
            }
        }

    </style>

    <script>
        var CSRF_TOKEN = '{{ csrf_token() }}';
        var current_url = '{{ url()->current() }}';
    </script>


    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            position: relative;
            min-height: 1px;
            padding-left: 5px !important;
            padding-right: 5px !important;
        }
        .page-header.navbar {
            background-color: rgb(52, 96, 136) !important;
        }
        .page-sidebar, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover {
            background-color: #FFFFFF !important;
        }
        .page-sidebar .page-sidebar-menu .sub-menu>li.active>a, .page-sidebar .page-sidebar-menu .sub-menu>li.open>a, .page-sidebar .page-sidebar-menu .sub-menu>li:hover>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu>li.open>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu>li:hover>a {
            background: #F1F4F7!important;
        }
        .page-sidebar .page-sidebar-menu .sub-menu>li>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu .sub-menu>li>a {
            color: #28303B !important;
        }
        .page-footer-fixed .page-footer {
            background-color: #346088 !important;
        }
        .page-sidebar{
            border-right: solid 1px #858585 !important;
        }
    </style>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-footer-fixed page-sidebar-fixed">
<div class="page-wrapper">
@include('layouts.admin_include.header-report')
    <div class="clearfix"></div>
    <div class="page-container">
    @include('layouts.admin_include.sidebar-report')
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-content-body">
                    @yield('content')
                </div>
            </div>
        </div>
        <a href="javascript:" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>

    </div>
    <div class="page-footer">
        <div class="page-footer-inner">
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
</div>
<!--[if lt IE 9]>
<script src="{{ $base_url }}assets/global/plugins/respond.min.js"></script>
<script src="{{ $base_url }}assets/global/plugins/excanvas.min.js"></script>
<script src="{{ $base_url }}assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<script src="{{ $base_url }}assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="{{ $base_url }}assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
<script src="{{ $base_url }}assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
<script>
    $.ajaxSetup({
        data: {
            isAjax: true,
            _token: CSRF_TOKEN
        },
        beforeSend: function (jqXHR, settings) {

        },
        complete: function () {
        },
        success: function () {
        },
        error: function () {
        }
    });
</script>
@section('js')
@show
<script src="{{ $base_url }}assets/global/scripts/app.min.js" type="text/javascript"></script>
@section('script')

@show
<script src="{{ asset('/') }}sweet-alert/sweetalert-dev.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{ $base_url }}assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(function () {
        $('body').delegate('.delete-upload-img','click',function () {
            $(this).parent().parent().remove();
        });
        $('body').delegate('input','focus',function (e) {
            $(this)
                .one('mouseup', function () {
                    $(this).select();
                    return false;
                })
                .select();
        });
    });
(function($) {
    var $window = $(window),
        $html = $('#add-class-sidbar-toggle');

    function resize() {
        if ($window.width() < 768) {
            return $html.addClass('menu-toggler');
        }

        $html.removeClass('menu-toggler');
    }

    $window
        .resize(resize)
        .trigger('resize');
})(jQuery);
</script>

</body>

</html>