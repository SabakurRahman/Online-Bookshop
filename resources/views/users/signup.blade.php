@extends('layouts.master')

@section('content')



 <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Create Account — it’s free!
            </h1>
            <h2 class="wv-heading--subtitle">
               Lorem ipsum dolor sit amet! Neque porro quisquam est qui do dolor amet, adipisci velit...
            </h2>
         </div>
     @if(count($errors)>0)

     <div class="alert alert-danger" >
	 <ul>
       @foreach($errors->all() as $error)

      <li>{{$error}}</li>

      @endforeach
  
   </ul>

     </div>

   
   @endif 

      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="{{route('user.signup')}}" method="post" name="myform" enctype="multipart/form-data">
                  <div class="form-group">
                     <input type="text" name="name"  class="form-control my-input" id="name" placeholder="Name">
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email">
                  </div>
                   <div class="form-group">
                     <input type="password" name="password"  class="form-control my-input" id="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <input type="password" name="password_confirmation"  class="form-control my-input" id="password" placeholder="ConformPassword">
                  </div>
                  
                  <div class="sk1">
                 <label>Insert Your Image</label><br>
                 <input type="file" name="photo_id">
                 </div>
                  
                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm mt-2">Create Your Free Account</button>
                  </div>
                  
                 
                  <p class="small mt-3">By signing up, you are indicating that you have read and agree to the <a href="#" class="ps-hero__content__link">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                  </p>
     {{csrf_field()}}

               </form>
            </div>
         </div>
      </div>
    


@endsection
