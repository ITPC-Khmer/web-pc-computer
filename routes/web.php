<?php
////session(['k'=>'aaaa']);
//dd(session('k'));
////dump(Session::all());
//Route::get('x',function (){
//   session(['x'=>'1234333']);
//   $x = session('x');
//   return $x;
//});

Route::get('/confirmed-email/{confirmation_code}',function ($confirmation_code){
    $m = \App\User::where('confirmation_code',$confirmation_code)->first();
    if($m != null){
        $m->confirmed = 1;
        if($m->save()){
            return redirect('login');
        }
    }

    return 'Your Email not yet confirm!!';
});

Auth::routes();
Route::group(['namespace' => 'Frontend','middleware'=>'auth'], function (){
    Route::get('/reset-password/{id?}','HomeController@resetPassword');
    Route::post('/change-password', 'HomeController@changePassword');

    Route::get('/change-password-success','HomeController@changePasswordSuccess');
    Route::get('/my-account','HomeController@myAccount');
    Route::get('/my-account','HomeController@myAccount');
    Route::get('/edit-account/{id?}','HomeController@editAccount');
    Route::post('/edit-account','HomeController@postEditAccount');
    Route::get('/address','HomeController@address');
    Route::get('/edit-address/{id?}','HomeController@editAddress');
    Route::post('/edit-address','HomeController@postEditAddress');


    Route::get('/order/history/{id?}','HomeController@orderHistory');

    Route::get('/order/history-info/{id?}','HomeController@orderHistoryInfo');
    Route::get('/checkout-step','HomeController@checkoutStep');
    Route::get('/checkout-step/{id?}','HomeController@checkoutStep');
    Route::post('/checkout-step','HomeController@postCheckoutStep');

    Route::post('/update-checkout-step','HomeController@postUpdateCheckoutStep');
    Route::get('/checkout/success/{id}','HomeController@checkoutSuccess');
});
Route::group(['namespace' => 'Frontend'],function (){

    Route::get('/how-to-use','HomeController@howToUse');

    Route::post('/post-subscribe','HomeController@postSubscribe');
    Route::post('/post-contact','HomeController@postContact');

    Route::get('/checkout','HomeController@checkout');
    Route::get('/list-product','HomeController@listProduct');
    Route::get('/short-by','SortByController@shortBy');

    Route::get('/select2data','SelectorController@getAjax');
    // add to wishlist
    Route::get('/wish-list','HomeController@wishList');
    Route::get('/add-wishlist','HomeController@addWishlist');
    Route::get('/get-wishlist','HomeController@getWishlist');
    Route::get('/remove-wishlist','HomeController@removeWishlist');
    // end add to wishlist
    //shopping cart
    Route::get('/add-cart','HomeController@addCart');
    Route::get('/get-cart','HomeController@getCart');
    Route::get('/remove-cart','HomeController@removeCart');
    Route::get('/update-cart','HomeController@updateCart');
    Route::get('/update-cart1','HomeController@updateCart1');
    Route::get('/destroy-cart','HomeController@destroyCart');
    Route::get('/total-qty','HomeController@totalQty');
    //end shopping cart
    Route::get('/change_lang/{lang}','HomeController@change_lang');

    Route::get('/','HomeController@home');
    Route::get('/home','HomeController@home');

    Route::get('/category-list/{category_id?}','HomeController@categoryList');

    Route::get('/detail','HomeController@detail');
    Route::get('/product-detail/{id}','HomeController@productDetail');
    Route::get('/detail-popup','HomeController@detailPopup');
    Route::get('/product-detail-popup/{id}','HomeController@productDetailPopup');
    Route::get('/about','HomeController@about');
    Route::get('/blog','HomeController@blog');
    Route::get('/blog-article','HomeController@blogArticle');
    Route::get('/blog-article/{id}','HomeController@blogDetail');
    Route::get('/user/logout','HomeController@logout');
    Route::get('/delivery-info','HomeController@deliveryInfo');
    Route::get('/privacy','HomeController@privacy');
    Route::get('/condition','HomeController@condition');
    Route::get('/supply','HomeController@supply');
    Route::get('/our-store','HomeController@ourStore');
    Route::get('/user/register-success','HomeController@registerSuccess');
    Route::get('/user/contact','HomeController@contact');
    Route::get('/special','HomeController@special');
    Route::get('/side-map','HomeController@sideMap');
});
Route::group(['namespace' => 'Backend'],function () {
    Route::get('/no-permission','AdminController@noPermission');
    Route::get('/admin/login','AdminController@adminLogin');
    Route::post('/login-admin','AdminController@postLogin');

    Route::get('/logout-admin','AdminController@getLogout');

    Route::post('/item-session','ItemController@itemCategorySession');
});
Route::group(['namespace' => 'Report','prefix'=>'report','middleware' => 'MidAdmin:1,1'],function () {
    Route::get('/order-paid','SaleController@orderPaid');
    Route::get('/order-cancel','SaleController@orderCancel');
    Route::get('/select-sale-report','SaleController@saleTblReport');

    Route::get('/table-report','SaleController@tableReport');

    Route::get('/order/list','SaleController@saleReportList');
    Route::get('/order/detail','SaleController@saleReportDetail');

    Route::get('/promotion-expire/list','SaleController@promotionExpireList');

    Route::get('/paid/list','SaleController@orderPaidList');
    Route::get('/paid/detail','SaleController@orderPaidDetail');

    Route::get('/cancel/list','SaleController@orderCancelList');
    Route::get('/cancel/detail','SaleController@orderCancelDetail');

    Route::get('/pending/list','SaleController@orderPendingList');
    Route::get('/pending/detail','SaleController@orderPendingDetail');
});
Route::group(['namespace' => 'Stock','prefix'=>'stock','middleware' => 'MidAdmin:1,1'],function () {
    Route::get('/in-stock','ItemController@inStock');
    Route::get('/out-stock','ItemController@outStock');
    Route::get('/sell-off','ItemController@sellOff');
    Route::get('/popular-product','ItemController@popularProduct');
});

