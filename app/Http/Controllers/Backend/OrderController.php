<?php

namespace App\Http\Controllers\Backend;
use App\Contact;
use App\Models\Backend\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{

    function allOrder(Request $request){

        return view('backend.customer.order.index',Order::getPaginateSearch($request));
    }
    public function newOrder(Request $request)
    {
//        $data['orders'] = User::join('orders', 'users.id', '=', 'orders.user_id')->where('cancel','0')->where('paid','0')->get();
        return view('backend.customer.order.new_order',Order::getPaginateSearchNew($request));
    }
    public function orderPaid(Request $request)
    {
//        $data['orders'] = User::join('orders', 'users.id', '=', 'orders.user_id')->where('paid','1')->get();
        return view('backend.customer.order.order_paid',Order::getPaginateSearchPaid($request));
    }
    public function orderCancel(Request $request)
    {
//        $data['orders'] = User::join('orders', 'users.id', '=', 'orders.user_id')->where('cancel','1')->get();
        return view('backend.customer.order.order_cancel',Order::getPaginateSearchCancel($request));
    }
    public function loadOrderNotification(){
        $m = Order::orderBy('id','desc')->where('view_alert','=','0')->limit(30)->get();

        return response()->json($m);
    }

    public function loadContactNotification(){
        $n = Contact::orderBy('id','desc')->where('view_alert','=','0')->limit(30)->get();

        return response()->json($n);
    }


    public function viewOrder($id=null)
    {

        if ($id !=null){

            $last_invoice = Order::max('invoice_id');

            $m=Order::find($id);
            if ($m != null){
                $m->increment('view_alert');

                if ($m->invoice_id == 0){
                    $m->invoice_id = $last_invoice + 1;
                    $m->save();
                }
            }

            $data['order_detail']= $m;
//            dd(Order::find($id));
            return view('backend.customer.order.view_order_detail',$data);
        }else{
            return redirect('/backend/all-order');
        }

    }




    public function postCancel(Request $request){

        if ($request->ajax()){
            if (DB::table('orders')->where('id', Input::get('rowid'))->update(array('cancel' => 1))){
                return 'sucess';
            }else{
                return 'unsuccess';
            }
        }else{
            return 'no ajax';
        }
    }
    public function postPaid(Request $request){
        if ($request->ajax()){
//            dd(Input::get('rowid_'));
            if (DB::table('orders')->where('id', Input::get('rowid_'))->update(array('paid' => 1))){

                return 'sucess';
            }else{
                return 'unsucess';
            }
        }else{
            return ('no ajax');
        }
    }
    public function postUncancel(Request $request){
        if ($request->ajax()){
            $a = Order::find(Input::get('rowid'));
            $a->cancel = '0';
            if ($a->save()){
                return 'sucess';
            }else{
                return 'unsucess';
            }
        }else{
            return ('no ajax');
        }
    }
    public function postUnpaid(Request $request){
        if ($request->ajax()){
//            dd(Input::get('_rowid'));
            $p = Order::find(Input::get('rowid_'));
//            dd($p);
            $p->paid = '0';

            if ($p->save()){
                return 'sucess';
            }else{
                return 'unsucess';
            }
        }else{
            return ('no ajax');
        }
    }
}
