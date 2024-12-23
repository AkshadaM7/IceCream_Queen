<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }
    public function home()
    {
        $product=Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        }
        else{

            $count='';
        }
        
        return view('home.index', compact('product','count'));


    }
    public function login_home()
{
    $product = Product::all();
    if(Auth::id()){
        $user = Auth::user();
        $userId = $user->id;
        $count = Cart::where('user_id', $userId)->count();
    }
    else{

        $count='';
    }
    return view('home.index', compact('product', 'count'));
}

    public function product_details($id)
    {
        $data= Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
        }
        else{

            $count='';
        }
        return view('home.product_details',compact('data'));


    }
    public function add_cart($id)
    {
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $data=new Cart;
        $data->user_id=$user_id;
        $data->product_id=$product_id;
        $data->save();
        toastr()->timeout(10000)->closeButton()->addwarning('Product added to cart successfully!');
        return redirect()->back();

    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userId = $user->id;
            $count = Cart::where('user_id', $userId)->count();
            $cart = Cart::where('user_id', $userId)->get();
        }
        else{

            $count='';
        }
       
      return view('home.mycart',compact('count','cart'));  
    }
    public function delete_cart($id)
    {
        if (Auth::check()) {
            $cart_item = Cart::find($id);

            if ($cart_item && $cart_item->user_id == Auth::id()) {
                $cart_item->delete();
                toastr()->timeout(10000)->closeButton()->addwarning('Product removed from cart successfully!');
            } else {
                toastr()->timeout(10000)->closeButton()->adderror('You are not authorized to delete this item!');
            }
        } else {
            toastr()->timeout(10000)->closeButton()->adderror('You need to log in first!');
        }

        return redirect()->back();
    }

    public function confirm_order(Request $request){
        $name=$request->name;
        $address=$request->address;
        $phone=$request->phone;
        
        $userid = Auth::user()->id;
        $cart=Cart::where('user_id',$userid)->get();
        foreach($cart as $carts){
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$address;
            $order->phone=$phone;
            $order->user_id=$userid;
            $order->product_id=$carts->product_id;
            $order->save();
            
        }
        $cart_remove=Cart::where('user_id',$userid)->get();
        
        foreach($cart_remove as $remove){
            $data=Cart::find($remove->id);
            $data->delete();

        }
        
        return redirect()->back();

}}
