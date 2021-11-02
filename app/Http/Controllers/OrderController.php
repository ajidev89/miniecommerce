<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Cookie;
class OrderController extends Controller
{
    public function show(){
        //show all orders in orders page
        $orders = Order::orderBy('created_at', 'desc')->get(); 
    
        return view('admin.orders',['orders'=> $orders]);
 
     }

    public function details($id){
        //show oders on one page
        $order = Order::findorfail($id);
        return view('admin.details',['order' => $order]);

  }
  
  public function new(){
    //store cookie cart
    $cartJson = Cookie::get('cart');
    $carts = json_decode($cartJson);
    
    return view('public.create',[
      'carts' => $carts,
      'cartJson' => $cartJson
      ]);
  }

  public function store(Request $request){
    //store new order
    $request->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'email' => 'required|email',
      'phone' => 'required|numeric',
      'address' =>'required',
      'cart' => 'required'
  ]);
       $order = New Order();
       $order->firstName = request('firstname');
       $order->lastName = request('lastname');
       $order->products = request('cart');
       $order->email = request('email');
       $order->phone = request('phone');
       $order->amount = request('amount');
       $order->address = request('address');
       $order->status = 'Pending';

       $order->save();
       //$cartJson = queue(Cookie::forget('cart'));

    return redirect('/checkout')->withCookie(Cookie::forget('cart'))->with('msg','Thank you for your order');
  }
  public function storeCookie(){
    //store product
    $id = request('id');
    $qty = request('qty');
    $product = Product::find($id);
  
    $cartCookie = Cookie::get('cart');
    $cart = json_decode($cartCookie,true);
    if($cartCookie == ''){
          $cartProduct = [
            ['productName' => $product->name,
            'price'  =>  $product->sale,
            'quantity' => $qty
            ]
          ];
          $cartJson = json_encode($cartProduct);
    }elseif(array_search($product->name,array_column($cart,'productName')) !== false ){
          $key = array_search($product->name,array_column($cart,'productName'));
          $cart[$key]['quantity'] = $qty + $cart[$key]['quantity'];
          $cartJson = json_encode($cart);
    }else{
          $cart = json_decode($cartCookie);
          $cartProduct = ['productName' => $product->name,'price'  =>  $product->sale,'quantity' => $qty];
          $cart[] = $cartProduct;
          $cartJson = json_encode($cart);
        }
     return redirect('/checkout')->withCookie(cookie()->forever('cart',$cartJson))->with('msg','Successfully added product to cart');
  } 
  public function popCookie(){
 //delete
    $cartJson = Cookie::get('cart');
    $carts = json_decode($cartJson);
    $product = request('product');
    unset($carts[$product]);
    $cartJson = json_encode($carts);

    return redirect('/checkout')->withCookie(cookie()->forever('cart',$cartJson))->with('msg','Deleted products from the cart ');
  }
  public function invaild(){
     abort(404);
  }
  public function updateOrder(Request $request){
    $id = request('id');
    $update = Order::findorFail($id);
    $update->status = 'Completed';

    $update->save();
    return redirect('/admin/orders/'.$id)->with('msg','Order completed');
 }
}
