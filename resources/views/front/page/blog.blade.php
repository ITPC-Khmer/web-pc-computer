@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <div class="main container">
        <div class="row">
            <div id="content" class="col-sm-9 col-sm-push-3 mgk-blog">
                <div class="col-main">
                    <div class="page-title" style="padding-top: 10px !important; padding-bottom: 10px;"><h2>{{_t('Blog')}}</h2></div>
                    <div id="main" class="row blog-wrapper">


                        <div class="">
                            <div id="primary" class="site-content">
                                <div id="content" role="main">
                                    @foreach($blog as $blog)
                                    <article class="blog_entry clearfix wow bounceInUp animated">
                                        <div class="featured-thumb">
                                            @if(is_m() && !is_t())
                                                <a title="{{$blog->title}}" href="{{url('/blog-article/'.$blog->id)}}">
                                                    @if(count($blog->image_url)>0) <img src="{{ getImgUrl($blog->image_url[0]) }}" width="290" height="134" alt="" title="">@endif
                                                </a>
                                            @endif
                                            @if(!is_m() && !is_t())
                                                    <a title="{{$blog->title}}" href="{{url('/blog-article/'.$blog->id)}}">
                                                        @if(count($blog->image_url)>0) <img src="{{ getImgUrl($blog->image_url[0]) }}" width="847" height="393" alt="" title="">@endif
                                                    </a>
                                            @endif
                                            @if(is_t())
                                                    <a title="{{$blog->title}}" href="{{url('/blog-article/'.$blog->id)}}">
                                                        @if(count($blog->image_url)>0) <img src="{{ getImgUrl($blog->image_url[0]) }}" width="532" height="247" alt="" title="">@endif
                                                    </a>
                                            @endif
                                        </div>
                                        <header class="blog_entry-header clearfix">
                                            <div class="blog_entry-header-inner">
                                                <h2 class="blog_entry-title">
                                                    <a href="{{url('/blog-article/'.$blog->id)}}" rel="bookmark">{{$blog->title}}</a>
                                                </h2>
                                            </div>
                                        </header>

                                        <div class="entry-content">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-user"></i>{{_t('posted by')}} <a href="#">{{_t('admin')}}</a> </li>
                                                <li><i class="fa fa-comments"></i><a href="#">1 comments</a> </li>
                                                <li><i class="fa fa-clock-o"></i>Aug 12, 2016</li>
                                            </ul>
                                            <div class="entry-content">
                                                <p>{{$blog->description}}</p>
                                            </div>

                                            <p>
                                                <a class="btn" href="{{url('/blog-article/'.$blog->id)}}">{{_t('Read more')}}</a>
                                            </p>
                                        </div>
                                    </article>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row blog-bottom_pagination">
                                <div class="col-sm-6 text-left"></div>
                                <div class="col-sm-6 text-right">Showing 1 to 5 of 5 (1 Pages)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('front.page.include.blog')
        </div><!-- row -->
    </div><!-- main container -->

@endsection
@section('script')
    @parent

@endsection

@section('body_master1')
    <body class="common-home cms-home-page">
    <div id="page" class="category_page">
@endsection