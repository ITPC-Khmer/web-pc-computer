<div class="row">
    <div class="portlet-body">
        <a href="{{url('/stock/popular-product')}}" class="icon-btn">
            <i class="fa fa-star"></i>
            <div> {{_t('Popular')}} </div>
        </a>
        <a href="{{url('/stock/in-stock')}}" class="icon-btn">
            <i class="fa fa-check-square-o"></i>
            <div> {{_t('In Stock')}} </div>
        </a>
        <a href="{{url('/stock/out-stock')}}" class="icon-btn">
            <i class="fa fa-minus-square"></i>
            <div> {{_t('Out Stock')}} </div>
        </a>
        <a href="{{url('/stock/sell-off')}}" class="icon-btn">
            <i class="fa fa-star-half-o"></i>
            <div> {{_t('Sell Off')}} </div>
        </a>

        <a href="{{url('/report/order-paid')}}" class="icon-btn">
            <i class="fa fa-star-half-o"></i>
            <div> {{_t('Order Paid')}} </div>
        </a>
        <a href="{{url('/report/order-cancel')}}" class="icon-btn">
            <i class="fa fa-star-half-o"></i>
            <div> {{_t('Order Cancel')}} </div>
        </a>
    </div>
</div>