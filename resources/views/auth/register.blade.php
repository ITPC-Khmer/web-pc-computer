@extends('layouts.master')
@section('title', 'Page Title')
@section('main-container')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{url('/')}}">{{_t('Home')}}</a>
                    </li>
                    <li><span>/</span>
                        <a href="{{url('/login')}}">{{_t('Account')}}</a>
                    </li>
                    <li><span>/</span>
                        <strong>{{_t('Register')}}</strong>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div id="content" class="col-sm-9">
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <h2> {{_t('Register Account')}}</h2>
                            </div>
                            <p>{{_t('If you already have an account with us, please login at the')}}
                                <a href="{{url('/login')}}">{{_t('login page')}}</a>.</p>

                            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <fieldset id="account">
                                    <legend>{{_t('Your Personal Details')}}</legend>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} required">
                                        <label class="col-sm-2 control-label" for="input-firstname">{{_t('Username')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="{{_t('Username')}}" id="name" class="form-control">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                   </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                                        <label class="col-sm-2 control-label" for="input-email">{{_t('E-Mail')}}</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="" placeholder="{{_t('E-Mail')}}" id="input-email" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-telephone">{{_t('Telephone')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" maxlength="10" name="phone" placeholder="{{_t('Phone')}}" id="phone" class="form-control">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset id="address">
                                    <legend>{{_t('Your Address')}}</legend>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-zone">{{_t('Select Location Type')}}</label>
                                        <div class="col-sm-10">
                                            <select name="location_type" id="input-zone" class="form-control">
                                                <option value=""> --- {{_t('Please Select')}} --- </option>
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
                                            @if ($errors->has('location_type'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('location_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-country">{{_t('City Province')}}</label>
                                        <div class="col-sm-10">
                                            <select name="province_city" id="input-country" class="form-control">
                                                <option value=""> --- {{_t('Please Select')}} --- </option>
                                                <option value="phnom-penh">{{_t('Phnom Penh')}}</option>
                                                @if ($errors->has('province_city'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('province_city') }}</strong>
                                                </span>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-company">{{_t('House Number')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="house_number" value="" placeholder="{{_t('House Number')}}" id="house_number" class="form-control">
                                            @if ($errors->has('house_number'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('house_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-address-1">{{_t('Road')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="road" value="" placeholder="{{_t('Road')}}" id="road" class="form-control">
                                            @if ($errors->has('road'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('road') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Sangkat')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sangkat" value="" placeholder="{{_t('Sangkat')}}" id="sangkat" class="form-control">
                                            @if ($errors->has('sangkat'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('sangkat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Khan')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="khan" value="" placeholder="{{_t('Khan')}}" id="khan" class="form-control">
                                            @if ($errors->has('khan'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('khan') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </fieldset>
                                <fieldset id="address">
                                    <legend>{{_t('Please describe your address direction in short')}} :</legend>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-address-1">{{_t('Direction Guide')}}</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" name="direction_guide" value="" placeholder="{{_t('Direction Guide')}}*" id="direction_guide" style="height: 90px;" class="form-control"></textarea>
                                            @if ($errors->has('direction_guide'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('direction_guide') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                </fieldset>
                                <fieldset>
                                    <legend>{{_t('Your Password')}}</legend>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                                        <label class="col-sm-2 control-label" for="input-password">{{_t('Password')}}</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" value="" placeholder="{{_t('Password')}}" id="password" class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-confirm">{{_t('Password Confirm')}}</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password_confirmation" value="" placeholder="{{_t('Password Confirm')}}" id="password_confirmation" class="form-control">
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="buttons">
                                    <div class="pull-right">{{_t('I have read and agree to the')}} <b>{{_t('Privacy Policy')}}</b>
                                        <input type="checkbox" name="agree" value="1">
                                        <button type="submit" class="button continue"> {{_t('Continue')}} </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('front.customer.include_cust.aside')
            </div>
        </div>
    </div>
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