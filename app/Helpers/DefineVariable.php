<?php
//===========================================================
//function xyz(){
//    return $x = session('x');
//}
//===========================================================
define('PageLimit',10);
define('_OP',[
    'multiLang' => true,
]);
define('_l',_OP['multiLang']);

//===========================================================
//===========================================================
define('UrlListArr',[
    'Backend' => [
//stock

//end stock
//
//        ['m' => 'get', 'u' => 'dashboard', 'c' => 'AdminController@dashboard', 't' => 3, 'txt' => 'Dashboard'],
//
////        customer order
//        ['m' => 'get', 'u' => 'all-order', 'c' => 'OrderController@allOrder', 't' => 3, 'txt' => 'All Order'],
//        ['m' => 'get', 'u' => 'new-order', 'c' => 'OrderController@newOrder', 't' => 3, 'txt' => 'New Order'],
//        ['m' => 'get', 'u' => 'order-paid', 'c' => 'OrderController@orderPaid', 't' => 3, 'txt' => 'Order Paid'],
//        ['m' => 'get', 'u' => 'order-cancel', 'c' => 'OrderController@orderCancel', 't' => 3, 'txt' => 'Order Cancel'],
//
//        ['m' => 'get', 'u' => 'view-order/{id?}', 'c' => 'OrderController@viewOrder', 't' => 1, 'txt' => ''],
//        ['m' => 'get', 'u' => 'invoice-print/{id?}', 'c' => 'PrintController@invoicePrint', 't' => 1, 'txt' => ''],
//
//
//        ['m' => 'get', 'u' => 'load-order-notification', 'c' => 'OrderController@loadOrderNotification', 't' => 1, 'txt' => ''],
//        ['m' => 'get', 'u' => 'load-contact-notification', 'c' => 'OrderController@loadContactNotification', 't' => 1, 'txt' => ''],
//
//        ['m' => 'post', 'u' => 'post-cancel', 'c' => 'OrderController@postCancel', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'post-paid', 'c' => 'OrderController@postPaid', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'post-uncancel', 'c' => 'OrderController@postUncancel', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'post-unpaid', 'c' => 'OrderController@postUnpaid', 't' => 1, 'txt' => ''],
//
////        end customer order
//
//        //ItemCategoryController
//        ['m' => 'get', 'u' => 'item-category', 'c' => 'ItemCategoryController@index', 't' => 3, 'txt' => 'Item Category'],
//        ['m' => 'get', 'u' => 'item-category-form', 'c' => 'ItemCategoryController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'item-category-form', 'c' => 'ItemCategoryController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-category-save', 'c' => 'ItemCategoryController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-category-update-status', 'c' => 'ItemCategoryController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-category-update-instock', 'c' => 'ItemCategoryController@update_instock', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'item-category-delete', 'c' => 'ItemCategoryController@delete', 't' => 1, 'txt' => ''],
//        //ItemSpecController
//        ['m' => 'get', 'u' => 'item-spec', 'c' => 'ItemSpecController@index', 't' => 3, 'txt' => 'Item Spec'],
//        ['m' => 'get', 'u' => 'item-spec-form', 'c' => 'ItemSpecController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'item-spec-form', 'c' => 'ItemSpecController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-spec-save', 'c' => 'ItemSpecController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-spec-delete', 'c' => 'ItemSpecController@delete', 't' => 1, 'txt' => ''],
//        ['m' => 'get', 'u' => 'item-spec-check-duplicate', 'c' => 'ItemSpecController@checkDuplicateKey', 't' => 1, 'txt' => ''],
//        ['m' => 'get', 'u' => 'check-item-spec-option', 'c' => 'ItemSpecController@getCheckOption', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-spec-update-spec-type', 'c' => 'ItemSpecController@update_spec_type', 't' => 1, 'txt' => ''],
//        //ItemController
//        ['m' => 'get', 'u' => 'select-category', 'c' => 'ItemController@selectCategory', 't' => 1, 'txt' => ''],
//
//        ['m' => 'get', 'u' => 'item', 'c' => 'ItemController@index', 't' => 3, 'txt' => 'Item'],
//        ['m' => 'get', 'u' => 'item-form', 'c' => 'ItemController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'item-form', 'c' => 'ItemController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-save', 'c' => 'ItemController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'item-delete-img/{img}', 'c' => 'ItemController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-update-status', 'c' => 'ItemController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'item-update-instock', 'c' => 'ItemController@update_instock', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'item-delete', 'c' => 'ItemController@delete', 't' => 1, 'txt' => ''],
//
//        ['m' => 'get', 'u' => 'get-category', 'c' => 'ItemController@getCategory', 't' => 1, 'txt' => ''],
//
//
//        //PageController
//        ['m' => 'get', 'u' => 'home-slider', 'c' => 'HomeSliderController@index', 't' => 3, 'txt' => 'Home Slider'],
//        ['m' => 'get', 'u' => 'home-slider-form', 'c' => 'HomeSliderController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'home-slider-form', 'c' => 'HomeSliderController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'home-slider-save', 'c' => 'HomeSliderController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'home-slider-delete-img/{img}', 'c' => 'HomeSliderController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'home-slider-update-status', 'c' => 'HomeSliderController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'home-slider-delete', 'c' => 'HomeSliderController@delete', 't' => 1, 'txt' => ''],
//        //End PageController
//        //PageController
//        ['m' => 'get', 'u' => 'product-slider', 'c' => 'ProductSliderController@index', 't' => 3, 'txt' => 'Product Slider'],
//        ['m' => 'get', 'u' => 'product-slider-form', 'c' => 'ProductSliderController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'product-slider-form', 'c' => 'ProductSliderController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'product-slider-save', 'c' => 'ProductSliderController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'product-slider-delete-img/{img}', 'c' => 'ProductSliderController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'product-slider-update-status', 'c' => 'ProductSliderController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'product-slider-delete', 'c' => 'ProductSliderController@delete', 't' => 1, 'txt' => ''],
//        //End PageController
//        //CarouseSlideController
//        ['m' => 'get', 'u' => 'carousel-slide', 'c' => 'CarouseSlideController@index', 't' => 3, 'txt' => 'Carouse Slide'],
//        ['m' => 'get', 'u' => 'carousel-slide-form', 'c' => 'CarouseSlideController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'carousel-slide-form', 'c' => 'CarouseSlideController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'carousel-slide-save', 'c' => 'CarouseSlideController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'carousel-slide-delete-img/{img}', 'c' => 'CarouseSlideController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'carousel-slide-update-status', 'c' => 'CarouseSlideController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'carousel-slide-delete', 'c' => 'CarouseSlideController@delete', 't' => 1, 'txt' => ''],
//        //End PageController
//        //PostController
//        ['m' => 'get', 'u' => 'blog', 'c' => 'BlogController@index', 't' => 3, 'txt' => 'Blog'],
//        ['m' => 'get', 'u' => 'blog-form', 'c' => 'BlogController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'blog-form', 'c' => 'BlogController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'blog-save', 'c' => 'BlogController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'blog-delete-img/{img}', 'c' => 'BlogController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'blog-update-status', 'c' => 'BlogController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'blog-delete', 'c' => 'BlogController@delete', 't' => 1, 'txt' => ''],
//        //End PostController
//
//        //        web setting
//        ['m' => 'get', 'u' => 'web-setting', 'c' => 'WebSettingController@index', 't' => 3, 'txt' => 'Web Setting'],
//        ['m' => 'post', 'u' => 'web-setting-save-text', 'c' => 'WebSettingController@saveText', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'web-setting-save-text-select', 'c' => 'WebSettingController@saveTextSelect', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'web-setting-save-file', 'c' => 'WebSettingController@saveFile', 't' => 1, 'txt' => ''],
////      ====================================
//        ['m' => 'get', 'u' => 'web-setting-index', 'c' => 'WebSettingController@viewIndex', 't' => 3, 'txt' => 'List Web Setting'],
//        ['m' => 'get', 'u' => 'web-setting-form', 'c' => 'WebSettingController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'web-setting-form', 'c' => 'WebSettingController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'web-setting-save', 'c' => 'WebSettingController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'web-setting-update-key-type', 'c' => 'WebSettingController@update_key_type', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'web-setting-delete', 'c' => 'WebSettingController@delete', 't' => 1, 'txt' => ''],
////        end web setting
//
//
//        ['m' => 'get', 'u' => 'customer-list', 'c' => 'CustomerController@customerList', 't' => 3, 'txt' => 'Cus. List'],
//        ['m' => 'get', 'u' => 'customer-contact', 'c' => 'CustomerController@customerContact', 't' => 3, 'txt' => 'Cus. Contact'],
//        ['m' => 'get', 'u' => 'view-contact/{id?}', 'c' => 'CustomerController@viewContact', 't' => 1, 'txt' => ''],
//
//        ['m' => 'get', 'u' => 'customer-subscribe', 'c' => 'CustomerController@customerSubscribe', 't' => 3, 'txt' => 'Cus. Subscript'],
//
//        ['m' => 'get', 'u' => 'lang', 'c' => 'LangController@index', 't' => 3, 'txt' => 'Language'],
//        ['m' => 'post', 'u' => 'lang-save', 'c' => 'LangController@save', 't' => 1, 'txt' => ''],
//
//        //PageController
//        ['m' => 'get', 'u' => 'page', 'c' => 'PageController@index', 't' => 3, 'txt' => 'Page'],
//        ['m' => 'get', 'u' => 'page-form', 'c' => 'PageController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'page-form', 'c' => 'PageController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'page-save', 'c' => 'PageController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'page-delete-img/{img}', 'c' => 'PageController@delete_img', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'page-update-status', 'c' => 'PageController@update_status', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'page-update-page_type', 'c' => 'PageController@update_page_type', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'page-delete', 'c' => 'PageController@delete', 't' => 1, 'txt' => ''],
//        //End PageController
//
//
//
//////        ItemTagController
////        ['m' => 'get', 'u' => 'post-tag', 'c' => 'PostTagController@index', 't' => 3, 'txt' => 'Post Tag'],
////        ['m' => 'get', 'u' => 'post-tag-form', 'c' => 'PostTagController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'put', 'u' => 'post-tag-form', 'c' => 'PostTagController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-tag-save', 'c' => 'PostTagController@save', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-tag-update-status', 'c' => 'PostTagController@update_status', 't' => 1, 'txt' => ''],
////        ['m' => 'delete', 'u' => 'post-tag-delete', 'c' => 'PostTagController@delete', 't' => 1, 'txt' => ''],
////        //End ItemTagController
////
////        //ItemCategoryController
////        ['m' => 'get', 'u' => 'post-category', 'c' => 'PostCategoryController@index', 't' => 3, 'txt' => 'Post Category'],
////        ['m' => 'get', 'u' => 'post-category-form', 'c' => 'PostCategoryController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'put', 'u' => 'post-category-form', 'c' => 'PostCategoryController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-category-save', 'c' => 'PostCategoryController@save', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-category-update-status', 'c' => 'PostCategoryController@update_status', 't' => 1, 'txt' => ''],
////        ['m' => 'delete', 'u' => 'post-category-delete', 'c' => 'PostCategoryController@delete', 't' => 1, 'txt' => ''],
////        //End ItemCategoryController
////
////        //PostController
////        ['m' => 'get', 'u' => 'post', 'c' => 'PostController@index', 't' => 3, 'txt' => 'Post'],
////        ['m' => 'get', 'u' => 'post-form', 'c' => 'PostController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'put', 'u' => 'post-form', 'c' => 'PostController@form', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-save', 'c' => 'PostController@save', 't' => 1, 'txt' => ''],
////        ['m' => 'delete', 'u' => 'post-delete-img/{img}', 'c' => 'PostController@delete_img', 't' => 1, 'txt' => ''],
////        ['m' => 'post', 'u' => 'post-update-status', 'c' => 'PostController@update_status', 't' => 1, 'txt' => ''],
////        ['m' => 'delete', 'u' => 'post-delete', 'c' => 'PostController@delete', 't' => 1, 'txt' => ''],
////        //End PostController
//
//
////        admin role
//        ['m' => 'get', 'u' => 'role', 'c' => 'RoleController@index', 't' => 3, 'txt' => 'User Role'],
//        ['m' => 'get', 'u' => 'role-form', 'c' => 'RoleController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'role-form', 'c' => 'RoleController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'role-save', 'c' => 'RoleController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'role-delete', 'c' => 'RoleController@delete', 't' => 1, 'txt' => ''],
////        admin user
//        ['m' => 'get', 'u' => 'admin', 'c' => 'AdminController@index', 't' => 3, 'txt' => 'User Admin'],
//        ['m' => 'get', 'u' => 'admin-form', 'c' => 'AdminController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'put', 'u' => 'admin-form', 'c' => 'AdminController@form', 't' => 1, 'txt' => ''],
//        ['m' => 'post', 'u' => 'admin-save', 'c' => 'AdminController@save', 't' => 1, 'txt' => ''],
//        ['m' => 'delete', 'u' => 'admin-delete', 'c' => 'AdminController@delete', 't' => 1, 'txt' => ''],
//


    ],
]);
