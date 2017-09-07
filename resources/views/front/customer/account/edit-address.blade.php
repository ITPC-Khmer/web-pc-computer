@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><span>/</span>
                        <a href="{{url('/account')}}">Account</a>
                    </li>
                    <li><span>/</span>                            <strong>Edit Information</strong>            </li>

                </ul>
            </div>

            <div class="row">
                <div id="content" class="col-sm-9">
                    <div class="col-main">
                        <div class="my-account">
                            <div class="page-title">
                                <h2> Edit Address</h2>
                            </div>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{url('/edit-address')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" id="{{'id',$user->id}}">
                                <fieldset>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-firstname">User Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{$user->name}}" placeholder="User Name" id="input-firstname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-company">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="phone" value="{{$user->phone}}" placeholder="Phone" id="input-company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label"  for="input-country">City / Province</label>
                                        <div class="col-sm-10">
                                            <select name="province_city" id="input-country" value="{{$user->province_city}}" class="form-control">
                                                <option value="{{$user->province_city}}"> --- Please Select --- </option>
                                                <option value="Phnom-Penh">{{_t('Phnom Penh')}}</option>
                                                <option value="Sihanoukville">{{_t('Sihanoukville')}}</option>
                                                <option value="Seim-Reap">{{_t('Seim Reap')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="input-address-2">House Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="house_number" value="{{$user->house_number}}" placeholder="House Number" id="input-address-2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Sang kat')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sangkat" value="{{$user->sangkat}}" placeholder="Sangkat" id="input-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-country">{{_t('Select Location Type')}}</label>
                                        <div class="col-sm-10">
                                            <select name="location_type" value="{{$user->location_type}}" id="input-country" class="form-control">
                                                <option value="{{$user->location_type}}"> --- Please Select --- </option>
                                                <option value="Single-House">{{_t('Single House')}}</option>
                                                <option value="Town-House">{{_t('Town House')}}</option>
                                                <option value="Commercial-Building">{{_t('Commercial Building')}}</option>
                                                <option value="School">{{_t('School')}}</option>
                                                <option value="Condominium">{{_t('Condominium')}}</option>
                                                <option value="Office-Building">{{_t('Office Building')}}</option>
                                                <option value="Townhouse">{{_t('Townhouse')}}</option>
                                                <option value="Apartment">{{_t('Apartment')}}</option>
                                                <option value="Company">{{_t('Company')}}</option>
                                                <option value="Flat">{{_t('Fla')}}t</option>
                                                <option value="Others">{{_t('Others')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Road')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="road" value="{{$user->road}}" placeholder="Road" id="input-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Khan')}}</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="khan" value="{{$user->khan}}" placeholder="Khan" id="input-city" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="col-sm-2 control-label" for="input-city">{{_t('Direction guide')}}</label>
                                        <div class="col-sm-10">
                                            <textarea  name="direction_guide" value="{{$user->direction_guide}}" placeholder="direction guide" id="input-city" class="form-control" maxlength="2000"></textarea>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="buttons clearfix">
                                    <div class="pull-left"><a href="#" class="btn btn-default">{{_t('Back')}}</a></div>
                                    <div class="pull-right">
                                        <button type="submit" class="button continue">{{_t('Continue')}}</button>
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