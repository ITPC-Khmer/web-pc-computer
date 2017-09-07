<?php
$front_url = asset('front');
?>
@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1510500795650942";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <section class="main-container col1-layout">
        <div class="main" id="content">
            <div class="container">
                <div class="row">
                    <div class="breadcrumbs">
                        <ul>
                            <li>                            <a href="{{url('/')}}">{{_t('HOME')}}</a>
                            </li>
                            <li><span>/</span>                            <a href="{{url('/category-list/'.$items->category_id)}}">{{ \App\Models\Backend\ItemCategory::getTitle($items->category_id) }}</a>
                            </li>
                            <li><span>/</span>                            <strong>{{$items->title}}</strong>            </li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-xs-12">

                        <div class="col-main">
                            <div class="product-view">
                                <div class="product-essential">

                                    <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">

                                        <div class="product-image">
                                            <div class="product-full">

                                                @if(count($items->image_url)>0)
                                                    <img id="product-zoom" src="{{ getImgUrl($items->image_url[0]) }}" data-zoom-image="{{ getImgUrl($items->image_url[0]) }}"/> </div>
                                            @endif
                                            <div class="more-views">
                                                <div class="slider-items-products">
                                                    <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                                                        <div class="slider-items slider-width-col4 block-content">

                                                            @if(count($items->image_url)>0)
                                                                @foreach(($items->image_url) as $v)
                                                                    <div class="more-views-items">
                                                                        <a href="{{ getImgUrl($v) }}"
                                                                             data-image="{{ getImgUrl($v) }}"
                                                                             data-zoom-image="{{ getImgUrl($v) }}">
                                                                            <img id="product-zoom"  src="{{ getImgUrl($v) }}" /> </a></div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-shop col-lg-8 col-sm-7 col-xs-12">
                                        <br>
                                        <div class="product-name">
                                            <h1>{{$items->title}}</h1>
                                        </div>
                                        {{--<div class="ratings">--}}
                                            {{--<div class="rating-box">--}}
                                                {{--<div class="rating">--}}
                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                    {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<p class="rating-links">--}}
                                                {{--<a href="">0 reviews</a>--}}
                                                {{--<span class="separator">|</span>--}}
                                                {{--<a href="">Write a review</a>--}}
                                            {{--</p>--}}
                                        {{--</div>--}}
                                        <div class="price-block">
                                            <div class="price-box">
                                                <?php $xp = getPrice( $items->start_price, $items->promotion_price, $items->expire_date) ?>
                                                {!! $xp[1] !!}
                                                @if(($items->instock) != 0 && ($items->amount) != null)
                                                <p class="availability in-stock"><span>{{_t('In Stock')}} <b style="color: rgb(51, 51, 51);">{{$items->amount}}</b> {{_t('items_')}}</span></p>
                                                @else
                                                <p class="availability in-stock"><span>{{_t('Not Yet Stock')}}</span></p>
                                                @endif
                                            </div>
                                        </div>
                                        {{--<ul class="list-unstyled">--}}
                                        {{--<li><span>Ex Tax:</span> $440.00</li>--}}
                                        {{--</ul>--}}
                                        <ul class="list-unstyled">
                                            {{--<li>Brand: <a href="http://linea.magikthemes.com/index.php?route=product/manufacturer/info&amp;manufacturer_id=8">Apple</a></li>--}}
                                            <li>Product Code: {{$items->item_code}}</li>
                                        </ul>
                                        <div id="product">
                                            <hr>
                                            <h3>Available Options</h3>
                                            @foreach((json_decode($items['specifics'])) as $k => $v)
                                                <div class="form-group required">
                                                    <label class="control-label">{{$k}}</label>
                                                    <div id="input-option3">
                                                        @foreach($v as $k1 => $v1)

                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="option{{$k}}" value="{{$v1}}">
                                                                    {{$v1}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{--==============================================add to card====================================--}}
                                            <div class="add-to-box">
                                                <div class="add-to-cart">

                                                    <label class="control-label" for="input-quantity">Qty</label>
                                                    <div class="pull-left">
                                                        <div class="custom pull-left">

                                                            <button class="reduced items-count" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 0 ) result.value--;return false;" type="button">
                                                                <i class="fa fa-minus"> </i>
                                                            </button>

                                                            <input type="text" name="quantity" value="1" size="2" id="qty" class="input-text qty" maxlength="12"/>

                                                            <button class="increase items-count" onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" type="button">
                                                                <i class="fa fa-plus"> </i>
                                                            </button>

                                                            <input type="hidden" name="product_id" value="8017" />
                                                        </div>
                                                    </div>
                                                    <div class="pull-left">
                                                        <a href="#" data-id="{{$items->id}}" data-code="{{$items->item_code}}" data-image="@if(count($items->image_url)>0){{getImgUrl1($items->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($items->title)}}"
                                                           data-original-title="Add to Cart"
                                                           class="desktop-addCart button btn-cart link-cart">
                                                            <span>{{_t('Add to Cart')}}</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--==============================================end add to card====================================--}}

                                            <div class="email-addto-box">
                                                <ul class="add-to-links">

                                                    <div class="hide"> <?php $xp = getPrice($items->start_price, $items->promotion_price, $items->expire_date) ?>
                                                        {!! $xp[1] !!}
                                                    </div>
                                                    <li>
                                                        <a href="#" data-wish_id="{{$items->id}}" data-wish_code="{{$items->item_code}}" data-wish_image="@if(count($items->image_url)>0){{getImgUrl1($items->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($items->title)}}"
                                                           class="desktop-addWishList link-wishlist" title="Wishlist"><span>{{_t('Wishlist')}}</span></a>
                                                    </li>

                                                    {{--<li>--}}
                                                    {{--<a class="link-compare" title="Compare">--}}
                                                    {{--<span>Compare</span>--}}
                                                    {{--</a>--}}
                                                    {{--</li>--}}
                                                </ul>
                                            </div>


                                            <div class="addthis_toolbox addthis_default_style">
                                                {{--============================like share fb===============================--}}
                                                <div class="fb-like" data-href="http://kstcambodia.com/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                                {{--============================like share fb===============================--}}
                                                {{--============================follow fb===============================--}}
                                                <div class="fb-follow" data-href="https://www.facebook.com/KSTStore/" data-layout="button" data-size="small" data-show-faces="true"></div>
                                                {{--============================follow fb===============================--}}
                                                <div class="fb-send" data-href="http://kstcambodia.com/"></div>
                                                <div class="fb-save" data-uri="http://kstcambodia.com/" data-size="small"></div>
                                                {{--============================save fb===============================--}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="product-collateral">
                            <div class="add_info">
                                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                    <li class="active"><a href="#tab-description" data-toggle="tab">{{_t('Description')}}</a></li>
                                    <li class=""><a href="#tab-review" data-toggle="tab">{{_t('Commend')}}</a></li>

                                </ul>
                                <div id="productTabContent" class="tab-content">
                                    <div class="tab-pane active in " id="tab-description">
                                        <p>{!! $items->content !!}</p>
                                    </div>

                                    <div class="tab-pane  fade" id="tab-review">
                                        {{--===========fb comment=======--}}
                                        <div class="comment-content wow bounceInUp animated">
                                            <div class="comments-form-wrapper clearfix">
                                                <div class="fb-comments" data-href="http://kstcambodia.com/product-detail/{{$items->id}}"></div>
                                            </div>
                                        </div>
                                        {{--===========endfb comment=======--}}
                                    </div>

                                </div>


                            </div><!-- col-sm-12 wow bounceInUp animated animated -->
                        </div>


                        <div class="related-pro">
                            <div class="slider-items-products">
                                <div class="related-block">
                                    <div class="home-block-inner">
                                        <div class="block-title">
                                            <h2>Best Sale</h2>
                                        </div>
                                    </div>
                                    <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4 products-grid">
                                            <?php
                                            $item_special_detail = \App\Models\Backend\Item::orderBy('count_sale','desc')->limit(15)->get();
                                            ?>
                                            @foreach($item_special_detail as $items)
                                                <div class="item">
                                                    <div class="item-inner">
                                                        <div class="item-img">
                                                            <div class="item-img-info">
                                                                <a class="product-image" href="{{url('/product-detail/'.$items->id)}}" title="{{$items->title}}">
                                                                    @if(count($items->image_url)>0)
                                                                        <img src="{{ getImgUrl($items->image_url[0]) }}"
                                                                             alt="{{$items->title}}"
                                                                             title="{{$items->title}}"/>
                                                                    @endif
                                                                </a>
                                                                <div class="sale-label sale-top-right">{{_t('Sale')}}</div>
                                                                <div class="box-hover">
                                                                    <ul class="add-to-links">
                                                                        <div class="hide"> <?php $xp = getPrice($items->start_price, $items->promotion_price, $items->expire_date) ?>
                                                                            {!! $xp[1] !!}
                                                                        </div>
                                                                        <li>
                                                                            <a href="#" data-wish_id="{{$items->id}}" data-wish_code="{{$items->item_code}}" data-wish_image="@if(count($items->image_url)>0){{getImgUrl1($items->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($items->title)}}"
                                                                               class="desktop-addWishList link-wishlist"></a>
                                                                        </li>

                                                                        {{--<li>--}}
                                                                        {{--<a class="link-compare"  onclick="mgk_compare.add('8013');"></a>--}}
                                                                        {{--</li>--}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item-info">
                                                            <div class="info-inner">
                                                                <div class="item-title">
                                                                    <a title="{{$items->title}}" href="{{url('/product-detail/'.$items->id)}}">
                                                                        {{$items->title}}</a>
                                                                </div>
                                                                <div class="item-content">
                                                                    <div class="rating">
                                                                        <div class="ratings">
                                                                            <div class="rating-box">
                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="item-price">
                                                                        <div class="price-box">
                                                                            <?php $xp = getPrice($items->start_price, $items->promotion_price, $items->expire_date) ?>
                                                                            {!! $xp[1] !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="action">
                                                                        <div class="action">
                                                                            <a href="#" data-id="{{$items->id}}" data-code="{{$items->item_code}}" data-image="@if(count($items->image_url)>0){{getImgUrl1($items->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($items->title)}}"
                                                                               data-original-title="Add to Cart"
                                                                               class="desktop-addCart button btn-cart link-cart">
                                                                                <span>{{_t('Add to Cart')}}</span></a>
                                                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    @parent
@endsection
@section('facebook')
    <meta property="og:site_name" content="{{ $items->title }}"/>
    <meta property="og:image:secure_url" content="{{ $items->img_url }}" />
    <link rel="image_src" href="{{ $items->img_url }}"/>
    <meta property="fb:app_id" content="1583628548520415" />
    <meta property="og:type"   content="object" />
    <meta property="og:url"    content="{{ url()->current() }}" />
    <meta property="og:title"  content="{{ $items->title_en }}" />
    <meta property="og:description" content="{{ $items->description }}" />
    <meta property="og:image"  content="{{ $items->img_url }}" />

    <!-- twitter meta-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@bongtou007">
    <meta name="twitter:creator" content="@bongtou007">
    <meta name="twitter:title" content="{{ $items->title_en }}">
    <meta name="twitter:description" content="{{ $items->description}}">
    <meta name="twitter:image" content="{{ $items->img_url }}">
@endsection


@section('layout_master2')
    <link href="{{$base_url_front}}/catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{$base_url_front}}/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="#" rel="canonical" />
    <script src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/cloud-zoom.js" type="text/javascript"></script>
    <script src="{{$base_url_front}}/catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="{{$base_url_front}}/catalog/view/javascript/jquery/datetimepicker/moment.js" type="text/javascript"></script>
    <script src="{{$base_url_front}}/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
@endsection

@section('style_master2')
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
@endsection
@section('body_master2')
    <body class="product-product-8017 ">
    <div id="page" class="">
        @endsection
        @section('script_master2_mid')
            <script type="text/javascript">
                $('select[name=\'recurring_id\'], input[name="quantity"]').change(function(){
                    $.ajax({
                        url: 'index.php?route=product/product/getRecurringDescription',
                        type: 'post',
                        data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
                        dataType: 'json',
                        beforeSend: function() {
                            $('#recurring-description').html('');
                        },
                        success: function(json) {
                            $('.alert, .text-danger').remove();

                            if (json['success']) {
                                $('#recurring-description').html(json['success']);
                            }
                        }
                    });
                });
            </script>
            <script type="text/javascript">
                $('#button-cart').on('click', function() {
                    var qty_val=$('#qty').val();
                    if(qty_val==0)
                    {
                        alert("Select quantity.");
                    }
                    else
                    {
                        $.ajax({
                            url: 'index.php?route=checkout/cart/add',
                            type: 'post',
                            data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
                            dataType: 'json',
                            beforeSend: function() {
                                $('#button-cart').button('loading');
                            },
                            complete: function() {
                                $('#button-cart').button('reset');
                            },
                            success: function(json) {
                                $('.alert, .text-danger').remove();
                                $('.form-group').removeClass('has-error');

                                if (json['error']) {
                                    if (json['error']['option']) {
                                        for (i in json['error']['option']) {
                                            var element = $('#input-option' + i.replace('_', '-'));

                                            if (element.parent().hasClass('input-group')) {
                                                element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                            } else {
                                                element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                            }
                                        }
                                    }

                                    if (json['error']['recurring']) {
                                        $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
                                    }

                                    // Highlight any found errors
                                    $('.text-danger').parent().addClass('has-error');
                                }

                                if (json['success']) {
                                    $('.breadcrumbs').before('<div class="container"><div class="alert alert-success">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div></div>');

                                    var myarr = [];
                                    var myarr = json['total'].split(" ");
                                    $('#cart .cart_count').text(myarr['0'] + " " + $('#cart-txt-heading').attr('value') +' / '+myarr['3']);

                                    $('html, body').animate({ scrollTop: 0 }, 'slow');

                                    $('#cart > ul').load('index1e1c.html?route=common/cart/info%20ul%20li');
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                            }
                        });
                    }
                });
            </script>
            <script type="text/javascript">
                $('.date').datetimepicker({
                    pickTime: false
                });

                $('.datetime').datetimepicker({
                    pickDate: true,
                    pickTime: true
                });

                $('.time').datetimepicker({
                    pickDate: false
                });

                $('button[id^=\'button-upload\']').on('click', function() {
                    var node = this;

                    $('#form-upload').remove();

                    $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

                    $('#form-upload input[name=\'file\']').trigger('click');

                    if (typeof timer != 'undefined') {
                        clearInterval(timer);
                    }

                    timer = setInterval(function() {
                        if ($('#form-upload input[name=\'file\']').val() != '') {
                            clearInterval(timer);

                            $.ajax({
                                url: 'index.php?route=tool/upload',
                                type: 'post',
                                dataType: 'json',
                                data: new FormData($('#form-upload')[0]),
                                cache: false,
                                contentType: false,
                                processData: false,
                                beforeSend: function() {
                                    $(node).button('loading');
                                },
                                complete: function() {
                                    $(node).button('reset');
                                },
                                success: function(json) {
                                    $('.text-danger').remove();

                                    if (json['error']) {
                                        $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
                                    }

                                    if (json['success']) {
                                        alert(json['success']);

                                        $(node).parent().find('input').val(json['code']);
                                    }
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        }
                    }, 500);
                });
            </script>
            <script type="text/javascript">
                $('#review').delegate('.pagination a', 'click', function(e) {
                    e.preventDefault();

                    $('#review').fadeOut('slow');

                    $('#review').load(this.href);

                    $('#review').fadeIn('slow');
                });

                $('#review').load('index695c-2.html?route=product/product/review&amp;product_id=8017');

                $('#button-review').on('click', function() {
                    $.ajax({
                        url: 'index.php?route=product/product/write&product_id=8017',
                        type: 'post',
                        dataType: 'json',
                        data: $("#form-review").serialize(),
                        beforeSend: function() {
                            $('#button-review').button('loading');
                        },
                        complete: function() {
                            $('#button-review').button('reset');
                        },
                        success: function(json) {
                            $('.alert-success, .alert-danger').remove();

                            if (json['error']) {
                                $('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                            }

                            if (json['success']) {
                                $('#review').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

                                $('input[name=\'name\']').val('');
                                $('textarea[name=\'text\']').val('');
                                $('input[name=\'rating\']:checked').prop('checked', false);
                            }
                        }
                    });
                });
                $(document).ready(function() {
                    $('.thumbnails').magnificPopup({
                        type:'image',
                        delegate: 'a',
                        gallery: {
                            enabled:true
                        }
                    });
                });
            </script>
@endsection