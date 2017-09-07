@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <div class="main-container col1-layout wow bounceInUp animated">
        <div class="main container">
            <div class="breadcrumbs">
                <ul>
                    <li>                            <a href="{{url('/')}}">{{_t('Home')}}</a>
                    </li>
                    <li><span>/</span>                            <strong>{{_t('Special Offers')}}</strong>            </li>

                </ul>
            </div>
            <div class="col-main">
                <div class="">
                    <div class="row">
                        <div id="content" class="col-sm-12">
                            <div class="page-title"><h2>{{_t('Special Offers')}}</h2></div>
                            <div class="toolbar">
                                <div class="sorter">
                                    <div class="view-mode">
                                        <button type="button" id="grid-view" class="btn btn-default active" data-toggle="tooltip" title="" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                        <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    </div>
                                </div>


                                {{--<div id="sort-by">--}}
                                    {{--<label class="left">Sort By:</label>--}}
                                    {{--<form action="{{ url('/special') }}" method="GET">--}}
                                        {{--<select id="input-sort" class="form-control" onchange="location = this.value;">--}}
                                            {{--<option value="{{ url('/special') }}"--}}
                                                    {{--selected="selected">Default--}}
                                            {{--</option>--}}
                                            {{--<option data-order="ASC" value="{{ url('/special') }}?f=title&o=ASC">--}}
                                                {{--Name (A - Z)--}}
                                            {{--</option>--}}
                                            {{--<option data-order="DESC" value="{{ url('/special') }}?f=title&o=DESC">--}}
                                                {{--Name (Z - A)--}}
                                            {{--</option>--}}
                                            {{--<option data-order="ASC" value="{{ url('/special') }}?f=start_price&o=ASC">--}}
                                                {{--Price (Low &gt; High)--}}
                                            {{--</option>--}}
                                            {{--<option data-order="DESC" value="{{ url('/special') }}?f=start_price&o=DESC">--}}
                                                {{--Price (High &gt; Low)--}}
                                            {{--</option>--}}
                                        {{--</select>--}}
                                    {{--</form>--}}
                                {{--</div>--}}

                                <div id="sort-by">
                                    <label class="left">{{_t('Sort By')}}:</label>
                                    <select id="input-sort" class="form-control" onchange="location = this.value;">
                                        <option value="{{ url('/special') }}" selected="selected">{{_t('Default')}}</option>
                                        <option data-order="ASC" value="{{ url('/special') }}?f=title&o=ASC">{{_t('Name (A - Z)')}}</option>
                                        <option data-order="DESC" value="{{ url('/special') }}?f=title&o=DESC">{{_t('Name (Z - A)')}}</option>
                                        <option data-order="ASC" value="{{ url('/special') }}?f=start_price&o=ASC">{{_t('Price (Low &gt; High)')}}</option>
                                        <option data-order="DESC" value="{{ url('/special') }}?f=start_price&o=DESC">{{_t('Price (High &gt; Low)')}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="category-products">
                                <div class="pro_row products-grid">
                                    @foreach($special as $item)
                                    <div class="product-layout product-grid item col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="product-thumb col-item">
                                            <!-- <div class="item"> -->
                                            <div class="item-inner">

                                                <div class="item-img">
                                                    <div class="item-img-info">
                                                        <a class="product-image" href="{{url('/product-detail/'.$item->id)}}"
                                                           title="{{$item->title}}">
                                                            @if(count($item->image_url)>0)
                                                                <img src="{{ getImgUrl($item->image_url[0]) }}"
                                                                     alt="{{$item->title}}"
                                                                     title="{{$item->title}}"/>
                                                            @endif
                                                        </a>
                                                        <div class="sale-label sale-top-right">Sale</div>

                                                        <a class="quickview-btn" href="{{url('/product-detail/'.$item->id)}}"
                                                           data-name="{{$item->title}}"><span></span></a>

                                                        <div class="box-hover">
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a href="{{url('/product-detail-popup/'.$item->id)}}" class="link-quickview"
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
                                                                    {{--<a class="link-compare" onclick="compare.add('8013');"></a>--}}
                                                                {{--</li>--}}

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title">
                                                            <a title="{{$item->title}}"
                                                               href="{{url('/product-detail/'.$item->id)}}">
                                                                {{$item->title}}                            </a>
                                                        </div>
                                                        <div class="desc std"><p>{{$item->description}}</p></div>
                                                        <div class="item-content">


                                                            {{--<div class="rating">--}}
                                                                {{--<div class="ratings">--}}
                                                                    {{--<div class="rating-box">--}}
                                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                        {{--<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div><!-- rating -->--}}


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
                                                                    <span>{{_t('Add to Cart')}}</span>
                                                                </a>
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
                            <div class="row">
                                <div class="bottom_pagination">
                                    <div class="col-sm-6 text-left"></div>
                                    <div class="col-sm-6 text-right">{{ $special->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
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