<!DOCTYPE html>
<html dir="ltr" lang="en" class="ie8">
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @section('facebook')
        @show
        <title>@yield('title')</title>
        <base/>
        @section('layout_master1')
        @show
        <script src="{{$base_url_front}}/catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css"
              href="{{$base_url_front}}/maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="{{$base_url_front}}/maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        @section('layout_master2')
        @show
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700%7CFjalla+One%7COpen+Sans:300,400,600,700,800%7CPoppins:300,400,500,600,700"
              rel="stylesheet">
        <link rel="stylesheet" type="text/css"
              href="{{$base_url_front}}/maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css"
              href="{{$base_url_front}}/cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
              media="all">
        <link rel="stylesheet" href="{{$base_url_front}}/catalog/view/javascript/jquery/owl-carousel/owl.carousel.css"
              type="text/css">
        <link rel="stylesheet" href="{{$base_url_front}}/catalog/view/javascript/jquery/owl-carousel/owl.theme.css"
              type="text/css">
        <link rel="stylesheet" type="text/css"
              href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css"
              href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/jquery.mobile-menu.css">
        <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/revslider.css">
        <link href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{$base_url_front}}/catalog/view/theme/lineademo1/stylesheet/style.css"
              media="all">
        <script type="text/javascript" src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/revslider.js"></script>
        <script type="text/javascript" src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/common.js"></script>
        <script type="text/javascript" src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/common1.js"></script>
        <script type="text/javascript" src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript"
                src="{{$base_url_front}}/cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
        <script type="text/javascript"
                src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/jquery.mobile-menu.min.js"></script>
        <script type="text/javascript"
                src="{{$base_url_front}}/catalog/view/theme/lineademo1/js/jquery.countdown.min.js"></script>
        <link href="{{$base_url_front}}/image/catalog/cart.png" rel="icon"/>
        <link href="{{ $base_url }}assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ $base_url }}assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed|Hanuman" rel="stylesheet">
        <style>
            /* @import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed|Hanuman');*/
            body{
                font-family: 'Encode Sans Semi Condensed', sans-serif;
                font-family: 'Hanuman', serif;
            }
        </style>



        <meta name="csrf-token" content="{{ csrf_token() }}">
        @section('style_master2')
        @show
    </head>
    <style>

        .desktop-addCart {
            background: none repeat scroll 0 0 #1fc0a0 !important;
            color: #fff !important;
            display: inline-block;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            line-height: normal;
            padding: 8px 12px;
            text-transform: uppercase;
            border: 1px #5aa8eb solid !important;
            height: 33px;
            font-family: "Poppins", sans-serif;
            transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
            border-radius: 0px;
            text-shadow: none;
            box-shadow: none;
        }
        .mini-cart .basket a:before {
            content: '\f290';
            font-family: FontAwesome;
            font-size: 18px;
            color: #fff;
            display: inline-block;
            text-align: center;
            font-weight: normal;
            margin-right: 11px;
            background: #1fc0a0;
            padding: 11px 0px !important;
            border-radius: 999px;
            width: 40px !important;
            height: 40px !important;
            float: left;
        }
        .top-cart-contain .price {
            color: #777;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            padding-top: 4px !important;
            font-family: "Poppins", sans-serif;
            display: block;
        }
        .header-container {
            transition: all 0.5s;
            background: #fff;
            border-bottom: 1px solid #f1f1f1;
            margin-bottom: 1px !important;
        }
        nav {
            background: #333;
            /*border-bottom: 3px #1fc0a0 solid !important;*/
            /*height: 50px !important;*/
            width: 100%;
            margin: auto;
            z-index: 99;
            margin-bottom: 2px;
            /* border-left: 1px rgba(255,255,255,0.3) solid; */
            border-right: 1px rgba(255,255,255,0.3) solid;
            margin-top: 1px !important;
        }

        nav {
            background: #346088 !important;
        }
        footer {
            margin-top: 30px;
            padding-top: 30px;
            background-color: rgb(52, 96, 136) !important;
            border-top: 1px solid #ddd;
            color: #e2e2e2;
        }
        .newsletter-wrap {
            padding: 20px 0;
            overflow: hidden;
            clear: both;
            background: rgba(51, 122, 183, 0.32) !important;
        }
        .footer-bottom {
            margin: auto;
            overflow: hidden;
            padding: 20px 0 15px;
            width: 100%;
            font-weight: 500;
            background: #346997;
        }
        .pagination {
            margin: 0;
            width: 800px !important;
            text-align: center;
            border-radius: 0px;
        }
        .footer-top {
            clear: both;
            overflow: hidden;
            padding: 30px 0;
            border-top: 1px solid #346997 !important;
        }
        .footer-middle .col-md-3 {
            border-left: 1px solid #346997 !important;
            margin: auto;
            padding: 35px 20px;
            overflow: hidden;
        }
        .mini-cart .actions .btn-checkout {
            background: #346088 !important;
            color: #fff;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            padding: 10px 0px 8px;
            border: none;
            cursor: pointer;
            display: inline-block;
            transition: color 300ms ease-in-out 0s, background-color 300ms ease-in-out 0s, background-position 300ms ease-in-out 0s;
            float: left;
            letter-spacing: 0.5px;
            width: 48%;
            border-radius: 2px;
            text-decoration: none;
        }
        .bestsell-pro .block-title h2 {
            padding-top: 10px !important;
            color: #333;
            display: inline-block;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 1px;
            line-height: 18px;
            margin: auto;
            /* text-transform: uppercase; */
        }
    </style>

    @section('body_master3')
    @show
    @section('body_master2')
    @show
    @section('body_master1')
    @show
        @include('layouts.include_master._header')
        @yield('main-container')
        @section('script_master2_mid')
        @show


        @include('layouts.include_master._footer')
        </div>
        @include('layouts.include_master._mobile')

        <div id="mgkquickview">
            <div id="magikloading" style="display:none;text-align:center;margin-top:400px;">
                <img src="{{$base_url_front}}/catalog/view/theme/lineademo1/image/loading.gif" alt="loading">
            </div>
        </div>


        @section('script')
            <script src="{{ $base_url }}assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
            
            <script type="text/javascript">
                /*
	Add to cart fly effect with jQuery. - May 05, 2013
	(c) 2013 @ElmahdiMahmoud - fikra-masri.by
	license: https://www.opensource.org/licenses/mit-license.php
*/

                //              auto complete search item
                $(function () {
                    $('.search-select2-class').select2({
                        placeholder: 'Select an item',
                        ajax: {
                            url: "{{url('/select2data')}}",
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    results:  $.map(data, function (item) {
                                        return {
                                            text: item.title,
                                            id: item.id
                                        }
                                    })
                                };
                            },
                            cache: true
                        }
                    });

                    $('.search-select2-class').on('change', function() {
                //        alert($("#search").val());
                        window.location.href = ("{{url('/product-detail/')}}/"+$(".search-select2-class").val());
                    });

                });
                //              end auto complete search item
                //              script add to wishlist
                $(function () {
                    $.ajax({
                        url: '{{url('/get-wishlist')}}',
                        type: 'GET',
                        dataType: 'json',
                        async: true,
                        data: {},
                        success: function (data) {
                            listAddWishList(data);
                        },
                        error: function () {
                        }
                    });
                    $('body').delegate('.desktop-addWishList', 'click', function (e) {
                        e.preventDefault();
                        var wish_id = $(this).data('wish_id') - 0;
                        var wish_name = $(this).data('wish_name');
                        var wish_code = $(this).data('wish_code');
                        var wish_price = $(this).data('wish_price') - 0;
                        var wish_image = $(this).data('wish_image');
                        var wish_color = $('input[name="optionColor"]:checked').val();
                        var wish_size = $('input[name="optionSize"]:checked').val();

                        $.ajax({
                            url: '{{url('/add-wishlist')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            //async: true,
                            data: {
                                wish_id: wish_id,
                                wish_name: wish_name,
                                wish_code: wish_code,
                                wish_price: wish_price,
                                wish_image: wish_image,
                                wish_color: wish_color,
                                wish_size: wish_size,

                            },
                            success: function (data) {
                                listAddWishList(data);

//                                $('html, body').animate({
//                                    scrollTop: $("#wishlist-store").offset().top
//                                }, 2000);
                            },
                            error: function () {
                            }
                        });
                    });
                    $('body').delegate('.desktop-delete-wishlist', 'click', function (e) {
                        e.preventDefault();
                        var wishid = $(this).data('wishid');
                        $.ajax({
                            url: '{{url('/remove-wishlist')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                wishid: wishid
                            },
                            success: function (data) {
                                listAddWishList(data);
                            },
                            error: function () {
                            }
                        });
                    });

                });
                function listAddWishList(data) {
                    var checkoutHTML = '';
                    var totalqty = 0;
                    $.each(data, function (i, it) {
                        totalqty += (it.price * it.qty);
                        checkoutHTML +=
                            '<tr>' +
                            '<td class="text-center">' +
                            '<a href="{{url('/product-detail/')}}' + it.rowId +'">' +
                            '<img src="' + it.options.image + '" width="47" height="47" alt="' + it.name + '" title="' + it.name + '"></a>' +
                            '</td>' +
                            '<td class="text-left"><a href="{{url('/product-detail/')}}' + it.rowId +'">' + it.name + '</a></td>' +
                            '<td class="text-left">' + it.options.code + '</td>' +
                            '<td class="text-right">' + (it.qty) + '</td>' +
                            '<td class="text-right">' +
                            '<div class="price">$' + it.price + '</div>' +
                            '</td>' +
                            '<td class="text-right">' +
                            '<a href="#" data-id="' + it.rowId +'" data-code="' + it.options.code + '" data-image="' + it.options.image + '" data-price="' + it.price + '"  data-name="' + it.name + '" type="button" data-toggle="tooltip" title="" class="desktop-addCart btn btn-primary" data-original-title="Add to Cart">' +
                            '<i class="fa fa-shopping-cart"></i>' +
                            '</a>' +
                            '<a href="#" data-toggle="tooltip" title="" class="desktop-delete-wishlist btn btn-danger" data-wishid="' + it.rowId + '" data-original-title="Remove">' +
                            '<i class="fa fa-times"></i>' +
                            '</a>' +
                            '</td>' +
                            ' </tr>' ;
                    });
                    $('.wish-list-class').html(checkoutHTML);

                    var _subtotalPrice = $('.subtotalPrice').html() -0;
                    $('.tax_all').html((_subtotalPrice*0).toFixed(2));
                    $('.total_all').html((_subtotalPrice*1).toFixed(2));
                    totalQty();
                }
                //      end script add to wishlist
                //      script add to card
                function totalQty() {
                    $.ajax({
                        url: '{{url('/total-qty')}}',
                        type: 'GET',
                        dataType: 'json',
                        //                async: false,
                        async: true,
                        data: {},
                        success: function (data) {
                            //                        alert(data);
                            $('.totalqty1').text(data);
                        },
                        error: function () {
                            //                    alert('error');
                        }
                    });
                }
                $(function () {
                    $.ajax({
                        url: '{{url('/get-cart')}}',
                        type: 'GET',
                        dataType: 'json',
                        //                async: false,
                        async: true,
                        data: {},
                        success: function (data) {
                            //alert(data);
                            add_cart(data);
                            mobileAddCart(data);
                            checkout_addcart(data);
                            confirm_checkout_addcart(data)
                        },
                        error: function () {
                            //                    alert('error');
                        }
                    });
                    $('body').delegate('.desktop-addCart', 'click', function (e) {
                        e.preventDefault();
                        //                alert('123');
                        var id = $(this).data('id') - 0;
                        var name = $(this).data('name');
                        var code = $(this).data('code');
                        var price = $(this).data('price') - 0;
                        var image = $(this).data('image');
                        var qty = $('#qty').val();
                        var color = $('input[name="optionColor"]:checked').val();
                        var size = $('input[name="optionSize"]:checked').val();

                        $.ajax({
                            url: '{{url('/add-cart')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            //                    async: true,
                            data: {
                                id: id,
                                name: name,
                                code: code,
                                price: price,
                                image: image,
                                qty: qty,
                                color: color,
                                size: size

                            },
                            success: function (data) {
                                //alert(data);
                                //                        console.log(data);
                                add_cart(data);
                                mobileAddCart(data);
                                checkout_addcart(data);
                                confirm_checkout_addcart(data);



//                                $('html, body').animate({
//                                    scrollTop: $("#cart").offset().top
//                                }, 2000);




                            },
                            error: function () {
                                //                        alert('error');
                            }
                        });
                    });
                    $('body').delegate('.desktop-delete-cart', 'click', function (e) {
                        e.preventDefault();
                        var rowid = $(this).data('rowid');
                        $.ajax({
                            url: '{{url('/remove-cart')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            //                    async: true,
                            data: {
                                rowid: rowid,
                            },
                            success: function (data) {
                                //alert(data);
                                add_cart(data);
                                mobileAddCart(data);
                                checkout_addcart(data);
                                confirm_checkout_addcart(data)
                            },
                            error: function () {
                                //                        alert('error');
                            }
                        });
                    });
                    $('body').delegate('.update-card', 'click', function (e) {
                        e.preventDefault();
                        var p = $(this).parentsUntil('tr').parent();
                        var id = $(this).data('rowid');
                        var qty__ = p.find('.qty__').val();
                        $.ajax({
                            url: '{{url('/update-cart')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            //                    async: true,
                            data: {
                                id: id,
                                qty: qty__
                            },
                            success: function (data) {
                                //alert(data);
                                add_cart(data);
                                mobileAddCart(data);
                                checkout_addcart(data);
                                confirm_checkout_addcart(data)
                            },
                            error: function () {
                                //                        alert('error');
                            }
                        });
                    });
                    $('body').delegate('.desktop-destroy-cart', 'click', function (e) {
                        e.preventDefault();
                        var rowid = $(this).data('rowid');
                        $.ajax({
                            url: '{{url('/destroy-cart')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                rowid: rowid,
                            },
                            success: function (data) {
                                //alert(data);
                                add_cart(data);
                                mobileAddCart(data);
                                checkout_addcart(data);
                                confirm_checkout_addcart(data)
                            },
                            error: function () {
                                //                        alert('error');
                            }
                        });
                    });
                    //                use for select item option
                    //                mobile update card
                    $('body').delegate('.mobile-update-cart', 'change', function (e) {
                        e.preventDefault();
                        //                    alert('fdgfd');
                        var rowidz = $(this).data('rowid');
                        var qty = $(this).val() - 0;
                        $.ajax({
                            url: '{{url('/update-cart1')}}',
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {
                                rowid: rowidz,
                                qty: qty,
                            },
                            success: function (data) {
                                //alert(data);
                                add_cart(data);
                                mobileAddCart(data);
                                checkout_addcart(data);
                                confirm_checkout_addcart(data)
                            },
                            error: function () {
                                //                        alert('error');
                            }
                        });
                    });
                    //                end mobile update
                });
                function add_cart(data) {
                    var html = '';
                    var total = 0;
                    var totalqty = 0;
                    $.each(data, function (i, it) {
                        total += (it.price * it.qty);
                        totalqty += (it.qty);
                        html +=  '<tr>' +
                            '<td class="text-center">' +
                            '<a href="{{url("/product-detail/")}}' + it.rowId +'">' +
                            '<img src="' + it.options.image + '" width="75" height="91" alt="' + it.name + '" title="' + it.name + '" class="img-thumbnail">' +
                            '</td>' +
                            '<td class="text-left">' +
                            '<a href="{{url("/product-detail/")}}' + it.rowId +'">' + it.name + '</a>' +
                            '</td>' +
                            '<td class="text-right">x ' + (it.qty) + '</td>' +
                            '<td class="text-right">$ ' + it.price + '</td>' +
                            '<td class="text-center">' +
                            '<button type="button" title="Remove" class="btn btn-danger btn-xs"><i class="fa fa-times desktop-delete-cart" data-rowid="' + it.rowId + '"></i>' +
                            '</button>' +
                            '</td>' +
                            '</tr>';
                    });
                    if (html == '') {
                        $('.item-order-add-to-card').html('<p style="text-align: center;">No added item in your cart. </p><p style="text-align: center;">Click <strong>Add to Cart</strong> button on the dish to begin your order</p>');
                    } else {
                        $('.item-order-add-to-card').html(html);
                    }
                    $('.subtotalPrice').text(total.toFixed(2));
                    totalQty();
                }
                function mobileAddCart(data) {
                    var mobileHtml = '';
                    var total = 0;
                    var totalqty = 0;
                    $.each(data, function (i, it) {
                        totalqty += (it.qty);
                        total += (it.price * it.qty);
                        mobileHtml +='<li class="product-display-box">' +
                            '<img src="' + it.options.image + '">' +
                            '<div class="details-box">' +
                            '<div class="item-title"' + it.name + '</div>' +
                            '<div class="select-amount">' +
                            '<p><span class="ng-binding">Quantity:&nbsp;</span><span class="bold black">' + (it.qty) + '</span></p>' +
                            '<select class="cart-item-text-mobile mobile-update-cart" data-rowid="' + it.rowId + '">' +
                            select(it.qty) +
                            '</select>' +
                            '</div>' +
                            '<p class="amount"><span class="ng-binding">' + it.price + '</span><span class="ng-binding">&nbsp;$</span></p>' +
                            '</div>' +
                            '<div class="btn-delete delete-cart-item-mobile desktop-delete-cart" data-rowid="' + it.rowId + '"></div>' +
                            '</li>';
                    });
                    if (mobileHtml == '') {
                        $('.mobile-item-order-add-to-cart').html('<p class="m-t m-b-0" style="text-align: center;">Click <span style="color:#ff3333">Add to Cart</span> button on the dish<br> to begin your order</p><p class="m-a-0" style="text-align: center;">your can click on proceed check out or continue order</p>');
                    } else {
                        $('.mobile-item-order-add-to-cart').html(mobileHtml);
                    }
                    $('.subtotalPrice').text(total.toFixed(2));
                    totalQty();
                }
                function select(num) {
                    var selectHtml = '';
                    var select = '';
                    for (i = 1; i < 100; i++) {
                        if (i == num) {
                            select = 'selected';
                        } else {
                            select = '';
                        }
                        selectHtml += '<option ' + select + ' value="' + i + '">' + i + '</option>';
                    }
                    return selectHtml;
                }
                function checkout_addcart(data) {
                    var checkoutHTML = '';
                    var totalqty = 0;
                    $.each(data, function (i, it) {
                        totalqty += (it.price * it.qty);
                        checkoutHTML +=  '<tr>' +
                            '<td class="text-center">' +
                            '<a href="{{url("/product-detail/")}}' + it.rowId +'">' +
                            '<img src="' + it.options.image + '" width="75" height="91" alt="' + it.name + '" class="img-thumbnail"/>' +
                            '</a>' +
                            '</td>' +
                            '<td class="text-left">' +
                            '<a href="{{url("/product-detail/")}}' + it.rowId +'">' + it.name + '</a>' +
                            '</td>' +
                            '<td class="text-left">' + it.options.code + '</td>' +
                            '<td class="text-left">' +
                            '<div class="input-group btn-block" style="max-width: 200px;">' +
                            '<input type="number" min="1" value="' + it.qty + '" size="1" data-rowid="' + it.rowId + '" class="form-control qty__"/>' +
                            '<span class="input-group-btn">' +
                            '<a href="#" data-toggle="tooltip" title="Update" data-rowid="' + it.rowId + '" class="update-card btn btn-primary">' +
                            '<i class="fa fa-refresh">' +
                            '</i>' +
                            '</a>' +
                            '<a href="#" data-toggle="tooltip" title="Remove" class="btn btn-danger desktop-delete-cart" data-rowid="' + it.rowId + '">' +
                            '<i class="fa fa-times-circle"></i></a>' +
                            '</span>' +
                            '</div>' +
                            '</td>' +
                            '<td class="text-right">$' + it.price + '</td>' +
                            '<td class="text-right">$' + (it.price * it.qty).toFixed(2) + '</td>' +
                            '</tr>';
                    });
                    $('.checkout-cart-detail').html(checkoutHTML);

                    var _subtotalPrice = $('.subtotalPrice').html() -0;
                    $('.tax_all').html((_subtotalPrice*0).toFixed(2));
                    $('.total_all').html((_subtotalPrice*1).toFixed(2));
                    totalQty();
                }
                function confirm_checkout_addcart(data) {
                    var confirmCheckoutHTML = '';
                    var totalqty = 0;
                    $.each(data, function (i, it) {
                        totalqty += (it.price * it.qty);
                        confirmCheckoutHTML +=
                            '<tr>' +
                            ' <td class="text-left">' +
                            '<a href="{{url("/product-detail/")}}' + it.rowId +'">' + it.name + '</a>' +
                            '</td>' +
                            '<td class="text-left">' + it.options.code +'</td>' +
                            '<td class="text-right">' + (it.qty) + '</td>' +
                            '<td class="text-right">$' + it.price + '</td>' +
                            '<td class="text-right">$' + (it.price * it.qty).toFixed(2) + '</td>' +
                            '</tr>';

                    });
                    $('.confirm-checkout-cart-detail').html(confirmCheckoutHTML);

                    var _subtotalPrice = $('.subtotalPrice').html() -0;
                    $('.tax_all').html((_subtotalPrice*0).toFixed(2));
                    $('.total_all').html((_subtotalPrice*1).toFixed(2));
                    totalQty();
                }
                //      end script add to card
            </script>
        @show
    </body>
</html>