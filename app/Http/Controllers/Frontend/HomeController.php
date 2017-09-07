<?php

namespace App\Http\Controllers\Frontend;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use App\Models\Backend\Item;
use App\Models\Backend\Order;
use App\Models\Backend\SlideHome;
use App\Models\Backend\SlideProduct;
use App\Subscribe;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function postContact(Request $request){
        $contact = new Contact();
        $contact->username = $request->input('username');
        $contact->email = $request->input('email');
        $contact->enquiry = $request->input('enquiry');
        if($contact->save()){
            return redirect('/');
        }else{
            return redirect('/user/contact');
        }
    }
    public function postSubscribe(Request $request){
        $subscribe = new Subscribe();
        $subscribe->email = $request->input('email');
        if($subscribe->save()){
            return redirect('/');
        }else{
            return redirect('/');
        }
    }
    public function change_lang(Request $request, $lang)
    {
        $l = 'kh';
        if(array_key_exists($lang,arr_lang()))
        {
            $l = $lang;
        }
        $request->session()->put('lang',$l);
        return redirect()->back();
    }
    public function listProduct(){
        return view('front.menu.list_product');
    }
    public function changePasswordSuccess(){
        return view('front.customer.change_pass_success');
    }




    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $user_id = Auth::User()->id;
        $user = User::find($user_id);

        $hashedPassword = $user->password;

        if (Hash::check($request->old_password, $hashedPassword)) {
            $user->password = Hash::make($request->password);;
            $user->save();
            return redirect('/change-password-success');
        }
        return redirect()->back()->withErrors($request->all());
    }



    public function resetPassword(){
        return view('auth.passwords.reset');
    }
//    public function categoryList($category_id=0){
//        $items = Item::where('category_id',$category_id)->paginate(12);
//        if (count($items) == 0){
//            $items = Item::paginate(12);
//        }
//        $productslide = SlideProduct::where('status',1)->get();
//        return view('front.menu.category_list',['productslide'=>$productslide,'items'=>$items]);
//    }

    public function categoryList($category_id=0,Request $request){

        $f = $request->f;
        $o = $request->o;

        if ($f != null && $o != null){
            $items = Item::where('category_id',$category_id)
                ->orderBy($f,$o)
                ->paginate(12);
        }else{
            $items = Item::where('category_id',$category_id)->paginate(12);
        }
        if (count($items) == 0){
            if ($f != null && $o != null){
                $items = Item::orderBy($f,$o)->paginate(12);
            }else{
                $items = Item::paginate(12);
            }
        }
        $productslide = SlideProduct::where('status',1)->get();
        return view('front.menu.category_list',['productslide'=>$productslide,'items'=>$items,'category_id'=>$category_id]);
    }
    public function special(Request $request){
        $f = $request->f;
        $o = $request->o;
        if ($f != null && $o != null){
            $special = Item::where('promotion_price','!=',null)->orderBy($f,$o)->paginate(12);
        }else{
            $special = Item::where('promotion_price','!=',null)->paginate(12);
        }
        return view('front.menu.special',['special'=>$special]);
    }



    public function home(){
        $home_slide = SlideHome::where('status',1)->get();

        return view('front.menu.home',['home_slides'=>$home_slide]);
    }
    public function detail(){
        $item_detail=Item::all();
        return view('front.detail.detail',['items'=>$item_detail]);
    }
    public function productDetail($id){
        return view('front.detail.detail',['items'=>Item::find($id)]);
    }
    public function detailPopup(){
        $item_pops=Item::all();
        return view('front.detail.detial_popup',['item_pops'=>$item_pops]);
    }
    public function productDetailPopup($id){
        return view('front.detail.detial_popup',['item_pops'=>Item::find($id)]);
    }
    public function blog(){
        $blog = Blog::where('status',1)->get();
        return view('front.page.blog',['blog'=>$blog]);
    }
    public function blogArticle(){
        $blog = Blog::where('status',1)->get();
        return view('front.page.blogarticle',['blog'=>$blog]);
    }
    public function blogDetail($id){
        return view('front.page.blogarticle',['blog'=>Blog::find($id)]);
    }
    public function about(){
        return view('front.page.about');
    }
    public function checkout(){
        return view('front.customer.checkout');
    }
    public function deliveryInfo(){
        return view('front.page.delivery_info');
    }
    public function privacy(){
        return view('front.page.privacy');
    }
    public function sideMap(){
        return view('front.page.side_map');
    }
    public function condition(){
        return view('front.page.condition');
    }
    public function registerSuccess(){
        return view('front.customer.register_success');
    }
    public function checkoutStep($id = null){
        if($id != null){
            $users = DB::table('users')->find($id);
            return view('front.customer.checkout_step',['user' => $users]);
        }else{
            return redirect()->back();
        }
    }

    public function howToUse(){
        return view('front.page.use');
    }

    public function postUpdateCheckoutStep(Request $request){
        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->province_city = $request->input('province_city');
        $user->house_number = $request->input('house_number');
        $user->sangkat = $request->input('sangkat');
        $user->location_type = $request->input('location_type');
        $user->road = $request->input('road');
        $user->khan = $request->input('khan');
        $user->direction_guide = $request->input('direction_guide');
        $user->update($request->all());
        return redirect('/checkout-step'.'/'.$user->id);
    }
    public function postCheckoutStep(Request $request){
        $order = new Order();
        $order->invoice_id = 0;
        $order->user_id = $request->input('u_id');
        $order->delivery_date = $request->input('delivery_date');
        $order->delivery_time = $request->input('delivery_time');
        $order->total_qty = Cart::instance('shopping')->count();
        $order->sub_total = Cart::instance('shopping')->subtotal();
        $order->tax = Cart::instance('shopping')->tax();
        $order->total_price = Cart::instance('shopping')->total();
        $d = [];
        foreach (Cart::instance('shopping')->content() as $k=>$v){
            $d[] = $v;
            $item_id = $v->id;
            $m = Item::find($item_id);
            if($m != null){
                $m->increment('count_sale');
            }
        }
        $order->order_detail = json_encode($d);
        if (Cart::instance('shopping')->count()-0 == 0){
            return redirect('/checkout/'.$request->input('u_id'));
        }else{
            if($order->save()){
                Cart::instance('shopping')->destroy();
                return redirect('/checkout/success/'.$request->input('u_id'));
            }else{
                return redirect('/checkout-step/'.$request->input('u_id'));
            }
        }
    }
    public function checkoutSuccess(){
        return view('front.customer.checkout_success');
    }
    public function logout(){
        return view('front.customer.logout');
    }
    public function myAccount(){
        return view('front.customer.account.myaccount');
    }
    public function editAccount(){
        $id = Auth::id();
        $users = DB::table('users')->find($id);
        return view('front.customer.account.edit',['user' => $users]);
    }
    public function postEditAccount(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->update($request->all());
        return redirect('/edit-account');
    }
    public function address(){
        $id = Auth::id();
        $users = DB::table('users')->find($id);
        return view('front.customer.account.address',['user' => $users]);
    }
    public function editAddress(){
         $id = Auth::id();
         $users = DB::table('users')->find($id);
        return view('front.customer.account.edit-address',['user' => $users]);
    }
    public function postEditAddress(Request $request){
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->province_city = $request->input('province_city');
        $user->house_number = $request->input('house_number');
        $user->sangkat = $request->input('sangkat');
        $user->location_type = $request->input('location_type');
        $user->road = $request->input('road');
        $user->khan = $request->input('khan');
        $user->direction_guide = $request->input('direction_guide');
        $user->update($request->all());
        return redirect('/edit-address');
    }






    public function wishList(){
        return view('front.customer.wishlist');
    }
    public function orderHistory($id = null){
        if ($id != null) {
            $OrderInfo = Order::orderBy('created_at', 'desc')->where('user_id', '=', $id)->paginate(10);
            return view('front.customer.order.history',['OrderInfo' => $OrderInfo, 'location_type' => User::select('location_type')->find($id), 'customer_info' => User::find($id)]);
        } else {
            return redirect('/order/history');
        }
    }
    public function orderHistoryInfo($id=null){
        if ($id !=null){
            $data['order_history_detail']=Order::find($id);
            return view('front.customer.order.history_info',$data);
        }else{
            return redirect('/order/history');
        }
    }