Route::group(['namespace' => 'Backend','prefix'=>'backend','middleware' => 'MidAdmin:1,0'],function () {
    Route::get('dashboard','AdminController@dashboard');
//customer order
    Route::get('all-order','OrderController@allOrder');
    Route::get('new-order','OrderController@newOrder');
    Route::get('order-paid','OrderController@orderPaid');
    Route::get('order-cancel','OrderController@orderCancel');
    Route::get('view-order/{id?}','OrderController@viewOrder');
    Route::get('load-order-notification','OrderController@loadOrderNotification');
    Route::get('load-contact-notification','OrderController@loadContactNotification');
    Route::post('post-cancel','OrderController@postCancel');
    Route::post('post-paid','OrderController@postPaid');
    Route::post('post-uncancel','OrderController@postUncancel');
    Route::post('post-unpaid','OrderController@postUnpaid');
    Route::get('invoice-print/{id?}','PrintController@invoicePrint');
//   end customer order
});
Route::group(['namespace' => 'Backend','prefix'=>'backend','middleware' => 'MidAdmin:1,1'],function () {
//  ItemCategoryController
    Route::get('item-category','ItemCategoryController@index');
    Route::get('item-category-form','ItemCategoryController@form');
    Route::put('item-category-form','ItemCategoryController@form');
    Route::post('item-category-save','ItemCategoryController@save');
    Route::post('item-category-update-status','ItemCategoryController@update_status');
    Route::post('item-category-update-instock','ItemCategoryController@update_instock');
    Route::delete('item-category-delete','ItemCategoryController@delete');
//ItemSpecController
    Route::get('item-spec','ItemSpecController@index');
    Route::get('item-spec-form','ItemSpecController@form');
    Route::put('item-spec-form','ItemSpecController@form');
    Route::post('item-spec-save','ItemSpecController@save');
    Route::delete('item-spec-delete','ItemSpecController@delete');
    Route::get('item-spec-check-duplicate','ItemSpecController@checkDuplicateKey');
    Route::get('check-item-spec-option','ItemSpecController@getCheckOption');
    Route::post('item-spec-update-spec-type','ItemSpecController@update_spec_type');
//ItemController
    Route::get('select-category','ItemController@selectCategory');
    Route::get('item','ItemController@index');
    Route::get('item-form','ItemController@form');
    Route::put('item-form','ItemController@form');
    Route::post('item-save','ItemController@save');
    Route::delete('item-delete-img/{img}','ItemController@delete_img');
    Route::post('item-update-status','ItemController@update_status');
    Route::post('item-update-instock','ItemController@update_instock');
    Route::delete('item-delete','ItemController@delete');
    Route::get('get-category','ItemController@getCategory');
//PageController
    Route::get('home-slider','HomeSliderController@index');
    Route::get('home-slider-form','HomeSliderController@form');
    Route::put('home-slider-form','HomeSliderController@form');
    Route::post('home-slider-save','HomeSliderController@save');
    Route::delete('home-slider-delete-img/{img}','HomeSliderController@delete_img');
    Route::post('product-slider-update-status','HomeSliderController@update_status');
    Route::delete('home-slider-delete','HomeSliderController@delete');
//End PageController
//PageController
    Route::get('product-slider','ProductSliderController@index');
    Route::get('product-slider-form','ProductSliderController@form');
    Route::put('product-slider-form','ProductSliderController@form');
    Route::post('product-slider-save','ProductSliderController@save');
    Route::delete('product-slider-delete-img/{img}','ProductSliderController@delete_img');
    Route::post('product-slider-update-status','ProductSliderController@update_status');
    Route::delete('product-slider-delete','ProductSliderController@delete');
//End PageController
//CarouseSlideController
    Route::get('carousel-slide','CarouseSlideController@index');
    Route::get('carousel-slide-form','CarouseSlideController@form');
    Route::put('carousel-slide-form','CarouseSlideController@form');
    Route::post('carousel-slide-save','CarouseSlideController@save');
    Route::delete('carousel-slide-delete-img/{img}','CarouseSlideController@delete_img');
    Route::post('carousel-slide-update-status','CarouseSlideController@update_status');
    Route::delete('carousel-slide-delete','CarouseSlideController@delete');
//End PageController
//PostController
    Route::get('blog','BlogController@index');
    Route::get('blog-form','BlogController@form');
    Route::put('blog-form','BlogController@form');
    Route::post('blog-save','BlogController@save');
    Route::delete('blog-delete-img/{img}','BlogController@delete_img');
    Route::post('blog-update-status','BlogController@update_status');
    Route::delete('blog-delete','BlogController@delete');
//End PostController
//web setting
    Route::get('web-setting','WebSettingController@index');
    Route::post('web-setting-save-text','WebSettingController@saveText');
    Route::post('web-setting-save-text-select','WebSettingController@saveTextSelect');
    Route::post('web-setting-save-file','WebSettingController@saveFile');
//====================================
    Route::get('web-setting-index','WebSettingController@viewIndex');
    Route::get('web-setting-form','WebSettingController@form');
    Route::put('web-setting-form','WebSettingController@form');
    Route::post('web-setting-sav','WebSettingController@save');
    Route::post('web-setting-update-key-type','WebSettingController@update_key_type');
    Route::delete('web-setting-delete','WebSettingController@delete');
//end web setting
    Route::get('customer-list','CustomerController@customerList');
    Route::get('customer-contact','CustomerController@customerContact');
    Route::get('view-contact/{id?}','CustomerController@viewContact');
    Route::get('customer-subscribe','CustomerController@customerSubscribe');
    Route::get('lang','LangController@index');
    Route::post('lang-save','LangController@save');
//PageController
    Route::get('page','PageController@index');
    Route::get('page-form','PageController@form');
    Route::put('page-form','PageController@form');
    Route::post('page-save','PageController@save');
    Route::delete('page-delete-img/{img}','PageController@delete_img');
    Route::post('page-update-status','PageController@update_status');
    Route::post('page-update-page_type','PageController@update_page_type');
    Route::delete('page-delete','PageController@delete');
//End PageController

//admin role
    Route::get('role','RoleController@index');
    Route::get('role-form','RoleController@form');
    Route::put('role-form','RoleController@form');
    Route::post('role-save','RoleController@save');
    Route::delete('role-delete','RoleController@delete');

    Route::get('admin','AdminController@index');
    Route::get('admin-form','AdminController@form');
    Route::put('admin-form','AdminController@form');
    Route::post('admin-save','AdminController@save');
    Route::delete('admin-delete','AdminController@delete');
});

//foreach (Glb::urlList() as $group => $routes) {
//    Route::group(['prefix' => strtolower($group),'namespace' => $group,'middleware' => 'MidAdmin:1,1'],
//        function() use ($routes) {
//            foreach ($routes as $route)
//            {
//                if($route['m'] == 'get'){
//                    Route::get($route['u'], $route['c']);
//                }elseif($route['m'] == 'post'){
//                    Route::post($route['u'], $route['c']);
//                }elseif($route['m'] == 'put'){
//                    Route::put($route['u'], $route['c']);
//                }elseif($route['m'] == 'patch'){
//                    Route::patch($route['u'], $route['c']);
//                }elseif($route['m'] == 'delete'){
//                    Route::delete($route['u'], $route['c']);
//                }else{
//                    Route::any($route['u'], $route['c']);
//                }
//            }
//        }
//    );
//}
