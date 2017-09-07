<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getImgUrl($img,$imgType = 0)
{
    return asset("uploads/files/".($imgType == 0?"":($imgType==1?"tmp1/":"tmp2/")).$img);
}

function getImgUrl1($img,$imgType = 1)
{
    return asset("uploads/files/".($imgType == 0?"":($imgType==1?"tmp1/":"tmp2/")).$img);
}
function nbs($n = 1)
{
    return str_repeat('&nbsp;', $n);
}

function get_ses_lang()
{
    return session('lang') ? session('lang') : 'kh';
}

function _t($txt)
{
    return \App\Helpers\Glb::translate($txt);
}

function _tt($arr)
{
    $l = get_ses_lang();
    $t = '';
    try {
        if (is($arr->$l)) $t = $arr->$l;
        if ($t . '' == '') {
            if (is($arr->en))
                $t = $arr->en;
        }
        return $t;
    } catch (Exception $e) {
        return '';
    }
}

function _en($data)
{
    $parent = [];
    foreach ($data as $k => $v) {
        $parent[$k] = _tt(json_decode($v));
    }
    return $parent;
}

function arr_lang()
{
    return [
        'en' => 'English',
        'kh' => 'ខ្មែរ',
//        'th' => 'ไทย',
//        'ch' => '中国',
//        'vn' => 'Việt'
    ];
}

function get_user_id()
{
    return 1;
}

function highlight($text, $words)
{
    if (trim($words) != '') {
        $w = preg_split('/\s+/', $words);//explode(' ', $words);
        return str_highlight($text, $w, null, '<b><span class="search-highlight">\1</span></b>');
    } else {
        return $text;
    }
}

function active_url($page, $active = 'active')
{
    //$path = app('request')->path();

    if (app('request')->fullUrl() == url($page))
        return $active;

    /*if (str_contains($path, $page))
        return $active;*/
    return '';
}

function get_title_search($name='',$value='')
{
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>
                    <input data-name="'.$name.'" value="'.$value.'" id="'.$name.'" class="head-search-input form-control '.$name.'" type="text" name="'.$name.'" placeholder="'.$name.'"> 
                </div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}
//select disable or enable
function get_title_search_status($value='')
{
    $name='status';
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>'.
                Form::select($name, array_merge([''=>''],status()),$value,['class'=>"head-search-input form-control select $name",'data-name'=>$name]).
                '</div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}
function get_title_search_page_type($value='')
{
    $name='page_type';
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>'.
                Form::select($name, array_merge([''=>''],page_type()),$value,['class'=>"head-search-input form-control select $name",'data-name'=>$name]).
                '</div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}
function get_title_search_instock($value='')
{
    $name='instock';
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>'.
                Form::select($name, array_merge([''=>''],instock()),$value,['class'=>"head-search-input form-control select $name",'data-name'=>$name]).
                '</div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}
function get_title_search_spec_type($value='')
{
    $name='spec_type';
    return '<div class="input-group">
                <div class="input-icon"><i class="fa fa-question-circle"></i>'.
        Form::select($name, array_merge([''=>''],spec_type()),$value,['class'=>"head-search-input form-control select $name",'data-name'=>$name]).
        '</div>
                <span class="input-group-btn">
                    <button class="btn btn-success head-search-th" type="button"><i class="fa icon-magnifier"></i></button>
                </span>
            </div>';
}
function status(){
    return [0=> 'Disable',1=> 'Enabled'];
}
function instock(){
    return [0=> 'Outstock',1=> 'Instock'];
}
function spec_type(){
    return [0=> 'Color',1=> 'Size'];
}
function key_type(){
    return ['text'=> 'text','select'=> 'select','file'=>'file'];
}
//end select disable or enable
function is_m()
{
    $md = new \App\Helpers\Mobile_Detect();
    return $md->isMobile();
}

function is_t()
{
    $md = new \App\Helpers\Mobile_Detect();
    return $md->isTablet();
}

function OptionItemCategoryType(){
    return [0=>'',1=> 'Size',2=> 'Color'];
}

function condition(){
    return [0=> 'Used',1=> 'New'];
}

function private_listing(){
    return [0=> 'No',1=> 'Yes'];
}

function getPrice($start_price, $promotion_price, $expire_date){
    //dd($expire_date);
   // $mytime = Carbon\Carbon::now();
    $arr = [0,''];

    if (\Carbon\Carbon::now() > $expire_date)
    {
        $arr[0] = $start_price;
        $arr[1] = '
                        <p class="regular-price"><span class="price">$'.number_format($start_price,2).'</span></p>
                   ';

    }else{
        $arr[0] = $promotion_price;

        $arr[1] = '
                        <p class="old-price"><span class="price">$'.number_format($start_price,2).'</span></p>
                        <p class="special-price"><span class="price">$'.number_format($promotion_price,2).'</span></p>
                    ';

    }
    return $arr;

}

function page_type()
{
    return [
        '0' => 'ABOUT',
//        '1' => 'DELIVERY INFORMATION',
//        '2' => 'PRIVACY POLICY',
//        '3' => 'TERMS & CONDITION',
//        '4' => 'SUPPLIERS',
//        '5' => 'OUR STORE'
    ];
}

