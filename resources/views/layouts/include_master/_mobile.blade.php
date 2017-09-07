<div id="mobile-menu">
    <ul>
        <li><a href="{{url('/')}}"><span>{{_t('Home')}}</span></a></li>
        {{--===============================================Mobile Menu=============================================--}}
        {!! \App\Models\Backend\ItemCategory::getMenuMobile() !!}


    </ul>
    <div class="top-links">

        <ul class="links">
            <li><a href="{{url('/blog')}}"><span>{{_t('Blog')}}</span></a></li>

            <li><a href="{{url('/how-to-use')}}"><span>{{_t('FQAs')}}</span></a></li>

            @if (Auth::guest())
                <li><a href="{{url('/my-account')}}" title="My Account">{{_t('My Account')}}</a></li>
                <li><a href="{{url('/wish-list')}}" id="wishlist-total" title="Wish List">{{_t('Wish List')}}</a></li>
                <li class="last">
                    <a href="{{url('/login')}}">{{_t('Login')}}</a>
                </li>
            @else
                <li><a href="{{url('/my-account')}}" title="My Account">{{_t('My Account')}}</a></li>
                <li><a href="{{url('/wish-list')}}" id="wishlist-total" title="Wish List">{{_t('Wish List')}}</a></li>


                <li><a href="{{url('/checkout')}}" title="Checkout">{{_t('Checkout')}}</a></li>

                <li class="last">
                    <a href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif



        </ul>
    </div>
</div>