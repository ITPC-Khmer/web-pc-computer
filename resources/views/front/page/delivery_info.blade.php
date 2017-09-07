@extends('layouts.master')
@section('title', 'KST Online Shop :: Cambodia')
@section('main-container')
    <div class="main-container col2-right-layout">
        <div class="main container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{url('/')}}">Home</a>
                    </li>
                    <li><span>/</span> <strong>About Us</strong></li>
                </ul>
            </div>
            <div class="row">
                <div id="content" class="col-sm-9 col-sm-push-3">
                    <div class="col-main">
                        <div class="static-inner">
                            <?php
                            $supply = \App\Models\Backend\Page::where('status',1)->where('page_type',1)->take(1)->get();
                            ?>
                            @foreach($supply as $row)
                                <div class="page-title">
                                    <h2> {{$row->title}}</h2>
                                </div><p>{!! $row->content !!}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include('front.page.include.aside-menu')
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection


@section('body_master3')
    <body class="information-information-4 ">
    <div id="page" class="category_page">
@endsection