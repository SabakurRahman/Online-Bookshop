<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Photos;
use App\Customer;
use App\User;
use App\Roll;
use DB;
use Session;



class UserController extends Controller
{
    //



    public function index(){


    return view('users.signup');

    }


    public function store(Request $request){

    	$this->validate($request,[

                'name'=>'required',
                'email'=>'email|required',
            'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'


    	]);


    
  


        $input=$request->all();

        if($file=$request->file('photo_id')){

        $name=time().$file->getClientOriginalName();

        $file->move('images',$name);

        $photo=Photos::create(['file'=>$name]);

        $input['photo_id']=$photo->id;    
      

        }

          $input['password']=bcrypt($request->password);

    	  User::Create($input);
    	  return redirect()->route('shop.index');
          Auth::login($input);


    }


public function getSignIn(Request $request){


   return view('users.signin');

}

public function postSignIn(Request $request){

      

  $this->validate($request,[

                'email'=>'email|required',
                'password'=>'required|min:5',
  ]);
  

 $someVariable = $request->input('email');

$results = DB::select( DB::raw("SELECT * FROM users WHERE email = '$someVariable' AND role_id=2") );

 

 if($results){

  if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
      
      $pic=DB::table('users')->where('email', '=', $request->input('email'));

    
    return redirect()->route('admin.index');
 }
  else return redirect()->route('user.signin');


 }



 else if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

    return redirect()->route('shop.index');
 }
  else
   return redirect()->route('user.signin');



}


public function logOut(){
    Auth::logout();
    Session::flush();
    return redirect()->route('user.signin');

}


public function paypal(){
   
   return view('shop.paypal');

}



public function updateUser($id){

     $user=User::find($id);

       return view('users.edit',compact('user'));


}

public function UpdaTed($id, Request $request){

    $this->validate($request,[

      
                'password'=>'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'



      ]);


    $user=User::whereId($id)->first();


    $user->update([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password)
    ]);

     return redirect()->route('shop.index');



}

public function customerDetails(Request $request){


$this->validate($request,[

                'name'=>'required',
                'address'=>'required',
                'phone'=>'required|min:11|max:11',
                'zip'=>'required|min:4|max:4',


      ]);

    $input=$request->all();
    Customer::Create($input);


    $request->session()->forget('cart');
    return redirect()->route('paypal');


}



}
