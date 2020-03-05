@extends('layouts.master')


@section('content')



<div class="row mt-5">

         <div class="col-md-4 mx-auto">
            <div class="myform form ">
                @if(count($errors)>0)

     <div class="alert alert-danger" >
   <ul>
       @foreach($errors->all() as $error)

      <li>{{$error}}</li>

      @endforeach
  
   </ul>

     </div>

   
   @endif 


            	
               <form action="{{route('user.updated',['id'=>$user->id])}}" method="post" name="myform" enctype="multipart/form-data">

               <img height:150px; class="im45 img-responsive mb-3" id="image" src="{{$user->photo ?url('/images/'.$user->photo->file) : 'https://via.placeholder.com/150'}}" height="200" width="250" class="img-thumnail" />
                <input name="img" id="profile-img" type="file" />  
               <script type="text/javascript">
               	
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#image').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#profile-img").change(function() {
  readURL(this);
});

               </script>
                

                  <div class="form-group">
                     <input type="text" name="name"  class="form-control my-input" id="name" placeholder="Name" value="{{$user->name}}">
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email" value="{{$user->email}}">
                  </div>
                   <div class="form-group">
                     <input type="password" name="password"  class="form-control my-input" id="password" placeholder="Change Password ">
                  </div>
                   <div class="form-group">
                     <input type="password" name="password_confirmation"  class="form-control my-input" id="password" placeholder="Conform Password ">
                  </div>
                  
                  
                  
                  <div class="text-center ">
                     <button  type="submit" class=" btn btn-block send-button tx-tfm mt-2">Update</button>
                  </div>
                  
                 
                 
{{csrf_field()}}

               </form>
               
               
            </div>
         </div>
      </div>




@endsection
 