<!DOCTYPE html>
<html dir="ltr" lang="en" class="ie8">
<html dir="ltr" lang="en" class="ie9">
<html dir="ltr" lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700%7CFjalla+One%7COpen+Sans:300,400,600,700,800%7CPoppins:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" media="all">
    <link rel="stylesheet" href="{{$base_url_front}}/catalog/view/javascript/jquery/owl-carousel/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{$base_url_front}}/catalog/view/javascript/jquery/owl-carousel/owl.theme.css" type="text/css">
    <link href="{{$base_url_front}}/catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/style.css" media="all">
    <script type="text/javascript" src="{{$base_url_front}}/cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/jquery.countdown.min.js"></script>
    <script src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/cloud-zoom.js" type="text/javascript"></script>

</head>
<body class="product-product-8017 ">
<div id="page" class="">
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1510500795650942";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <div class="product-view" style="">
        <div class="product-essential">

            <div class="product-img-box col-lg-4 col-sm-5 col-xs-12">

                <div class="product-image">
                    <div class="product-full">

                        @if(count($item_pops->image_url)>0)
                            <img id="product-zoom" src="{{ getImgUrl($item_pops->image_url[0]) }}" data-zoom-image="{{ getImgUrl($item_pops->image_url[0]) }}"/> </div>
                        @endif

                    <div class="more-views">
                        <div class="slider-items-products">
                            <div id="gallery_01" class="product-flexslider hidden-buttons product-img-thumb">
                                <div class="slider-items slider-width-col4 block-content">

                                    @if(count($item_pops->image_url)>0)
                                        @foreach(($item_pops->image_url) as $v)
                                            <div class="more-views-items"> <a href="{{ getImgUrl($v) }}"
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
                    <h1>{{$item_pops->title}}</h1>
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

                        <?php $xp = getPrice( $item_pops->start_price, $item_pops->promotion_price, $item_pops->expire_date) ?>
                        {!! $xp[1] !!}
                        @if(($item_pops->instock) != 0 && ($item_pops->amount) != null)
                            <p class="availability in-stock"><span>{{_t('In Stock')}} <b style="color: rgb(51, 51, 51);">{{$item_pops->amount}}</b> {{_t('items_')}}</span></p>
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
                    <li>Product Code: {{$item_pops->item_code}}</li>
                </ul>
                <div id="product">
                    <hr>
                    <h3>Available Options</h3>
                    @foreach((json_decode($item_pops['specifics'])) as $k => $v)
                        <div class="form-group required">
                            <label class="control-label">{{$k}}</label>
                            <div id="input-option3">
                                @foreach($v as $k1 => $v1)

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option[{{$k}}]" value="{{$v1}}">
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

                            <label class="control-label" for="input-quantity">{{_t('Qty')}}</label>
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
                                <a href="#" data-id="{{$item_pops->id}}" data-code="{{$item_pops->item_code}}" data-image="@if(count($item_pops->image_url)>0){{getImgUrl1($item_pops->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item_pops->title)}}"
                                   data-original-title="Add to Cart"
                                   class="desktop-addCart button btn-cart link-cart">
                                    <span>{{_t('Add to Cart')}}</span></a>
                            </div>
                        </div>
                    </div>
                    {{--==============================================end add to card====================================--}}

                    <div class="email-addto-box">
                        <ul class="add-to-links">
                            <div class="hide"> <?php $xp = getPrice($item_pops->start_price, $item_pops->promotion_price, $item_pops->expire_date) ?>
                                {!! $xp[1] !!}
                            </div>
                            <li>
                                <a href="#" data-wish_id="{{$item_pops->id}}" data-wish_code="{{$item_pops->item_code}}" data-wish_mage="@if(count($item_pops->image_url)>0){{getImgUrl1($item_pops->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item_pops->title)}}"
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
                    <div class="comment-content wow bounceInUp animated">
                        <div class="comments-form-wrapper clearfix">
                            <div class="fb-comments" data-href="http://kstcambodia.com/product-detail-popup/{{$item_pops->id}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@section('facebook')
    <meta property="og:site_name" content="{{ $item_pops->title }}"/>
    <meta property="og:image:secure_url" content="{{ $item_pops->img_url }}" />
    <link rel="image_src" href="{{ $item_pops->img_url }}"/>
    <meta property="fb:app_id" content="1583628548520415" />
    <meta property="og:type"   content="object" />
    <meta property="og:url"    content="{{ url()->current() }}" />
    <meta property="og:title"  content="{{ $item_pops->title_en }}" />
    <meta property="og:description" content="{{ $item_pops->description }}" />
    <meta property="og:image"  content="{{ $item_pops->img_url }}" />

    <!-- twitter meta-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@bongtou007">
    <meta name="twitter:creator" content="@bongtou007">
    <meta name="twitter:title" content="{{ $item_pops->title_en }}">
    <meta name="twitter:description" content="{{ $item_pops->description}}">
    <meta name="twitter:image" content="{{ $item_pops->img_url }}">
@endsection
</body>
</html>