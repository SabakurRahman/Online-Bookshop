<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Photos;
use App\Books;
use DB;

class AdminController extends Controller
{
    //




public function getAdminIndex(){
  
  $user=User::all();


return view('admin.main',compact('user'));

}


public function updateBook(){


	return view('admin.updatebook');
}

public function storeBooks(Request $request){

	//dd($request);

	$this->validate($request,[

       'title'=>'required',
       'description'=>'required',
       'price'=>'required',
       'photo_path'=>'required',




	]);

	 $input=$request->all();


	 if($file=$request->file('photo_path')){

	 	$name=time().$file->getClientOriginalName();

	 	$file->move('images',$name);

	 	$photo=Photos::create(['file'=>$name]);
	 	$input['image_path']=$photo->file;  
	 }



    Books::Create($input);
  return redirect()->route('admin.index');



//dd($request);



}



 public function deleteUsers($id){

 	DB::table('users')->where('id', '=', $id)->delete();
 	return redirect()->route('admin.index');

 }



public function adminUpdaTed($id,Request $request){

	 $user=User::whereId($id)->first();
   

     $user->update([
    'is_premium' => $request->is_premium,
  
    ]);

     return redirect()->route('admin.index');


}


}
