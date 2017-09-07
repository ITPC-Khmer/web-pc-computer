
<aside id="column-left" class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
    <div>
        <div class="side-banner"><img
                    src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('side-banner'))}}"
                    alt="banner"></div>
    </div>
    <div class="block block-company">
        <div class="block-title">
            {{_t('Information')}}
        </div>
        <div class="block-content">
            <ul>
                <li><a href="{{url('/how-to-use')}}">{{_t('FQAs')}}</a></li>
                <li><a href="{{url('/about')}}">{{_t('About Us')}}</a></li>
                <li><a href="{{url('/user/contact')}}">{{_t('Contact Us')}}</a></li>
                <li><a href="{{url('/side-map')}}">{{_t('Map Location')}}</a></li>
            </ul>
        </div>
    </div>
</aside>