//    function repeatOrder($id = null, $u_id = null)
//    {
//        $orderinfo = Order::find($id);
//
//        if ($orderinfo) {
//            foreach (json_decode($orderinfo->order_detail) as $k) {
//                Cart::add($k->id, $k->name, $k->qty, $k->price, ['image' => $k->options->image]);
//            }
//            $orderinfo->delete();
//            return redirect('/checkout' . '/' . $u_id);
//        }
//    }
    public function contact(){
        return view('front.customer.contact');
    }

//    Add to wishlist
    function addWishlist(Request $request){
        if ($request->ajax()){
            Cart::instance('wishlist')->add($request->input('wish_id'),$request->input('wish_name'),
                1,$request->input('wish_price'),['image' => $request->input('wish_image'),
                    'code' => $request->input('wish_code'),'color' => $request->input('wish_color'),
                    'size' => $request->input('wish_size')]);
            return Cart::instance('wishlist')->content();
        }else{
            return null;
        }
    }
    function getWishlist(){
        return Cart::instance('wishlist')->content();
    }

    function removeWishlist(Request $request){
        if ($request->ajax()){
            Cart::instance('wishlist')->remove($request->input('wishid'));
            return Cart::instance('wishlist')->content();
        }else{
            return null;
        }
    }
//    End add to wishlist
    //Add to cart controller
    function addCart(Request $request)
    {
        if ($request->ajax()) {
            $qty = isset($request->qty)?$request->qty:1;
            if (Cart::instance('shopping')->add($request->input('id'),$request->input('name'),$qty, $request->input('price'),
                ['image' => $request->input('image'),'code' => $request->input('code'),'color' => $request->input('color'),
                    'size' => $request->input('size')])) {
                return Cart::instance('shopping')->content();
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    function getCart()
    {
        return Cart::instance('shopping')->content();
    }

    function removeCart(Request $request)
    {
        if ($request->ajax()) {
            Cart::instance('shopping')->remove($request->input('rowid'));
            return Cart::instance('shopping')->content();
        } else {
            return null;
        }
    }
    function updateCart(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $qty = $request->qty;

                Cart::instance('shopping')->update($id, $qty);

            return Cart::instance('shopping')->content();
        } else {
            return null;
        }
    }

    function updateCart1(Request $request)
    {
        if ($request->ajax()) {
            Cart::instance('shopping')->update($request->input('rowid'), $request->input('qty'));
            return Cart::instance('shopping')->content();
        } else {
            return null;
        }
    }
    function destroyCart(Request $request)
    {
        if ($request->ajax()) {
            Cart::instance('shopping')->destroy($request->input('rowid'));
            return Cart::instance('shopping')->content();
        } else {
            return null;
        }
    }
    function totalQty()
    {
        return Cart::instance('shopping')->count();
    }
//End Add to cart controller
}
