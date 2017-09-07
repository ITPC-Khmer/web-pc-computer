
{{--=======================================old version==============--}}
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">

            <li class="nav-item  active open">
                <a href="{{url('/backend/dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">{{ _t('Dashboard') }}</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <?php
                    $arrMenu = [
                        ['title' => 'Dashboard','url' => '/backend/dashboard'],
                    ];
                    ?>
                    @foreach($arrMenu as $item)
                        <li class="nav-item{{ active_url($item['url'],' active open') }}">
                            <a href="{{ url($item['url']) }}" class="nav-link ">
                                <span class="title">{{ _t($item['title']) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item  active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">{{ _t('All Order') }}</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <?php
                    $arrMenu = [
                        ['title' => 'All Order*','url' => 'backend/all-order'],
                        ['title' => 'New Order','url' => 'backend/new-order'],
                        ['title' => 'Order Paid','url' => 'backend/order-paid'],
                        ['title' => 'Order Cancel','url' => 'backend/order-cancel'],
                    ];
                    ?>
                    @foreach($arrMenu as $item)
                        <li class="nav-item{{ active_url($item['url'],' active open') }}">
                            <a href="{{ url($item['url']) }}" class="nav-link ">
                                <span class="title">{{ _t($item['title']) }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            @if(session()->get('mysess.role_id') - 0 == 2)

                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Report') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
//                            ['title' => 'Sale Report','url' => '/report/select-sale-report'],
                            ['title' => 'Report Table','url' => '/report/table-report'],
                            ['title' => 'Order Paid','url' => '/report/order-paid'],
                            ['title' => 'Order Cancel','url' => '/report/order-cancel'],
                            ['title' => 'Product Instock','url' => '/stock/in-stock'],
                            ['title' => 'Product Outstock','url' => '/stock/out-stock'],
                            ['title' => 'Popular Product','url' => '/stock/popular-product'],
                            ['title' => 'Popular Discount','url' => '/stock/sell-off'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Cus. List') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'Cus. List','url' => 'backend/customer-list'],
                            ['title' => 'Cus. Contact','url' => 'backend/customer-contact'],
                            ['title' => 'Cus. Subscript','url' => 'backend/customer-subscribe'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Product') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'Product Category','url' => 'backend/item-category'],
                            ['title' => 'Product Spec','url' => 'backend/item-spec'],
                            ['title' => 'Product','url' => 'backend/item'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Blog') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'blog*','url' => 'backend/blog'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Slider') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'Home Slider','url' => 'backend/home-slider'],
                            ['title' => 'Product Slider','url' => 'backend/product-slider'],
                            ['title' => 'Carouse Slider','url' => 'backend/carousel-slide'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Pages') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'pages','url' => 'backend/page'],
                        ];

                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>


                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Language Translation') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'Language Translation','url' => 'backend/lang'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Web Setting') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
                            ['title' => 'Web Setting','url' => 'backend/web-setting'],
//                            ['title' => 'List Web Setting','url' => 'backend/web-setting-index'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item  active open">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">{{ _t('Administrator') }}</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php
                        $arrMenu = [
//                            ['title' => 'Role','url' => 'backend/role'],
                            ['title' => 'User Admin','url' => 'backend/admin'],
                        ];
                        ?>
                        @foreach($arrMenu as $item)
                            <li class="nav-item{{ active_url($item['url'],' active open') }}">
                                <a href="{{ url($item['url']) }}" class="nav-link ">
                                    <span class="title">{{ _t($item['title']) }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            @endif

        </ul>

    </div>

</div>