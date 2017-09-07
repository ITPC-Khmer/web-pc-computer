<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{url('/backend/dashboard')}}">
                <img src="{{ $base_url }}assets/layouts/layout/img/logo.png" style="width: 180px; height: 50px;" alt="logo" class="logo-default" /> </a>
                {{--<img src="{{ $base_url }}assets/layouts/layout/img/logoMS.png" style="width: 200px; height: 50px;" alt="logo" class="logo-default" /> </a>--}}
            <div id="add-class-sidbar-toggle"  class="sidebar-toggler">
                <span></span>
            </div>
        </div>
        <style>
            .page-header.navbar .page-logo .logo-default {
                margin: 1px 0 0 !important;
            }
            .page-header.navbar .page-logo {
                float: left;
                display: block;
                width: 235px;
                height: 50px;
                padding-left: 1px;
                padding-right: 1px;
            }
        </style>
        <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>

    </div>
</div>