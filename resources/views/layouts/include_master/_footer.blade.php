<footer class="footer">
    <div class="newsletter-wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="newsletter">
                        <form action="{{url('/post-subscribe')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <h4>{{_t('SIGN UP FOR EMAILS')}}</h4>
                                <input type="text" name="email" id="subscriber_email" value=""
                                       placeholder="{{_t('Enter Your Email')}}"
                                       class="form-control input-text required-entry validate-email"/>
                                <button class="subscribe" type="submit" name="submit_newsletter"
                                        id="submit_newsletter">
                                    <span>{{_t('Subscribe')}}</span></button>
                                <p id="subscriber_content" class="required"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-column pull-left">
                        <h4>{{_t('Customer Service')}}</h4>
                        <ul class="links">
                            <li class="first"><a href="{{url('/user/contact')}}">{{_t('Contact Us')}}</a></li>
                            <li><a href="{{url('/order/history')}}">{{_t('Order History')}}</a></li>
                            <li><a href="{{url('/side-map')}}">{{_t('Map Location')}}</a></li>
                            <li class="last"><a href="{{url('/my-account')}}" title="My Account">{{_t('My Account')}}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-column pull-left">
                        <h4>{{_t('Extras')}}</h4>
                        <ul class="links">
                            <li><a href="{{url('/wish-list')}}">{{_t('Wish List')}}</a></li>

                            <li><a href="{{url('/blog')}}">{{_t('Blog')}}</a></li>

                            <li class="last"><a href="{{url('/special')}}">{{_t('Specials')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-column pull-left">
                        <h4>{{_t('Information')}}</h4>
                        <ul class="links">
                            <li class="first"><a
                                        href="{{url('/how-to-use')}}">{{_t('FQAs')}}</a>
                            </li> <li class="first"><a
                                        href="{{url('/about')}}">{{_t('About Us')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-column pull-left">
                        <h4>{{_t('Contact Us')}}</h4>
                        <div class="contacts-info">
                            <address><i class="add-icon">&nbsp;</i>{{ \App\Models\Backend\WebSetting::getSetting('address')}}
                            </address>

                            <div class="phone-footer"><i class="phone-icon">&nbsp;</i>{{ \App\Models\Backend\WebSetting::getSetting('phone')}}</div>
                            <div class="email-footer"><i class="email-icon">&nbsp;</i>
                                <a href="mailto:{{ \App\Models\Backend\WebSetting::getSetting('email')}}">{{ \App\Models\Backend\WebSetting::getSetting('email')}}</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="social">
                        <ul>
                            <li class="fb pull-left"><a href="https://www.facebook.com/KSTStore/e"
                                                        target="_blank"></a></li>
                            <li class="tw pull-left"><a href="#" target="_blank"></a></li>
                            <li class="googleplus pull-left"><a href="#"
                                                                target="_blank"></a></li>
                            <li class="rss pull-left"><a href="#"
                                                         target="_blank"></a></li>
                            <li class="pintrest pull-left"><a href="#"
                                                              target="_blank"></a></li>
                            <li class="linkedin pull-left"><a href="#"
                                                              target="_blank"></a></li>
                            <li class="youtube pull-left"><a
                                        href="#"
                                        target="_blank"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    {{--<div class="payment-accept">--}}
                        {{--<img alt="payment1" src="{{$base_url_front}}/catalog/view/theme/lineademo1/image/payment-1.png">--}}
                        {{--<img alt="payment2" src="{{$base_url_front}}/catalog/view/theme/lineademo1/image/payment-2.png">--}}
                        {{--<img alt="payment3" src="{{$base_url_front}}/catalog/view/theme/lineademo1/image/payment-3.png">--}}
                        {{--<img alt="payment4" src="{{$base_url_front}}/catalog/view/theme/lineademo1/image/payment-4.png">--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-xs-12 coppyright">Copyright ©2017 KST COL.,TD (Cambodia). All rights reserved.</div>
                <div class="col-sm-7 col-xs-12 company-links">
                    {{--<ul class="links">--}}
                        {{--<li><a href="https://www.facebook.com/monk.line.9" target="_blank" title="OpenCart Themes">Chhai Manh</a></li>--}}
                        {{--<li><a href="https://www.facebook.com/ma.sam.568" target="_blank" title="Premium Themes">Sham Ma</a></li>--}}
                        {{--<li><a href="https://www.facebook.com/MengseangMK" target="_blank" title="Responsive Themes">Mengseang</a></li>--}}
                        {{--<li class="last"><a href="https://www.facebook.com/mengeanghak.general.formal" target="_blank" title="OpenCart Extensions">Mengeang</a></li>--}}
                    {{--</ul>--}}
                </div>


            </div>
        </div>
    </div>
</footer>


