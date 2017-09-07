@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia How to use?')
@section('main-container')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}">{{_t('Home')}}</a>
                    </li>
                    <li><span>/</span> <strong>{{_t('How to use?')}}</strong></li>
                </ul>
            </div>
            <div class="row">
                <div id="content" class="col-sm-9 col-sm-push-3">
                    <div class="col-main">
                        <div class="static-inner">


                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i></i>How to order online by Website with KHIEV SAM ANG TRADING CO.,LTD</div><br>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                        <a href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="panel-group accordion" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">1. How to register?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_1" class="panel-collapse in">
                                                <div class="panel-body">
                                                    <p> If you never register account before, You just click on "My Account" or "Login" on the top >
                                                        under New Customer Register Account click on "CONTINUE" >
                                                        fill all the information in the Register Account click "CONTINUE"
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">2. How to login?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_2" class="panel-collapse collapse">
                                                <div class="panel-body" style="height:200px; overflow-y:auto;">
                                                    <p> If you have the member account that you ever register before you can click "My Account" or "Login" on the top >
                                                    Under Returning Customer fill the "Email" and "Password"> if your want to remember just click on "Remember Me" > than click Login </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">3. If I forget my password, what do I do?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3" class="panel-collapse collapse">
                                                <div class="panel-body" style="height:200px; overflow-y:auto;">
                                                    <p> If you forget your password to log in to your account, click "Login" > click "Forget Password"
                                                    > fill the email address you used to register account > click "CONTINUE". KHIEV SAM ANG TRADING CO.,LTD
                                                        will send you the new password to your email address so you can access your account.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">4. How do I order product online? </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_4" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>It’s easy to order food online with KHIEV SAM ANG TRADING CO.,LTD! Follow these steps
                                                        Click “HOME or each of PRODUCT CATEGORIES” under the "ALL CATEGORIES" > click all of the "ADD TO CART" button under the picture of
                                                        the product that you wish to order> click “SHOPPING CART” on the top right corner >
                                                        click “VIEW CART” > review your order > click “CHECKOUT” > fill in the delivery information > Click on radio button "I want to use a new address", If you want to change your location than click update. If not just click on "CONTINUE" button
                                                        > click "CONFIRM" > if you want to change your information click "CHANGE" than refill the information click "UPDATE" > click continue > click "CONFIRM"
                                                        > choose your delivery date time by Click on Date and Time > click "CONFIRM ORDER"
                                                        choose your method of order > confirm your order > wait for an email to confirm your order.
                                                        That’s all you need to do to enjoy our delicious meals through delivery!  </p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_5">5. How to add product to wishlist?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_5" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p> If you want to add the product to wish list Scroll Mouse on the image of product > click "Heard Icon"
                                                    > Click on "Wish List" on the top to view all the wish list product</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_6">6. How to order product in wishlist to shopping cart?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_6" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>If you want to order product that you had ever add to wish list > click "Whist List" at the top >
                                                        click the "Menu dishes" to add product to "SHOPPING CART"</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_7">7. How to check order history?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_7" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>After you log in your account you can click on "My Account" at the top> Click "Order History" </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_8">8. How to update password?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_8" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p> If you cant to update your password click "My Account" at the top > click "Password" > input your Old Password , New Password and Confirm New Password</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_9">9. How to update address?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_9" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p> If you cant to update your address information click "My Account" at the top > click "Address Book" > click "EDIT ADDRESS" > input your information instead of the old information > click "CONTINUE"</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_10">10. How to update account information?</a>
                                                </h4>
                                            </div>
                                            <div id="collapse_10" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p> If you cant to update your account information click "My Account" at the top > click "Edit Account" > input your information instead of the old information > click "CONTINUE"</p>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.page.include.aside-menu')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ $base_url }}assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
@endsection
@section('body_master3')
    <body class="information-information-4 ">
    <div id="page" class="category_page">
@endsection
