@extends('layouts.admin_user')

@section('content')

    @if(session()->get('mysess.role_id') - 0 == 2)
    @endif
    <form class="login-form" action="{{url('/login-admin')}}" method="post">
        {!! csrf_field() !!}
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="name" id="naem" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />

            </div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox"
                       name="remember"> Remember Me
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> Login </button>
        </div>

        {{----}}
        {{--<div class="login-options">--}}
            {{--<h4>Or login with</h4>--}}
            {{--<ul class="social-icons">--}}
                {{--<li>--}}
                    {{--<a class="facebook" data-original-title="facebook" href="javascript:;"> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a class="twitter" data-original-title="Twitter" href="javascript:;"> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a class="googleplus" data-original-title="Goole Plus" href="javascript:;"> </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a class="linkedin" data-original-title="Linkedin" href="javascript:;"> </a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{----}}

        {{--<div class="forget-password">--}}
            {{--<h4>Forgot your password ?</h4>--}}
            {{--<p> no worries, click--}}
                {{--<a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>--}}
        {{--</div>--}}

        {{--<div class="create-account">--}}
        {{--<p> Don't have an account yet ?&nbsp;--}}
        {{--<a href="javascript:;" id="register-btn"> Create an account </a>--}}
        {{--</p>--}}
        {{--</div>--}}
    </form>
    {{--<form class="forget-form" action="" method="post">--}}

        {{--<h3>Forget Password ?</h3>--}}
        {{--<p> Enter your e-mail address below to reset your password. </p>--}}
        {{--<div class="form-group">--}}
            {{--<div class="input-icon">--}}
                {{--<i class="fa fa-envelope"></i>--}}
                {{--<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"  name="email" value="" />--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-actions">--}}
            {{--<button type="button" id="back-btn" class="btn red btn-outline">Back </button>--}}
            {{--<button type="submit" class="btn green pull-right"> Submit </button>--}}
        {{--</div>--}}
    {{--</form>--}}
@endsection
