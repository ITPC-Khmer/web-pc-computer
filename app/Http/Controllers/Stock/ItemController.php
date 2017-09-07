<?php

namespace App\Http\Controllers\Stock;

use App\Models\Stock\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    function inStock(Request $request){
        return view('stock.in_stock',Item::getPaginateSearchInStock($request));
    }
    function outStock(Request $request){
        return view('stock.out_stock',Item::getPaginateSearchOutStock($request));
    }
     function sellOff(Request $request){
        return view('stock.sell_off',Item::getPaginateSearchSellOff($request));
    }
     function popularProduct(Request $request){
        return view('stock.popular',Item::getPaginateSearchPopular($request));
    }
    function orderPaid(Request $request){
         return view('report.sale',Item::getPaginateSearchOrderPaid($request));
    }
}
