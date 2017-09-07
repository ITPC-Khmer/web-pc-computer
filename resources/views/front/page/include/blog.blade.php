
<aside id="column-left" class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
    <div>
        <div class="side-banner">
            <img src="{{ getImgUrl(\App\Models\Backend\WebSetting::getSetting('side-banner'))}}" alt="banner">
        </div>
    </div>
    <div class="popular-posts widget widget__sidebar wow bounceInUp animated">

        <h3 class="widget-title">
            Latest Posts	</h3>

        <div class="widget-content">
            <ul class="posts-list unstyled clearfix">
                <?php
                $blog_new = \App\Models\Backend\Blog::orderBy('id')->limit(5)->get();
                ?>
                @foreach($blog_new as $blog)
                <li>
                    <figure class="featured-thumb">
                        <a href="{{url('/blog-article/'.$blog->id)}}">
                            @if(count($blog->image_url)>0) <img src="{{ getImgUrl($blog->image_url[0]) }}" width="80" height="53" >@endif
                        </a>
                    </figure>

                    <h4><a href="{{url('/blog-article/'.$blog->id)}}" title="{{$blog->title}}">{{$blog->title}}</a></h4>

                    <p class="post-meta"><i class="icon-calendar"></i>
                        <time class="entry-date">{{$blog->created_at}}</time>
                     </p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>