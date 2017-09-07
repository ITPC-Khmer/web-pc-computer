<div class="portlet-body">
    <div class="tiles">
        <a href="{{url('/backend/new-order')}}">
            <div class="tile bg-blue-hoki">
                <div class="tile-body">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Bought Alert')}}</div>
                    <div class="number count-order-notification"> 0 </div>
                </div>
            </div>
        </a>
        @if(session()->get('mysess.role_id') - 0 == 2)
        <a href="{{url('/backend/customer-contact')}}">
            <div class="tile bg-green-meadow">
                <div class="tile-body">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Customer Contact')}}</div>
                    <div class="number count-contact-notification"> 0 </div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/customer-subscribe')}}">
            <div class="tile selected bg-green-turquoise">
                <div class="corner"> </div>
                <div class="tile-body">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Subscript')}}</div>
                    <div class="number"> </div>
                </div>
            </div>
        </a>
        @endif
        <a href="{{url('/backend/all-order')}}">
            <div class="tile bg-red-intense">
                <div class="tile-body">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('All Orders')}} </div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/new-order')}}">
            <div class="tile bg-red-intense">
                <div class="tile-body">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('New Order')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/order-paid')}}">
            <div class="tile bg-red-intense">
                <div class="tile-body">
                    <i class="icon-calculator"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Order Paid')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/order-cancel')}}">
            <div class="tile bg-red-intense">
                <div class="tile-body">
                    <i class="fa fa-ban"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Order Cancel')}}</div>
                </div>
            </div>
        </a>
        @if(session()->get('mysess.role_id') - 0 == 2)
        <a href="{{url('/backend/item-category')}}">
            <div class="tile bg-purple-studio">
                <div class="tile-body">
                    <i class="fa fa-sitemap"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Product Type')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/item-spec')}}">
            <div class="tile bg-purple-studio">
                <div class="tile-body">
                    <i class="fa fa-expeditedssl"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Product Special')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/item')}}">
            <div class="tile bg-purple-studio">
                <div class="tile-body">
                    <i class="fa fa-barcode"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('All Product')}}</div>
                </div>
            </div>
        </a>

        <a href="{{url('/stock/popular-product')}}">
            <div class="tile bg-blue-steel">
                <div class="tile-body">
                    <i class="fa fa-star"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Popular Product')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/stock/in-stock')}}">
            <div class="tile bg-blue-steel">
                <div class="tile-body">
                    <i class="fa fa-check-square-o"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Product Instock')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/stock/out-stock')}}">
                <div class="tile bg-blue-steel">
                    <div class="tile-body">
                        <i class="fa fa-minus-square"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">{{_t('Not Yet Stock')}}</div>
                    </div>
                </div>
            </a>
        <a href="{{url('/stock/sell-off')}}">
            <div class="tile bg-blue-steel">
                <div class="tile-body">
                    <i class="fa fa-star-half-o"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Sell Off')}}</div>
                </div>
            </div>
        </a>

        <a href="{{url('/backend/lang')}}">
            <div class="tile bg-blue-steel">
                <div class="tile-body">
                    <i class="fa fa-language"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Language ')}}</div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/home-slider')}}">
                <div class="tile bg-red-sunglo">
                    <div class="tile-body">
                        <i class="fa fa-picture-o"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">{{_t('Manage Slide')}}</div>
                    </div>
                </div>
            </a>
        <a href="{{url('/backend/all-order')}}">
            <div class="tile bg-green">
                <div class="tile-body">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Reports')}} </div>
                    <div class="number"> </div>
                </div>
            </div>
        </a>
        <a href="{{url('/backend/customer-list')}}">
            <div class="tile selected bg-yellow-saffron">
                <div class="corner"> </div>
                <div class="tile-body">
                    <i class="fa fa-users"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Customer List')}}</div>
                </div>
            </div>
        </a>

        <a href="{{url('/backend/admin')}}">
            <div class="tile selected bg-yellow-saffron">
                <div class="corner"> </div>
                <div class="tile-body">
                    <i class="fa fa-gear"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t('Admin Setting')}}</div>
                </div>
            </div>
        </a>

        <a href="{{url('/backend/web-setting')}}">
            <div class="tile bg-yellow-lemon selected">
                <div class="corner"> </div>
                <div class="check"> </div>
                <div class="tile-body">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="tile-object">
                    <div class="name">{{_t(' Web Setting')}} </div>
                </div>
            </div>
        </a>
        @endif

    </div>
</div>