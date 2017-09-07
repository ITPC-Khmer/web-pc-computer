<div class="form-group  form-md-line-input">
    <label class="control-label col-md-3">{!! $label !!}</label>
    <div class="col-md-9">
        {{ $slot }}
        <div class="form-control-focus"></div>
        <span class="help-block">{!! $sms !!}</span>
    </div>
</div>