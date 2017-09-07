<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PrintController extends Controller
{
    public function invoicePrint($id=null){
        if ($id !=null){
//            =====================style1==================
            $m = Order::select('orders.*',DB::raw('users.name, users.phone, users.email, users.direction_guide, 
                users.house_number,users.road,
                users.sangkat, users.khan, users.province_city'))
            ->join('users', 'orders.user_id', '=', 'users.id')->find($id);
//            =====================style2==================
//            $m = Order::select('orders.*',DB::raw('users.name as user_name, users.phone as user_phone ,
//                users.house_number as user_house_number ,users.road as user_road,
//                users.sangkat as user_sangkat , users.khan as user_khan , users.province_city as user_province_city'))
//                ->join('users', 'orders.user_id', '=', 'users.id')->find($id);
//            =====================style3=================
//            $m=Order::find($id);

            if ($m != null){
                $m->increment('view_alert');
            }
            $data['get_invoice']= $m ;
            return view('backend.print.invoice',$data);
        }else{
            return redirect('/backend/all-order');
        }
    }
}