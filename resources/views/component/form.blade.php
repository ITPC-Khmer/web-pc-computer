<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{ $title }}
                </div>
                <div class="tools">
                    <a href="javascript:" class="collapse" data-original-title="" title=""> </a>
                    <a href="javascript:" class="fullscreen" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body form">
                {!! Form::open(array_unique(array_merge(['class'=>'form-horizontal','files'=>true],$option))) !!}
                {{ $slot }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
