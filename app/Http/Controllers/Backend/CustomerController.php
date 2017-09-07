<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Subscribe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    function customerList(Request $request){
        return view('backend.customer.user_list',User::getPaginateSearch($request));
    }
    function customerContact(Request $request){
        return view('backend.customer.contact',Contact::getPaginateSearchContact($request));
    }
    function customerSubscribe(Request $request){
        return view('backend.customer.subscribe',Subscribe::getPaginateSearchSubscribe($request));
    }
    function viewContact($id=null){
        if ($id !=null){
            $m=Contact::find($id);
            if ($m != null){
                $m->increment('view_alert');
            }
            $data['contact_detail']= $m;
            return view('backend.customer.contact_detial',$data);
        }else{
            return redirect('/backend/customer-contact');
        }

    }
}
