<?php
$carouse_slides = \App\Models\Backend\CarouseSlide::where('status',1)->get();
?>
<style>
    .carousel-caption {
        color: #1FC0A0 !important;
    }
</style>
<div class="custom-slider-wrap">
    <div class="custom-slider-inner">
        <div class="home-custom-slider">
            <div>
                <div id="carousel-example-generic" class="carousel slide"
                     data-ride="carousel">

                    <ol class="carousel-indicators">

                        @foreach($carouse_slides as $carouse_slide)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$carouse_slide->id}}"
                                class="@if($loop->first) active @endif"></li>
                        @endforeach

                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>

                    </ol>

                    <div class="carousel-inner">

                        @foreach($carouse_slides as $carouse_slide)
                            <div class="item @if($loop->first) active @endif">
                                <a href="#" target="_blank" title="Mega Deal">
                                    @if(count($carouse_slide->image_url)>0)
                                        <img src="{{ getImgUrl($carouse_slide->image_url[0]) }}"
                                             data-bgposition='left top' data-bgfit='cover'
                                             data-bgrepeat='no-repeat' title="Mega Deal"
                                             alt="Mega Deal"/>
                                    @endif
                                </a>
                                {{--<div class="carousel-caption">--}}
                                                                {{--<span>--}}
                                                                    {{--{{$carouse_slide->title}}--}}
                                                                {{--</span>--}}
                                    {{--<p>{{$carouse_slide->description}}</p>--}}
                                {{--</div>--}}
                            </div>
                        @endforeach


                    </div>



                    <a class="left carousel-control" href="#carousel-example-generic"
                       role="button" data-slide="prev"> <span
                                class="glyphicon glyphicon-chevron-left"
                                aria-hidden="true"></span> <span
                                class="sr-only">Previous</span> </a>

                    <a class="right carousel-control" href="#carousel-example-generic"
                       role="button" data-slide="next"> <span
                                class="glyphicon glyphicon-chevron-right"
                                aria-hidden="true"></span> <span class="sr-only">Next</span>
                    </a>



                </div>
            </div>
        </div>
    </div>
</div>
