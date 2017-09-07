<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->

        <div class="page-logo">
            <a href="{{url('/backend/dashboard')}}">
                <img src="{{ $base_url }}assets/layouts/layout/img/logo.png" style="width: 180px; height: 50px;" alt="logo" class="logo-default" /> </a>
                {{--<img src="{{ $base_url }}assets/layouts/layout/img/logoMS.png" style="width: 200px; height: 50px;" alt="logo" class="logo-default" /> </a>--}}
            <div class="menu-toggler sidebar-toggler">
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
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">


                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true" style="line-height: 1px !important;">
                        {{--<i class="fa fa-language"></i>--}}
                        <img alt="#" @if(get_ses_lang()=='kh') src="{{$base_url_front}}/catalog/language/kh/khmer.png" width="19" height="14" @else src="{{$base_url_front}}/catalog/language/en/english.png" width="19" height="14" @endif />
                        <span class="username username-hide-on-mobile" style="color: #C6CFDA!important;"> @if(get_ses_lang()=='kh') ខ្មែរ @else English @endif </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a class="{{ get_ses_lang()=='kh'?'active':'' }}" href="{{ url('/change_lang/kh') }}"><img src="{{$base_url_front}}/catalog/language/kh/khmer.png" alt="Khmer" width="16" height="11" title="Khmer"> ខ្មែរ </a>
                        </li>

                        <li>
                            <a class="{{ get_ses_lang()=='en'?'active':'' }}" href="{{ url('/change_lang/en') }}" ><img src="{{$base_url_front}}/catalog/language/en/english.png" width="16" height="11" alt="English" title="English"> English </a>
                        </li>


                    </ul>

                </li>

                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                

                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">

                    {{--$new_order_alert = \App\Models\Backend\Order::orderBy('id','desc')->where('view_alert','=','0')->limit(30)->get();--}}
                    {{--<a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"--}}
                       {{--data-close-others="true">--}}
                        {{--<i class="icon-bell"></i>--}}
                        {{--<span class="badge badge-default"> {{count($new_order_alert)}} </span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="external">--}}
                            {{--<h3>--}}
                                {{--<span class="bold">{{count($new_order_alert)}} pending</span> notifications</h3>--}}
                            {{--<a href="page_user_profile_1.html">view all</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<ul class="dropdown-menu-list scroller alert-new-order-class" style="height: 250px;" data-handle-color="#637283">--}}
                                {{--@foreach($new_order_alert as $row)--}}
                                    {{--<li>--}}
                                    {{--<a href="{{url('backend/view-order').'/'.$row->id}}">--}}
                                        {{--<span class="time">{{$row->delivery_date}}</span>--}}
                                        {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-success">--}}
                                                            {{--<i class="fa fa-plus"></i>--}}
                                                        {{--</span>$ {{$row->total_price}}</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--@endforeach--}}

                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                        {{--<span class="time">3 mins</span>--}}
                                        {{--<span class="details">--}}
                                                        {{--<span class="label label-sm label-icon label-danger">--}}
                                                            {{--<i class="fa fa-bolt"></i>--}}
                                                        {{--</span> Server #12 overloaded. </span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{----}}
{{--        alert new order notification--}}
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default count-order-notification"> 0 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold"><span class="count-order-notification">0</span> pending</span> {{_t('notifications')}}</h3>
                            <a href="{{url('/backend/new-order')}}">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller alert-new-order-class" style="height: 250px;" data-handle-color="#637283">
{{--        =================================alert new order notification here======================================--}}
                            </ul>
                        </li>
                    </ul>
{{--        end alert new order notification--}}



                </li>


                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                @if(session()->get('mysess.role_id') - 0 == 2)
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default count-contact-notification"> 0 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have
                                <span class="bold count-contact-notification">0 New</span> {{_t('Messages')}}</h3>
                            <a href="{{url('/backend/customer-contact')}}">{{_t('view all')}}</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller alert-new-contact-class" style="height: 275px;" data-handle-color="#637283">
                                <li>
{{--        =================================alert new contact notification here======================================--}}
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                {{----}}
                {{--<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">--}}
                    {{--<a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"--}}
                       {{--data-close-others="true">--}}
                        {{--<i class="icon-calendar"></i>--}}
                        {{--<span class="badge badge-default"> 3 </span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu extended tasks">--}}
                        {{--<li class="external">--}}
                            {{--<h3>You have--}}
                                {{--<span class="bold">12 pending</span> tasks</h3>--}}
                            {{--<a href="app_todo.html">view all</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">New release v1.2 </span>--}}
                                                        {{--<span class="percent">30%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">40% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Application deployment</span>--}}
                                                        {{--<span class="percent">65%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">65% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Mobile app release</span>--}}
                                                        {{--<span class="percent">98%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">98% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Database migration</span>--}}
                                                        {{--<span class="percent">10%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">10% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Web server upgrade</span>--}}
                                                        {{--<span class="percent">58%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">58% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">Mobile development</span>--}}
                                                        {{--<span class="percent">85%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress">--}}
                                                        {{--<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">85% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:">--}}
                                                    {{--<span class="task">--}}
                                                        {{--<span class="desc">New UI release</span>--}}
                                                        {{--<span class="percent">38%</span>--}}
                                                    {{--</span>--}}
                                        {{--<span class="progress progress-striped">--}}
                                                        {{--<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">--}}
                                                            {{--<span class="sr-only">38% Complete</span>--}}
                                                        {{--</span>--}}
                                                    {{--</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}



                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                       data-close-others="true">
                        <img alt="{{url('/backend/dashboard')}}" class="img-circle" src="{{ $base_url }}assets/layouts/layout/img/avatar.png" />
                        {{--<span class="username username-hide-on-mobile"> {{isset(Auth::user()->name)?Auth::user()->name:'Administrator'}} </span>--}}
                        <span class="username username-hide-on-mobile"> {{session()->get('mysess.name')}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{url('/')}}" target="_blank">
                                <i class="fa fa-home"></i> {{_t('View Website')}} </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="app_calendar.html">--}}
                                {{--<i class="icon-calendar"></i> My Calendar </a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_inbox.html">--}}
                                {{--<i class="icon-envelope-open"></i> My Inbox--}}
                                {{--<span class="badge badge-danger"> 3 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="app_todo.html">--}}
                                {{--<i class="icon-rocket"></i> My Tasks--}}
                                {{--<span class="badge badge-success"> 7 </span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="divider"> </li>--}}
                        {{--<li>--}}
                            {{--<a href="page_user_lock_1.html">--}}
                                {{--<i class="icon-lock"></i> Lock Screen </a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="{{ url('/admin/login') }}" >
                                <i class="icon-key"></i> {{_t('Log Out')}} </a>
                        </li>


                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


                {{--<li class="dropdown dropdown-quick-sidebar-toggler">--}}
                    {{--<a href="javascript:" class="dropdown-toggle">--}}
                        {{--<i class="icon-logout"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}



                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->