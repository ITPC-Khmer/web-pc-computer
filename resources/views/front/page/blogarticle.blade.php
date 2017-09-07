@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1510500795650942";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

<style>
    .col2-right-layout .col-main {
        background: none repeat scroll 0 0 #fff;
        display: inline-block;
        font-size: 12px;
        padding: 0px !important;
        width: 100%;
    }
</style>
    <div class="main-container col2-right-layout" >
        <div class="main container">
            <div class="row">
                <div id="content" class="col-sm-9 col-sm-push-3">
                    <div class="col-main">
                        <div class="page-title" style=" padding-bottom: 10px !important;">
                            <h2>{{_t('Blog')}}</h2>
                        </div>
                        <div id="main" class="row blog-wrapper">
                            <div class="">
                                <div id="primary" class="site-content">
                                    <div id="content" role="main">
                                        <article class="blog_entry clearfix">
                                            <div class="entry-content">
                                                <div class="featured-thumb">
                                                    @if(is_m() && !is_t())
                                                        @if(count($blog->image_url)>0)<img src="{{ getImgUrl($blog->image_url[0]) }}" width="290" height="134"
                                                                                           alt="" titile="">
                                                        @endif
                                                    @endif
                                                    @if(!is_m() && !is_t())
                                                        @if(count($blog->image_url)>0)<img src="{{ getImgUrl($blog->image_url[0]) }}" width="847" height="393"
                                                                                           alt="" titile="">
                                                        @endif
                                                    @endif
                                                    @if(is_t())
                                                        @if(count($blog->image_url)>0)<img src="{{ getImgUrl($blog->image_url[0]) }}" width="532" height="247"
                                                                                           alt="" titile="">
                                                        @endif
                                                    @endif



                                                </div>
                                                <header class="blog_entry-header clearfix">
                                                    <div class="blog_entry-header-inner">
                                                        <h2 class="blog_entry-title">{{$blog->title}}</h2>
                                                    </div>
                                                </header>
                                                <div class="entry-content">
                                               {!! $blog->content !!}
                                                </div>
                                                <div class="entry-meta">
                                                    {{_t('This entry was posted on')}}
                                                    <time class="entry-date">{{$blog->created_at}}</time>
                                                </div>
                                                <br>
                                                {{--============================like share fb===============================--}}
                                                <div class="fb-like" data-href="http://kstcambodia.com/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                                {{--============================like share fb===============================--}}
                                                {{--============================follow fb===============================--}}
                                                <div class="fb-follow" data-href="https://www.facebook.com/KSTStore/" data-layout="button" data-size="small" data-show-faces="true"></div>
                                                {{--============================follow fb===============================--}}
                                                <div class="fb-send" data-href="http://kstcambodia.com/"></div>
                                                <div class="fb-save" data-uri="http://kstcambodia.com/" data-size="small"></div>
                                                {{--============================save fb===============================--}}

                                            </div>
                                        </article>
                                        <div class="comment-content wow bounceInUp animated">
                                            <div class="comments-form-wrapper clearfix">
                                                <div class="fb-comments" data-href="http://kstcambodia.com/blog-article/{{$blog->id}}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @include('front.page.include.blog')

            </div>
        </div>
    </div>

@endsection

@section('facebook')
    <meta property="og:site_name" content="{{ $blog->title }}"/>
    <meta property="og:image:secure_url" content="{{ $blog->img_url }}" />
    <link rel="image_src" href="{{ $blog->img_url }}"/>
    <meta property="fb:app_id" content="1583628548520415" />
    <meta property="og:type"   content="object" />
    <meta property="og:url"    content="{{ url()->current() }}" />
    <meta property="og:title"  content="{{ $blog->title_en }}" />
    <meta property="og:description" content="{{ $blog->description }}" />
    <meta property="og:image"  content="{{ $blog->img_url }}" />

    <!-- twitter meta-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@bongtou007">
    <meta name="twitter:creator" content="@bongtou007">
    <meta name="twitter:title" content="{{ $blog->title_en }}">
    <meta name="twitter:description" content="{{ $blog->description}}">
    <meta name="twitter:image" content="{{ $blog->img_url }}">
@endsection
@section('script')
    @parent
@endsection


@section('layout_master1')
    <meta name="description" content="My Store"/>
@endsection
@section('body_master1')
    <body class="common-home cms-home-page">
    <div id="page" class="category_page">
@endsection