<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cupon;
use Session;

class CuponsController extends Controller
{
    //
    public function storeCupon(Request $request){

      $cupon=Cupon::where('code',$request->cupon)->first();

      if(!$cupon){
      	return redirect()->route('checkout')->withErrors('Invalid Code Try Again ');
      }

      session()->put('cupon',[
        'name'=>$cupon->code,
        'discount'=>  $cupon->discount(Session::get('cart')->totalDisPre),
         

      ]);
      return redirect()->route('checkout')->with('message','Cupon Applied');

    }


    public function deleteCupon(){

     session()->forget('cupon');
      return redirect()->route('checkout')->with('message','cupon has been removed');






    }

}
