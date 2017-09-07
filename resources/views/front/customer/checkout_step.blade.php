@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{url('/')}}">{{_t('Home')}}</a>
                </li>
                <li><span>/</span>
                    <a href="{{url('/checkout')}}">{{_t('Shopping Cart')}}</a>
                </li>
                <li><span>/</span>
                    <strong>{{_t('Checkout')}}</strong>
                </li>

            </ul>
        </div>
        <div class="row">
            <div id="content" class="col-sm-12">
                <div class="col-main">

                    <div class="checkout-inner">
                        <div class="page-title">
                            <h1>{{_t('Checkout')}}</h1></div>
                        <div class="panel-group" id="accordion">
                            {{--=======================================================================--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><span class="number">1</span> {{_t('Delivery Details')}}</h4>
                                </div>
                                {{--<div class="panel-collapse collapse" id="collapse-shipping-address">--}}
                                <div class="panel-collapse show-data" style="display: block;" id="collapse-shipping-address">
                                    <div class="panel-body">
                                        @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <form class="form-horizontal"  method="POST" action="{{ url('/update-checkout-step') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="radio radio-click">
                                                <label>
                                                    <input type="radio" name="shipping_address" id="myCheckbox" value="existing" checked="checked">
                                                    {{_t('I want to use an existing address')}}</label>
                                            </div>
                                            <div id="shipping-existing" class="radio-show-data" style="display: block;">
                                                <select name="address_id" class="form-control">
                                                    <option value="20" selected="selected">{{$user->name}}, {{$user->house_number}}, {{$user->road}}, {{$user->sangkat}}, {{$user->khan}} ,{{$user->province_city}}</option>
                                                </select>
                                            </div>

                                            <div class="radio radio-click-a">
                                                <label>
                                                    <input type="radio" id="myCheckbox1" name="shipping_address" value="new">
                                                    {{_t('I want to use a new address')}}</label>
                                            </div>

                                            <br>
                                            <div id="shipping-new" class="radio-show-data-a" style="display: none;">
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-firstname">{{_t('First Name')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="name" value="{{$user->name}}" placeholder="{{_t('First Name')}}" id="input-shipping-firstname" class="form-control">
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-company">{{_t('Phone')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" maxlength="10" name="phone" value="{{$user->phone}}" placeholder="{{_t('Phone')}}" id="input-shipping-company" class="form-control">
                                                        @if ($errors->has('phone'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-address-2">{{_t('House Number')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="house_number" value="{{$user->house_number}}" placeholder="{{_t('House Number')}}" id="input-shipping-address-2" class="form-control">
                                                        @if ($errors->has('house_number'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('house_number') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-city">{{_t('Road')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="road" value="{{$user->road}}" placeholder="road" id="input-shipping-city" class="form-control">
                                                        @if ($errors->has('road'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('road') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-postcode">{{_t('Sangkat')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="sangkat" value="{{$user->sangkat}}" placeholder="Sangkat" id="input-shipping-postcode" class="form-control">
                                                        @if ($errors->has('sangkat'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('sangkat') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-postcode">{{_t('Khan')}}</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="khan" value="{{$user->khan}}" placeholder="{{_t('Khan')}}" id="input-shipping-postcode" class="form-control">
                                                        @if ($errors->has('khan'))
                                                            <span class="help-block">
                                                                    <strong>{{ $errors->first('khan') }}</strong>
                                                                </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-country">{{_t('City/Province')}}</label>
                                                    <div class="col-sm-10">
                                                        <select name="province_city" value="{{$user->province_city}}" id="input-shipping-country" class="form-control">
                                                            <option value="{{$user->province_city}}" selected="selected">{{_t('Select City or Province')}}</option>
                                                            <option value="phnom-penh">{{_t('Phnom Penh')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label class="col-sm-2 control-label" for="input-shipping-country">{{_t('Location Type')}}</label>
                                                    <div class="col-sm-10">
                                                        <select name="location_type" value="{{$user->location_type}}"  id="input-shipping-country" class="form-control">
                                                            <option value="{{$user->location_type}}"> --- {{_t('Please Select')}} --- </option>
                                                            <option value="single-house">{{_t('Single House')}}</option>
                                                            <option value="commercial-building">{{_t('Commercial Building')}}</option>
                                                            <option value="school">{{_t('School')}}</option>
                                                            <option value="condominium">{{_t('Condominium')}}</option>
                                                            <option value="office-building">{{_t('Office Building')}}</option>
                                                            <option value="apartment">{{_t('Apartment')}}</option>
                                                            <option value="company">{{_t('Company')}}</option>
                                                            <option value="flat">{{_t('Flat')}}</option>
                                                            <option value="others">{{_t('Others')}}</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <p><strong>{{_t('Add Direction Guide About Your Location in Short')}}</strong></p>
                                                <textarea name="direction_guide" placeholder="{{$user->direction_guide}}" rows="8" class="form-control"></textarea>
                                                @if ($errors->has('direction_guide'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('direction_guide') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="buttons clearfix">
                                                <div class="pull-right">
                                                    <button type="submit" id="button-shipping-address" data-loading-text="Loading..." class="button">{{_t('Update')}}</button>
                                                    <button type="button" id="button-shipping-address" data-loading-text="Loading..." class="button continue show-click">{{_t('Continue')}}</button>

                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            {{--=======================================================================--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><span class="number">2</span> {{_t('Confirm Delivery Information')}}</h4>
                                </div>
                                <div class="panel-collapse show-data-a" style="display: none;" id="collapse-payment-method">
                                    <div class="panel-body"><p>{{_t('Please read about your information before click "Confirm Button"!!!.')}}</p>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-shipping-company">{{_t('Name')}}</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" maxlength="10" name="phone" value="{{$user->name}}" placeholder="{{_t('Name')}}" id="input-shipping-company" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-shipping-company">{{_t('Phone')}}</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" maxlength="10" name="phone" value="{{$user->phone}}" placeholder="{{_t('Phone')}}" id="input-shipping-company" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-shipping-address-2">{{_t('Location')}}</label>
                                            <div class="col-sm-10">
                                                <input disabled type="text" name="house_number" value="{{$user->house_number.','.$user->road.','.$user->sangkat.','.$user->khan.','.$user->province_city}}" placeholder="House Number" id="input-shipping-address-2" class="form-control">
                                            </div>
                                        </div>

                                        <p><strong>{{_t('Location Guide')}}</strong></p>
                                        <p>
                                            <textarea disabled name="comment" rows="8" class="form-control" >{{$user->direction_guide}}</textarea>
                                        </p>

                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <button type="button" id="button-shipping-address" data-loading-text="Loading..." class="button show-click-b">{{_t('Change')}}</button>
                                                <button type="button" id="button-payment-method" data-loading-text="Loading..." class="button continue show-click-a">{{_t('Confirm')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--=======================================================================--}}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><span class="number">3</span> {{_t('Confirm Order')}}</h4>
                                </div>
                                {{--<div class="panel-collapse collapse" id="collapse-checkout-confirm">--}}
                                <form action="{{url('/checkout-step')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="panel-collapse show-data-b" style="display: none;" id="collapse-checkout-confirm">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <td class="text-left">{{_t('Product Name')}}</td>
                                                        <td class="text-left">{{_t('Product Code')}}</td>
                                                        <td class="text-right">{{_t('Quantity')}}</td>
                                                        <td class="text-right">{{_t('Unit Price')}}</td>
                                                        <td class="text-right">{{_t('Total')}}</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="confirm-checkout-cart-detail">
                                {{--==============================================confirm checkout order ===========================================================--}}
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="4" class="text-right"><strong>{{_t('Sub Total')}}:</strong></td>
                                                        <td class="text-right">$<span class="subtotalPrice"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="text-right"><strong>{{_t('TAX(0%)')}}:</strong></td>
                                                        <td class="text-right">$<span class="tax_all"><?php echo Cart::tax(); ?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="text-right"><strong>{{_t('Delivery Fee')}}:</strong></td>
                                                        <td class="text-right">$<span class="">0.00</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="text-right"><strong>{{_t('Grand Total')}}:</strong></td>
                                                        <td class="text-right">$<span class="total_all"><?php echo Cart::total(); ?></span></td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            {{--=======================datetime=========================--}}
                                            <p><strong>{{_t('Choose Your Delivery Date Time')}}</strong></p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-option9">{{_t('Date')}}</label>
                                                        <div class="input-group date">
                                                            <input type="text" name="delivery_date" placeholder="{{_t('yyyy-mm-dd')}}" data-date-format="YYYY-MM-DD" id="input-option9" class="form-control" required>
                                                            <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-option10">{{_t('Time')}}</label>
                                                        <div class="input-group time">
                                                            <input type="text" name="delivery_time" placeholder="{{_t('00h:00mn')}}" data-date-format="HH:mm" id="input-option10" class="form-control" required>
                                                            <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--=======================end datetime=========================--}}
                                            <input type="hidden"name="u_id" value="{{Auth::id()}}" required>
                                            <div class="buttons">
                                                <div class="pull-right">
                                                    <input type="submit" value="Confirm Order" id="button-confirm" class="btn btn-primary" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            {{--=======================================================================--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent

    <script>

        $(".show-click").click(function () {
            $(".show-data").css("display", "none");
            $(".show-data-a").css("display", "block");
        });
        $(".show-click-a").click(function () {
            $(".show-data-a").css("display", "none");
            $(".show-data-b").css("display", "block");
        });
        $(".show-click-b").click(function () {
            $(".show-data-a").css("display", "none");
            $(".show-data").css("display", "block");
            $('#myCheckbox').prop('checked', false);
            $('#myCheckbox1').prop('checked', true);
            $(".radio-show-data-a").css("display", "block");
            $(".radio-show-data").css("display", "none");
        });
        //        =======================
        $(".radio-click").click(function () {
            $(".radio-show-data").css("display", "block");
            $(".radio-show-data-a").css("display", "none");
        });
        $(".radio-click-a").click(function () {
            $(".radio-show-data-a").css("display", "block");
            $(".radio-show-data").css("display", "none");
        });

//        $( document ).ready(function() {
//
//        });
    </script>
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
