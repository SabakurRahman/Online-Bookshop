<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Books;
use App\Cart;
use Session;
use DB;
use Mail;

class BookController extends Controller
{
    //


    public function getIndex(){

    	$books=Books::all();

    	return view('shop.index',compact('books'));
       


    }


public function getAddToCart($id){
	$book=Books::find($id);


	$oldCart= Session::has('cart') ? Session::get('cart') : null;
   
   $cart = new Cart($oldCart);

    $cart->add($book,$book->id);


    Session()->put('cart',$cart);
   // dd(Session()->get('cart'));
 
    return redirect()->route('shop.index');

}



public function remove($id)
    {
       
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->rem($id);
        session()->put('cart', $cart);

       //dd(Session()->get('cart'));
       
        return back();
    }







public function showCart(){
  
  $oldCart= Session::get('cart');
  
  $cartItem = new Cart($oldCart);
 return view('shop.shopping-cart',['books'=>$cartItem->items,'totalPrice'=> $cartItem->totalPrice,'totalDisPre'=> $cartItem->totalDisPre]);

}



public function clearall(Request $request){
   
    
    $request->session()->forget('cart');
    return redirect()->route('shop.index');

}

public function search(Request $request){
   
    
    $search = $request->get('search');
    $books= DB::table('books')->where('title','like','%'.$search.'%')->paginate(5);
    if(count($books)!=0){
    return view('shop.index',compact('books'));
}
 
    return view('shop.search');


}


public function checkout(){

   $oldCart=Session::get('cart');
  $cart= new Cart($oldCart);

  if (!$oldCart) {
      return view('shop.shopping-cart');
  }
  elseif ($cart->totalPrice==0) {
    # code...
    return view('shop.shopping-cart');
  }
  else
  $total=$cart->totalPrice;
  $preDiscount=$cart->totalDisPre ;



 Mail::send([], [], function ($message) {
  $message->from('sabakur12360@gmail.com','Example')
   ->to('sabakur12360@gmail.com')
    ->subject('Payment')
    // here comes what you want
    ->setBody('Hi, welcome user!'); // assuming text/plain
    // or:
     // for HTML rich messages
});

  return view('shop.checkout',compact('total','preDiscount'));


}











}
