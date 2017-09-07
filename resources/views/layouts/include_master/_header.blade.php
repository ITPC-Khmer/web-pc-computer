<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-6 col-lg-6 pull-left">
                    <div class="dropdown block-language-wrapper">
                        <a href="#" title="Nederlands" class="block-language dropdown-toggle" data-target="#" data-toggle="dropdown" role="button">
                            <img alt="Nederlands" width="25" height="10" @if(get_ses_lang()=='kh') src="{{$base_url_front}}/catalog/language/kh/khmer.png" @else src="{{$base_url_front}}/catalog/language/en/english.png" @endif > @if(get_ses_lang()=='kh') ខ្មែរ @else English @endif<span class="caret"></span> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation">
                                <a class="{{ get_ses_lang()=='kh'?'active':'' }}" href="{{ url('/change_lang/kh') }}" ><img src="{{$base_url_front}}/catalog/language/kh/khmer.png" alt="Khmer" width="16" height="11" title="Khmer"> ខ្មែរ</a>
                            </li>
                            <li role="presentation">
                                <a class="{{ get_ses_lang()=='en'?'active':'' }}" href="{{ url('/change_lang/en') }}" ><img src="{{$base_url_front}}/catalog/language/en/english.png" width="16" height="11" alt="English" title="English"> English</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 pull-right hidden-xs">
                    <div class="toplinks">
                        <div class="links">
                            <div class="myaccount">
                                <a title="FQAs" href="{{url('/how-to-use')}}"><span
                                            class="hidden-xs">{{_t('FQAs')}}</span>
                                </a>
                            </div><div class="myaccount">
                                <a title="My Account" href="{{url('/my-account')}}"><span
                                            class="hidden-xs">{{_t('My Account')}}</span>
                                </a>
                            </div>
                            @if (Auth::guest())
                                <div class="check">
                                    <a title="Checkout" href="{{url('/checkout')}}"><span
                                                class="hidden-xs">{{_t('Checkout')}}</span></a>
                                </div>
                                <div id="wishlist-store" class="check"><a title="Wish List"
                                                                          href="{{url('/wish-list')}}"><span
                                                class="hidden-xs">{{_t('Wish List')}}</span></a>
                                </div>
                            @else
                                <div class="check">
                                    <a title="Checkout" href="{{url('/checkout')}}">
                                        <span class="hidden-xs">{{_t('Checkout')}}</span>
                                    </a>
                                </div>
                                <div id="wishlist-store" class="check">
                                    <a title="Wish List" href="{{url('/wish-list')}}">
                                        <span class="hidden-xs">{{_t('Wish List')}}</span>
                                    </a>
                                </div>
                            @endif

                            @if(!is_t() && !is_m())
                            <div class="demo">
                                <a title="Blog" href="{{url('/blog')}}"><span class="hidden-xs">{{_t('Blog')}}</span></a>
                            </div>
                            @endif

                            <div class="dropdown block-company-wrapper hidden-xs">
                                <a role="button" data-toggle="dropdown" data-target="#" class="block-company dropdown-toggle" href="#"> {{_t('Information')}}
                                    <span class="caret">
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation"><a
                                                href="{{url('/how-to-use')}}">{{_t('FQAs')}}</a>
                                    </li>
                                    <li role="presentation"><a
                                                href="{{url('/about')}}">{{_t('About Us')}}</a>
                                    </li>
                                    <li role="presentation">
                                        <a href="{{url('/user/contact')}}">{{_t('Contact Us')}}</a>
                                    </li>
                                </ul>
                            </div>
                            @if (Auth::guest())
                                <div class="login">
                                    <a href="{{url('/login')}}">
                                        <span class="hidden-xs">{{_t('Login')}}</span>
                                    </a>
                                </div>
                            @else
                                <div class="login">
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="hidden-xs">{{ _t('Logout') }}</span>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(is_m() && !is_t())
                <div class="col-xs-12 hidden-ms">
                    <select class="typeahead searchbox search-box-select2 search-select2-class" id="search" name="search"></select>
                </div>
            @endif
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 logo-block">
                <a class="logo" href="{{url('/home')}}" title="Your Store">
                    @if(is_m())
                        <img src="{{$base_url_front}}/image/logo/logo.png" title="Your Store" width="240" height="50" alt="Your Store"/>
                    @else
                        <img src="{{$base_url_front}}/image/logo/logo.png" title="Your Store" width="280" height="53" alt="Your Store"/>
                    @endif
                </a>
            </div>
           
            {{--=======================================desktop search item=========  =========================--}}
                <div class="col-lg-7 col-md-6 col-sm-5 col-xs-3 hidden-xs category-search-form hidden-xs">
                    <div id="search_mini_form" style="padding-top: 25px;" >
                        <select class="typeahead searchbox search-box-select2 search-select2-class" id="search" name="search"></select>
                    </div>
                </div>

            {{--=======================================end desktop search item==================================--}}


        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12 card_wishlist_area">
            <br>
                <div class="mm-toggle-wrap">
                    <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">{{_t('Menu')}}</span>
                    </div>
                </div>
                <div class="top-cart-contain">
                    <div class="mini-cart">


                        {{--====================fix icon order ========================--}}
                        <style>
                            #myBtn {
                                width: auto;
                                height: auto;
                                min-height:10%;
                                max-hight: 10%;
                                position: fixed;
                                bottom: 90%;
                                top: 30%;
                                right: 0%;
                                z-index: 99;
                                outline: none;
                                background-color: #1fc0a0;
                                color: white;
                                cursor: pointer;
                                padding: 1%;
                                border-radius: 4px !important;
                                border: solid white 2px;
                            }

                        </style>

                            <button class="btn hidden-xs" onclick="topFunction()" id="myBtn" title="Go to top">
                                <i style="font-size:28px;" class="fa fa-shopping-bag" aria-hidden="true"><span class="badge badge-secondary totalqty1">0</span>
                                </i>
                            </button>



                        <script>
                            window.onscroll = function() {scrollFunction()};

                            function scrollFunction() {
                                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                    document.getElementById("myBtn").style.display = "block";
                                } else {
                                    document.getElementById("myBtn").style.display = "none";
                                }
                            }
                            function topFunction() {
                                document.body.scrollTop = 0;
                                document.documentElement.scrollTop = 0;
                            }
                        </script>

                        {{--====================endfix icon order ========================--}}

                        <div id="cart">
                            <div data-hover="dropdown" class="basket dropdown-toggle" >
                                <a href="#">
                                    <span class="price hidden-xs" style="font-family: 'Encode Sans Semi Condensed', sans-serif;
                font-family: 'Hanuman', serif;">{{_t('Shopping Cart')}} </span>
                                    <span
                                            class="cart_count hidden-xs" style="font-family: 'Encode Sans Semi Condensed', sans-serif;
                font-family: 'Hanuman', serif;">
                                        <span class="totalqty1">0</span> {{_t('items.')}} / $<span class="subtotalPrice">

                                        </span>
                                    </span>
                                </a>
                            </div>
                            <input id="cart-txt-heading" type="hidden" name="cart-txt-heading" value="items ">
                            <ul class="dropdown-menu pull-right top-cart-content arrow_box">

                                <li>
                                    <div class="shopping-cart-list">
                                        <table class="table">
                                            <tbody class="item-order-add-to-card">
{{--==============================item order add to cart=======================================--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>{{_t('Sub Total')}}</strong></td>
                                                <td class="text-right">$<span class="subtotalPrice"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>{{_t('TAX VAT(0%)')}}</strong></td>
                                                <td class="text-right">$<span class="tax_all"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>{{_t('Delivery Fee')}}</strong></td>
                                                <td class="text-right">$0.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>{{_t('Grand Total')}}</strong></td>
                                                <td class="text-right">$<span class="total_all"></span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="checkout actions">
                                            @if (Auth::guest())
                                                <a href="{{url('/checkout-step')}}" class="btn-checkout">{{_t('Checkout')}}</a>
                                            @else
                                                <a href="{{url('/checkout-step').'/'.Auth::id()}}" class="btn-checkout">{{_t('Checkout')}}</a>
                                            @endif
                                                <a href="{{url('/checkout')}}" class="view-cart">{{_t('View Cart')}}</a>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="ajaxconfig_info" style="display:none"><a href="#"></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                    </div>
                </div>
            </div>


        </div>
    </div>
    <nav class="hidden-xs">
        <div class="nav-container">


            <div class="col-md-3 col-xs-12 col-sm-3">
                <div class="mega-container visible-lg visible-md visible-sm">


                    <div class="navleft-container">
                        <div class="mega-menu-title">
                            <h3 style="font-family: 'Encode Sans Semi Condensed', sans-serif;
                font-family: 'Hanuman', serif;"><i class="fa fa-navicon"></i>{{_t('All Categories')}}</h3>
                        </div>
                        <div class="mega-menu-category" style="font-family: 'Encode Sans Semi Condensed', sans-serif;
                font-family: 'Hanuman', serif;">
                            <ul class="nav">
                                <li class="nosub">
                                    <a href="{{url('/')}}"><i class="fa fa-plus-square"></i>{{_t('Home')}}</a>
                                </li>
{{--===============================================Desktop Menu=============================================--}}
                                {!! \App\Models\Backend\ItemCategory::getMenu() !!}
                                <li class="nosub">
                                    <a href="{{url('/blog')}}"><i class="fa fa-plus-square"></i>{{_t('Blog')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="our-features-box hidden-xs">
                <div class="features-block">
                    <div class="col-lg-7 col-md-9 col-xs-12 col-sm-9 offer-block">
                        <div class="feature-box first">
                            <div class="content">
                                <h3>{{_t('Welcome to KST Online Shop')}} </h3>
                            </div>
                        </div>

                        <span class="separator">/</span>
                        <div class="feature-box">
                            <div class="content">
                                <h3>{{ \App\Models\Backend\WebSetting::getSetting('email')}}</h3>
                            </div>
                        </div>
                        <span class="separator">/</span>
                        <div class="feature-box last">
                            <div class="content">
                                <h3>{{ \App\Models\Backend\WebSetting::getSetting('phone')}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-1 col-sm-2 hidden-sm hidden-md"><a href="{{url('/special')}}"><span
                                    class="offer-label">{{_t('Offer Zone')}}</span></a></div>
                </div>
            </div>
        </div>
    </nav>
</header>
    
    
    