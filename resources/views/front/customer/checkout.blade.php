@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">

                <div class="page-title">
                    <h2 style="font-size: 16px;">{{_t('Shopping Cart')}}
                    </h2>
                </div>
                <div class="row">
                    <div id="content" class="col-sm-12">

                        <form action="#" method="post"
                              enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="data-table cart-table" id="shopping-cart-table">
                                    <thead>
                                    <tr>
                                        <td class="text-center">{{_t('Image')}}</td>
                                        <td class="text-left">{{_t('Product Name')}}</td>
                                        <td class="text-left">{{_t('Product Code')}}</td>
                                        <td class="text-left">{{_t('Quantity')}}</td>
                                        <td class="text-right">{{_t('Unit Price')}}</td>
                                        <td class="text-right">{{_t('Total')}}</td>
                                    </tr>
                                    </thead>

                                    <tbody class="checkout-cart-detail">

                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-8 col-xs-12">
                            </div>


                            <div class="col-sm-4 col-xs-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-right"><strong>{{_t('Sub Total')}}:</strong></td>
                                        <td class="text-right">$<span class="subtotalPrice"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>{{_t('TAX(0%)')}}:</strong></td>
                                        <td class="text-right">$<span class="tax_all"><?php echo Cart::tax(); ?></span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>{{_t('Delivery Fee')}}:</strong></td>
                                        <td class="text-right">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>{{_t('Grand Total')}}:</strong></td>
                                        <td class="text-right">$<span class="total_all"><?php echo Cart::total(); ?></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="buttons">
                            <div class="pull-left">
                                <!-- <a href="" class="btn btn-default"></a> -->
                                <a href="{{url('/')}}" class="button btn-continue" type="button">
                                    <span><span>{{_t('Continue Shopping')}}</span></span></a>
                            </div>
                            <div class="pull-right">
                                <!-- <a href="" class="btn btn-primary"></a> -->
                                @if (Auth::guest())
                                    <a href="{{url('/checkout-step')}}" class="button btn-proceed-checkout" type="submit"><span>{{_t('Checkout')}}</span></a>
                                @else
                                    <a href="{{url('/checkout-step').'/'.Auth::id()}}" class="button btn-proceed-checkout" type="submit"><span>{{_t('Checkout')}}</span></a>
                                @endif
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
@section('layout_master2')
    <link href="{{$base_url_front}}/catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="{{$base_url_front}}/catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
    {{--<link href="#" rel="canonical" />--}}
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