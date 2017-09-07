@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <style>
        .tp-caption.LargeTitle span {
            color: #333 !important;
        }
        .tp-caption.Title {
            color: #333 !important;
        }
        .tp-caption.ExtraLargeTitle span {
            border-bottom: 2px #333 solid !important;
        }
        .tp-caption.ExtraLargeTitle {
            color: #333 !important;
        }
    </style>
    <section class="main-container col2-left-layout bounceInUp animated">
        <div class="main container">
            <div class="row" >
                <div id="content" >
                    {{--@yield('home-slider')--}}
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 col-md-4 col-sm-3 hidden-xs">
                                <div>
                                    <div class="side-banner"><img
                                                src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('side-banner'))}}"
                                                alt="banner"></div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12 home-slider">
                                <div id="magik-slideshow" class="magik-slideshow slider-block">
                                    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                            <ul>
                                            @foreach($home_slides as $row)
                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $("#ms{{$row->id}}").click(function () {
                                                            window.open('{{url('/')}}', '_blank');
                                                        });
                                                    });
                                                </script>
                                                    @if(count($row->image_url)>0)
                                                    <li id="ms{{$row->id}}" data-transition='random' data-slotamount='7'
                                                        data-masterspeed='1000'
                                                        data-thumb="{{ getImgUrl($row->image_url[0]) }}">
                                                    @endif
                                                    @if(count($row->image_url)>0)<img src="{{ getImgUrl($row->image_url[0]) }}" width="850" height="445" alt="Slide Image{{$row->id}}"
                                                         data-bgposition='left top' data-bgfit='cover'
                                                         data-bgrepeat='no-repeat'/>@endif

                                                    <div class="info">
                                                        <div class='tp-caption ExtraLargeTitle sft slide{{$row->id}} tp-resizeme '
                                                             data-endspeed='500' data-speed='500' data-start='1100'
                                                             data-easing='Linear.easeNone' data-splitin='none'
                                                             data-splitout='none' data-elementdelay='0.1'
                                                             data-endelementdelay='0.1'
                                                             style='z-index:2;white-space:nowrap;'>
                                                            {{--<span>{{$row->title}}</span>--}}
                                                        </div>
                                                        <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-endspeed='500'
                                                             data-speed='500' data-start='1300' data-easing='Linear.easeNone'
                                                             data-splitin='none' data-splitout='none' data-elementdelay='0.1'
                                                             data-endelementdelay='0.1'
                                                             style='z-index:3;white-space:nowrap;'>
                                                            {{--<span>{{$row->about}}</span>--}}
                                                        </div>
                                                        <div class='tp-caption Title sft  tp-resizeme ' data-endspeed='500'
                                                             data-speed='500' data-start='1450' data-easing='Power2.easeInOut'
                                                             data-splitin='none' data-splitout='none' data-elementdelay='0.1'
                                                             data-endelementdelay='0.1'
                                                             style='z-index:4;white-space:nowrap;'>
                                                            {{--{{$row->description}}--}}
                                                        </div>
                                                        <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500'
                                                             data-speed='500' data-start='1500' data-easing='Linear.easeNone'
                                                             data-splitin='none' data-splitout='none' data-elementdelay='0.1'
                                                             data-endelementdelay='0.1'
                                                             style='z-index:4;max-width:auto; max-height:auto; white-space:nowrap;'>
                                                            {{--<a href="{{url('/home')}}" class="buy-btn">--}}
                                                                {{--{{_t('Shop Now')}}--}}
                                                            {{--</a>--}}
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <script type='text/javascript'>
                                    jQuery(document).ready(function () {
                                        jQuery('#rev_slider_4').show().revolution({
                                            dottedOverlay: 'none',
                                            delay: 5000,
                                            startwidth: 850,
                                            startheight: 445,
                                            hideThumbs: 200,
                                            thumbWidth: 200,
                                            thumbHeight: 50,
                                            thumbAmount: 2,
                                            navigationType: 'thumb',
                                            navigationArrows: 'solo',
                                            navigationStyle: 'round',
                                            touchenabled: 'on',
                                            onHoverStop: 'on',
                                            swipe_velocity: 0.7,
                                            swipe_min_touches: 1,
                                            swipe_max_touches: 1,
                                            drag_block_vertical: false,
                                            spinner: 'spinner0',
                                            keyboardNavigation: 'off',
                                            navigationHAlign: 'center',
                                            navigationVAlign: 'bottom',
                                            navigationHOffset: 0,
                                            navigationVOffset: 20,
                                            soloArrowLeftHalign: 'left',
                                            soloArrowLeftValign: 'center',
                                            soloArrowLeftHOffset: 20,
                                            soloArrowLeftVOffset: 0,
                                            soloArrowRightHalign: 'right',
                                            soloArrowRightValign: 'center',
                                            soloArrowRightHOffset: 20,
                                            soloArrowRightVOffset: 0,
                                            shadow: 0,
                                            fullWidth: 'on',
                                            fullScreen: 'off',
                                            stopLoop: 'off',
                                            stopAfterLoops: -1,
                                            stopAtSlide: -1,
                                            shuffle: 'off',
                                            autoHeight: 'off',
                                            forceFullWidth: 'on',
                                            fullScreenAlignForce: 'off',
                                            minFullScreenHeight: 0,
                                            hideNavDelayOnMobile: 1500,
                                            hideThumbsOnMobile: 'off',
                                            hideBulletsOnMobile: 'off',
                                            hideArrowsOnMobile: 'off',
                                            hideThumbsUnderResolution: 0,
                                            hideSliderAtLimit: 0,
                                            hideCaptionAtLimit: 0,
                                            hideAllCaptionAtLilmit: 0,
                                            startWithSlide: 0,
                                            fullScreenOffsetContainer: ''
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <section class="main-container col2-left-layout">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-9 col-sm-push-3">
                                    <div>
                                        <div class="promotion-banner">
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-5">
                                                    <a href="#"> <img alt="" src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('home-banner1'))}}"></a>
                                                </div>
                                                <div class="col-lg-7 col-sm-7">
                                                    <a href="#"> <img alt="" src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('home-banner2'))}}"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--===============================menu all product==============================--}}

                                    <div class="content-page">
                                        <div class="category-product">
                                            <div class="navbar nav-menu">
                                                <div class="navbar-collapse">
                                                    <div class="new_title">
                                                        <h2>{{_t('New Products')}}</h2>
                                                    </div>
                                                    <ul class="nav navbar-nav">
                                                        @foreach((\App\Models\Backend\WebSetting::getSetting('new-product')) as $category)
                                                            <li @if($loop->first) class="active" @endif><a data-toggle="tab" href="#tab-{{$category}}">{{ \App\Models\Backend\ItemCategory::getTitle($category) }}</a></li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-bestseller">
                                                <div class="product-bestseller-content">
                                                    <div class="product-bestseller-list">
                                                        <div class="tab-container">
                                                            @foreach((\App\Models\Backend\WebSetting::getSetting('new-product')) as $category)
                                                            <div class="tab-panel @if($loop->first) active @endif" id="tab-{{$category}}">
                                                                <div class="category-products">
                                                                    <ul class="products-grid">
                                                                        <?php
                                                                        $items = \App\Models\Backend\Item::where('category_id',$category)->orderBy('id')->limit(4)->get();
                                                                        ?>
                                                                        @foreach($items as $item)
                                                                        <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                                                            <div class="item-inner">
                                                                                <div class="item-img">
                                                                                    <div class="item-img-info">
                                                                                        <a class="product-image"
                                                                                           href="{{url('/product-detail/'.$item->id)}}"
                                                                                           title="{{$item->title}}">
                                                                                            @if(count($item->image_url)>0)
                                                                                                <img src="{{ getImgUrl($item->image_url[0]) }}"
                                                                                                     alt="{{$item->title}}"
                                                                                                     title="{{$item->title}}"/>
                                                                                            @endif
                                                                                        </a>
                                                                                        <div class="box-hover">
                                                                                            <ul class="add-to-links">
                                                                                                <li>
                                                                                                    <a href="{{url('/product-detail-popup/'.$item->id)}}"
                                                                                                       class="link-quickview"
                                                                                                       data-name="{{$item->title}}"></a>
                                                                                                </li>
                                                                                                <div class="hide"> <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                                    {!! $xp[1] !!}
                                                                                                </div>
                                                                                                <li>
                                                                                                    <a href="#" data-wish_id="{{$item->id}}" data-wish_code="{{$item->item_code}}" data-wish_image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item->title)}}"
                                                                                                       class="desktop-addWishList link-wishlist"></a>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-info">
                                                                                    <div class="info-inner">
                                                                                        <div class="item-title">
                                                                                            <a title="{{$item->title}}"
                                                                                               href="{{url('/product-detail/'.$item->id)}}">
                                                                                                {{$item->title}}</a>
                                                                                        </div>
                                                                                        <div class="item-content">
                                                                                            <div class="item-price">
                                                                                                <div class="price-box">
                                                                                                    <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                                    {!! $xp[1] !!}
                                                                                                   </div>
                                                                                            </div>
                                                                                            <div class="action">
                                                                                                <a href="#" data-id="{{$item->id}}" data-code="{{$item->item_code}}" data-image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item->title)}}"
                                                                                                   data-original-title="Add to Cart"
                                                                                                   class="desktop-addCart button btn-cart link-cart">
                                                                                                    <span>{{_t('Add to Cart')}}</span></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bestsell-pro">
                                        <div class="slider-items-products">
                                                <div class="bestsell-block">
                                                    <div class="block-title">
                                                        <h2>{{_t('Best Sellers')}}</h2>
                                                    </div>
                                                    <div id="bestsell-slider" class="product-flexslider hidden-buttons">
                                                        <div class="slider-items slider-width-col4 products-grid block-content">
                                                            <?php
                                                            $item_special = \App\Models\Backend\Item::orderBy('count_sale','desc')->limit(15)->get();
                                                            ?>
                                                            @foreach($item_special as $item)
                                                            <div class="item">
                                                                <div class="item-inner">
                                                                    <div class="item-img">
                                                                        <div class="item-img-info">
                                                                            <a class="product-image"
                                                                               href="{{url('/product-detail/'.$item->id)}}"
                                                                               title="{{$item->title}}">
                                                                                @if(count($item->image_url)>0)
                                                                                    <img src="{{ getImgUrl($item->image_url[0]) }}"
                                                                                         alt="{{$item->title}}"
                                                                                         title="{{$item->title}}"/>
                                                                                @endif
                                                                            </a>
                                                                            <div class="box-hover">
                                                                                <ul class="add-to-links">
                                                                                    <li>
                                                                                        <a href="{{url('/product-detail-popup/'.$item->id)}}"
                                                                                           class="link-quickview"
                                                                                           data-name="{{$item->title}}"></a>
                                                                                    </li>

                                                                                    <div class="hide"> <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                        {!! $xp[1] !!}
                                                                                    </div>
                                                                                    <li>
                                                                                        <a href="#" data-wish_id="{{$item->id}}" data-wish_code="{{$item->item_code}}" data-wish_image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item->title)}}"
                                                                                           class="desktop-addWishList link-wishlist"></a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <a title="{{$item->title}}"
                                                                                   href="{{url('/product-detail/'.$item->id)}}">
                                                                                    {{$item->title}}</a>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <div class="item-price">
                                                                                    <div class="price-box">
                                                                                        <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                        {!! $xp[1] !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="action">
                                                                                    <a href="#" data-id="{{$item->id}}" data-code="{{$item->item_code}}" data-image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item->title)}}"
                                                                                       data-original-title="Add to Cart"
                                                                                       class="desktop-addCart button btn-cart link-cart">
                                                                                        <span>{{_t('Add to Cart')}}</span></a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @foreach((\App\Models\Backend\WebSetting::getSetting('home')) as $category)
                                            <div class="featured-pro-block">
                                                <div class="slider-items-products">
                                                    <div class="new-arrivals-block">
                                                        <div class="block-title">
                                                            <h2>{{ \App\Models\Backend\ItemCategory::getTitle($category) }}</h2>
                                                        </div>
                                                        <div id="new-arrivals-slider" class="product-flexslider hidden-buttons">
                                                            <div class="home-block-inner"></div>
                                                            <div class="slider-items slider-width-col4 products-grid block-content">
                                                                <?php
                                                                $items = \App\Models\Backend\Item::where('category_id',$category)->get();
                                                                ?>
                                                                @foreach($items as $item)
                                                                    <div class="item">
                                                                        <div class="item-inner">
                                                                            <div class="item-img">
                                                                                <div class="item-img-info">
                                                                                    <a class="product-image"
                                                                                       href="{{url('/product-detail/'.$item->id)}}"
                                                                                       title="{{$item->title}}">
                                                                                        @if(count($item->image_url)>0)
                                                                                        <img src="{{ getImgUrl($item->image_url[0]) }}"
                                                                                             alt="{{$item->title}}"
                                                                                             title="{{$item->title}}"/>
                                                                                        @endif
                                                                                    </a>
                                                                                    <div class="box-hover">
                                                                                        <ul class="add-to-links">
                                                                                            <li>
                                                                                                <a href="{{url('/product-detail-popup/'.$item->id)}}"
                                                                                                   class="link-quickview"
                                                                                                   data-name="{{$item->title}}"></a>
                                                                                            </li>
                                                                                            <div class="hide"> <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                                {!! $xp[1] !!}
                                                                                            </div>
                                                                                            <li>
                                                                                                <a href="#" data-wish_id="{{$item->id}}" data-wish_code="{{$item->item_code}}" data-wish_image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item->title)}}"
                                                                                                   class="desktop-addWishList link-wishlist"></a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="item-info">
                                                                                <div class="info-inner">
                                                                                    <div class="item-title">
                                                                                        <a title="{{$item->title}}"
                                                                                           href="{{url('/product-detail/'.$item->id)}}">
                                                                                            {{$item->title}}</a>
                                                                                    </div>

                                                                                    <div class="item-content">
                                                                                        <div class="item-price">
                                                                                            <div class="price-box">
                                                                                                <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                                                {!! $xp[1] !!}
                                                                                           </div>
                                                                                        </div>
                                                                                        <div class="action">
                                                                                            <a href="#" data-id="{{$item->id}}" data-code="{{$item->item_code}}" data-image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item->title)}}"
                                                                                               data-original-title="Add to Cart"
                                                                                                class="desktop-addCart button btn-cart link-cart">
                                                                                            <span>{{_t('Add to Cart')}}</span></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    {{--===============================end menu all product==============================--}}
                                </div>
                                <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                                    @include('front.menu.include.carouse_slide')

                                    <div class="hot-deal">
                                        <ul class="products-grid">
                                            <li class="right-space two-height item">
                                                <?php
                                                $item_hot_new = \App\Models\Backend\Item::orderBy('id')->limit(4)->get();
                                                ?>
                                                @foreach($item_hot_new as $item)
                                                <div class="item-inner">
                                                    <div class="item-img">
                                                        <div class="item-img-info">
                                                            <a class="product-image"
                                                               href="{{url('/product-detail/'.$item->id)}}"
                                                               title="{{$item->title}}">
                                                                @if(count($item->image_url)>0)
                                                                    <img src="{{ getImgUrl($item->image_url[0]) }}" width="" height=""
                                                                         alt="{{$item->title}}"
                                                                         title="{{$item->title}}"/>
                                                                @endif
                                                            </a>
                                                            <div class="hot-label hot-top-left">Hot Deal</div>
                                                            <div class="box-hover">
                                                                <ul class="add-to-links">
                                                                    <li>
                                                                        <a href="{{url('/product-detail-popup/'.$item->id)}}"
                                                                           class="link-quickview"
                                                                           data-name="{{$item->title}}"></a>
                                                                    </li>

                                                                    <div class="hide"> <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                        {!! $xp[1] !!}
                                                                    </div>
                                                                    <li>
                                                                        <a href="#" data-wish_id="{{$item->id}}" data-wish_code="{{$item->item_code}}" data-wish_image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item->title)}}"
                                                                           class="desktop-addWishList link-wishlist"></a>
                                                                    </li>

                                                                    {{--<li>--}}
                                                                        {{--<a class="link-compare" onclick="mgk_hm_compare.add('8011');"></a>--}}
                                                                    {{--</li>--}}
                                                                </ul>
                                                            </div>
                                                            <div class="box-timer">
                                                                {{--<div class="timer-grid" data-time="{{$item->created_at}}"></div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="info-inner">
                                                            <div class="item-title">
                                                                <a title="{{$item->title}}"
                                                                   href="{{url('/product-detail/'.$item->id)}}">
                                                                    {{$item->title}}</a>
                                                            </div>
                                                            <div class="item-content">
                                                                <div class="rating">
                                                                    {{--<div class="ratings">--}}
                                                                        {{--<div class="rating-box">--}}
                                                                            {{--<span class="fa fa-stack"><i--}}
                                                                                {{--class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                            {{--<span class="fa fa-stack"><i--}}
                                                                                        {{--class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                            {{--<span class="fa fa-stack"><i--}}
                                                                                        {{--class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                            {{--<span class="fa fa-stack"><i--}}
                                                                                        {{--class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                            {{--<span class="fa fa-stack"><i--}}
                                                                                        {{--class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                </div>
                                                                <div class="item-price">
                                                                    <div class="price-box">
                                                                        <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                        {!! $xp[1] !!}
                                                                    </div>
                                                                </div>
                                                                <div class="action">
                                                                    <a href="#" data-id="{{$item->id}}" data-code="{{$item->item_code}}" data-image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item->title)}}"
                                                                       data-original-title="Add to Cart"
                                                                       class="desktop-addCart button btn-cart">
                                                                        <span>{{_t('Add to Cart')}}</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                    {{--<div class="testimonials">--}}
                                        {{--<div class="ts-testimonial-widget">--}}
                                            {{--<div class="slider-items-products">--}}
                                                {{--<div id="testimonials-slider"--}}
                                                     {{--class="product-flexslider hidden-buttons home-testimonials">--}}
                                                    {{--<div class="slider-items slider-width-col4 fadeInUp">--}}

                                                        {{--<div class="holder">--}}
                                                            {{--<div class="thumb">--}}
                                                                {{--<img src="{{$base_url_front}}/image/cache/catalog/mgktestimonial/member1-100x100.jpg"--}}
                                                                     {{--alt="Saraha Smith">--}}
                                                            {{--</div>--}}
                                                            {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lid est--}}
                                                                {{--laborum dolo rumes fugats untras. dolore magna aliquam erat--}}
                                                                {{--volutpat. Aenean est auctorwisiet urna. Aliquam erat--}}
                                                                {{--volutpat...--}}
                                                            {{--</p>--}}
                                                            {{--<div class="line"></div>--}}
                                                            {{--<strong class="name"><a--}}
                                                                        {{--href="indexd4b5.html?route=magiktestimonial/magiktestimonial"--}}
                                                                        {{--target="_blank">Saraha Smith</a>--}}
                                                            {{--</strong>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="holder">--}}
                                                            {{--<div class="thumb">--}}
                                                                {{--<img src="{{$base_url_front}}/image/cache/catalog/mgktestimonial/member4-100x100.jpg"--}}
                                                                     {{--alt="Stephen Doe">--}}
                                                            {{--</div>--}}
                                                            {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed--}}
                                                                {{--diam nonummy nibh euismod tincidunt ut laoreet dolore magna--}}
                                                                {{--aliquam erat volutpat. Ut wisi enim ad minim veniam, quis--}}
                                                                {{--nostrud exerci...--}}
                                                            {{--</p>--}}
                                                            {{--<div class="line"></div>--}}
                                                            {{--<strong class="name"><a--}}
                                                                        {{--href="indexd4b5.html?route=magiktestimonial/magiktestimonial"--}}
                                                                        {{--target="_blank">Stephen Doe</a>--}}
                                                            {{--</strong>--}}
                                                        {{--</div>--}}


                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                        </div>
                    </section>
                    {{--blog--}}
                    <div class="container">
                        <div class="row">
                            <div class="blog-outer-container">
                                <div class="block-title">
                                    <h2>{{_t('Latest Blog')}}</h2>
                                </div>
                                <div class="blog-inner">
                                    <?php
                                    $blog_new = \App\Models\Backend\Blog::orderBy('id')->limit(2)->get();
                                    ?>
                                    @foreach($blog_new as $blog)
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="entry-thumb image-hover2">
                                            <a href="{{url('/blog-article/'.$blog->id)}}">

                                                @if(count($blog->image_url)>0)
                                                <img src="{{ getImgUrl($blog->image_url[0]) }}"
                                                     alt="{{$blog->title}}"
                                                     title="{{$blog->title}}"/></a>@endif
                                        </div>
                                        <div class="blog-preview_info">
                                            <h4 class="blog-preview_title"><a
                                                        href="{{url('/blog-article/'.$blog->id)}}">{{$blog->title}}</a></h4>
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>{{_t('posted b')}}y <a
                                                            href="{{url('/blog-article/'.$blog->id)}}">{{_t('admin')}}</a>
                                                </li>
                                                <li><i class="fa fa-clock-o"></i>{{$blog->created_at}}</li>
                                            </ul>
                                            <div class="blog-preview_desc">{{$blog->description}}
                                            </div>
                                            <a class="blog-preview_btn"
                                               href="{{url('/blog-article/'.$blog->id)}}">{{_t('Read More')}} </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--end blog--}}
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent

@endsection

@section('layout_master1')
    <meta name="description" content="My Store"/>
@endsection
@section('body_master1')
    <body class="common-home cms-home-page">
    <div id="page" class="category_page">
@endsection