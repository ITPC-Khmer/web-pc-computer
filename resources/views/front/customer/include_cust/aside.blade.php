<aside id="column-right" class="col-right col-xs-12  col-sm-3">
    <div class="block block-account">
        <div class="block-title">
            {{_t('Account')}}  </div>
        <div class="block-content">
            <ul>
                @if (Auth::guest())
                    <li><a href="{{url('/login')}}">{{_t('Login')}}</a> </li>
                    <li><a href="{{url('/register')}}">{{_t('Register')}}</a> </li>
                    <li><a href="{{url('/password/reset')}}">{{_t('Forgotten Password')}}</a></li>
                @else
                    <li><a href="{{url('/my-account')}}">{{_t('My Account')}}</a></li>
                    <li><a href="{{url('/edit-account')}}">{{_t('Edit Account')}}</a></li>
                    <li><a href="{{url('/reset-password')}}">{{_t('Password')}}</a></li>
                    <li><a href="{{url('/address')}}">{{_t('Address Book')}}</a> </li>
                    <li><a href="{{url('/wish-list')}}">{{_t('Wish List')}}</a> </li>
                    <li><a href="{{url('/order/history').'/'.Auth::id()}}">{{_t('Order History')}}</a> </li>
                    <li>
                        <a href="{{url('/logout')}}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ _t('Logout') }}</a>
                    </li>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </ul>
        </div>
    </div>
</aside>
