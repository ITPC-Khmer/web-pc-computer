<?php
$base_url_front = asset('front');
?>
@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <section class="main-container col2-left-layout bounceInUp animated">
        <div class="main container">
            <div class="row">
                <div id="content" class="col-sm-9 col-xs-12 col-sm-push-3">
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a>
                            </li>
                            <li><span>/</span> <strong>Dresses</strong></li>
                        </ul>
                    </div>
                    <style>
                        .cat-img-title .cat-heading {
                            color: #333 !important;
                        }

                        .small-tag {
                            color: #333 !important;
                        }

                        .cat-img-title.cat-bg p {
                            color: #333 !important;
                        }
                    </style>
                    <div class="page-title"><h2 class="page-heading"><span class="page-heading-title">Dresses</span>
                        </h2></div>
                    <div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1">
                                    @foreach($productslide as $row)
                                        <div class="item">
                                            @if(count($row->image_url)>0) <img src="{{ getImgUrl($row->image_url[0]) }}" width="915" height="312"
                                                                               alt="Slider Image{{$row->id}}"
                                                                               class="img-responsive"/>@endif
                                            {{--<div class="cat-img-title cat-bg cat-box">--}}
                                                {{--<div class="small-tag">{{$row->title}}</div>--}}
                                                {{--<h2 class="cat-heading">{{$row->about}}</h2>--}}
                                                {{--<p>{{$row->description}}</p>--}}
                                            {{--</div>--}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <article class="col-main">
                        <div class="toolbar">
                            <div class="sorter">
                                <div class="view-mode">
                                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip"
                                            title="Grid"><i class="fa fa-th"></i></button>
                                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"
                                            title="List"><i class="fa fa-th-list"></i></button>
                                </div>
                            </div>


                            <div id="sort-by">
                                <label class="left">Sort By:</label>
                                <form action="{{ url('category-list/'.$category_id) }}" method="GET">
                                    <select id="input-sort" class="form-control" onchange="location = this.value;">
                                        <option value="{{ url('category-list/'.$category_id) }}"
                                                selected="selected">Default
                                        </option>
                                        <option data-order="ASC" value="{{ url('category-list/'.$category_id) }}?f=title&o=ASC">
                                            Name (A - Z)
                                        </option>
                                        <option data-order="DESC" value="{{ url('category-list/'.$category_id) }}?f=title&o=DESC">
                                            Name (Z - A)
                                        </option>
                                        <option data-order="ASC" value="{{ url('category-list/'.$category_id) }}?f=start_price&o=ASC">
                                            Price (Low &gt; High)
                                        </option>
                                        <option data-order="DESC" value="{{ url('category-list/'.$category_id) }}?f=start_price&o=DESC">
                                            Price (High &gt; Low)
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div class="category-products">
                            <div class="pro_row products-list">
                                @foreach($items as $item)
                                <div class="product-layout product-list col-xs-12">
                                    <div class="product-thumb col-item">
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
                                                            <div class="hide"><?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                {!! $xp[1] !!}</div>
                                                            <li>
                                                                <a href="#" data-wish_id="{{$item->id}}" data-wish_code="{{$item->item_code}}" data-wish_image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-wish_price="{{ $xp[0] }}"  data-wish_name="{{($item->title)}}"
                                                                   class="desktop-addWishList link-wishlist"></a>
                                                            </li>
                                                            {{--<li>--}}
                                                                {{--<a class="link-compare"--}}
                                                                   {{--onclick="compare.add('8017');"></a>--}}
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
                                                            {{$item->title}} </a>
                                                    </div>
                                                    <div class="desc std"><p>{{$item->description}}</p></div>
                                                    <div class="item-content">
                                                        {{--<div class="rating">--}}
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
                                                        {{--</div><!-- rating -->--}}


                                                        <div class="item-price">
                                                            <div class="price-box">
                                                                <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                                                {!! $xp[1] !!}
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <button type="button" title="" data-id="{{$item->id}}" data-code="{{$item->item_code}}" data-image="@if(count($item->image_url)>0){{getImgUrl1($item->image_url[0])}}@endif" data-price="{{ $xp[0] }}"  data-name="{{($item->title)}}"
                                                                    data-original-title="Add to Cart"
                                                                    class="desktop-addCart button btn-cart link-cart"
                                                                    ><span>Add to Cart</span>
                                                            </button>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>  <!-- End Item info -->
                                        </div>  <!-- End  Item inner-->
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="row">
                            <div class="bottom_pagination">
                                <div class="col-sm-6 text-left">
                                    {{ $items->links() }}
                                </div>
                                {{--<div class="col-sm-6 text-right">Showing 1 to 15 of 16 (2 Pages)</div>--}}
                            </div>
                        </div>


                    </article>


                </div>


                <aside id="column-left" class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                    <div>
                        <div class="side-banner"><img
                                    src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('side-banner'))}}"
                                    alt="banner"></div>
                    </div>


                    {{----}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div class="panel-heading">Refine Search</div>--}}
                        {{--<div class="list-group">--}}
                            {{--<a class="list-group-item">Color</a>--}}
                            {{--<div class="list-group-item">--}}
                                {{--<div id="filter-group2">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="5"/>--}}
                                            {{--Blue (3) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="6"/>--}}
                                            {{--White (3) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="7"/>--}}
                                            {{--Black (3) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="8"/>--}}
                                            {{--Red (2) </label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<a class="list-group-item">Size</a>--}}
                            {{--<div class="list-group-item">--}}
                                {{--<div id="filter-group1">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="1"/>--}}
                                            {{--S (3) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="2"/>--}}
                                            {{--M (3) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="3"/>--}}
                                            {{--L (4) </label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="filter[]" value="4"/>--}}
                                            {{--XL (0) </label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="panel-footer text-right">--}}
                            {{--<button type="button" id="button-filter" class="btn btn-primary">Refine Search</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{----}}
                    {{----}}

                    <script type="text/javascript"><!--
                        $('#button-filter').on('click', function () {
                            filter = [];

                            $('input[name^=\'filter\']:checked').each(function (element) {
                                filter.push(this.value);
                            });

                            location = 'index0c78.html?route=product/category&amp;path=8001&amp;filter=' + filter.join(',');
                        });
                        //--></script>
                    <div class="panel panel-default special-products">
                        <div class="panel-heading">Specials</div>
                        <?php
                        $special = \App\Models\Backend\Item::where('promotion_price','!=',null)->orderBy('promotion_price','desc')->take(5)->get();
                        ?>
                        @foreach($special as $item)
                            <div class="product-layout">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <a href="{{url('/product-detail/'.$item->id)}}">
                                            @if(count($item->image_url)>0)
                                                <img src="{{ getImgUrl($item->image_url[0]) }}" width="" height=""
                                                     alt="{{$item->title}}"
                                                     title="{{$item->title}}" class="img-responsive"/>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="caption">
                                        <h4><a href="{{url('/product-detail/'.$item->id)}}">{{$item->title}}</a></h4>
                                        <p class="price">
                                            <?php $xp = getPrice($item->start_price, $item->promotion_price, $item->expire_date) ?>
                                            {!! $xp[1] !!}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                    @include('front.menu.include.carouse_slide')
                </aside>
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