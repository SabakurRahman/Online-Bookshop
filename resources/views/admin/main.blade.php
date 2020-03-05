@extends('layouts.adminmaster')


@section('content')

   @if(Auth::user()->role_id==2)
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-dark" id="sidebar-wrapper" style="color: white;">
      <div class="sidebar-heading">BookShopBd</div>
      <div class="list-group list-group-flush" >
        <a href="" class="list-group-item list-group-item-action bg-dark" >Dashboard</a>
        <a href="{{route('admin.updatebook')}}" class="list-group-item list-group-item-action bg-dark">Uplodebook</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Edit User</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Hide Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('user.signup') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('shop.index')}}">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{Auth::user()->photo->file ?url('/images/'.Auth::user()->photo->file) : 'https://via.placeholder.com/150'}}" width="35" height="30" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('user.logout')}}">log out</a>
               
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
                <h1 class="mt-4"> users </h1>

   <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Photo</th>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Premium</th>
      <th scope="col">Status</th>
      
      <th scope="col">Created</th>
      <th scope="col">Updated</th>
       <th scope="col">Delete</th>
       
    </tr>
  </thead>
  @foreach($user as $users)
  <tbody>

 
    <tr>
      <th scope="row"></th>




      <td>
        <img height="50px" src="{{$users->photo ?url('/images/'.$users->photo->file) : 'https://via.placeholder.com/150'}}">
      </td>

      <td>{{$users->id}}</td>
      <td>{{$users->name}}</td>
      <td>{{$users->email}}</td>
       <td>
      <form action="{{route('admin.updated',['id'=>$users->id])}}" method="post" name="myform" enctype="multipart/form-data">
      <select  class="form-control" name="is_premium" >
        @if($users->is_premium==1)
      <option value="{{$users->is_premium}}">Premium</option>
       <option value="2">Gold</option>
      <option value="0">General</option>
        @elseif($users->is_premium==2)
      <option value="{{$users->is_premium}}">Gold</option>
       <option value="1">Premium</option>
      <option value="0">General</option>



        @else
      <option value="{{$users->is_premium}}">General</option>
      <option value="1">Premium</option>
      <option value="2">Gold</option>
        @endif

     </select>
      <div class="text-center ">
                     <button type="submit" class=" btn btn-block btn-success mt-2">Update</button>
                  </div>
                   {{csrf_field()}}

               </form>

 
      </td>

      
       <td>{{$users->roll?$users->roll->name:'User has No Roll'}}</td>
        <td>{{$users->created_at->diffForHumans()}}</td>
        <td>{{$users->updated_at->diffForHumans()}}</td>
        <td><a href="{{route('users.delete',['id'=>$users->id])}}">Delete</a></td>
   @endforeach
    
    </tr>
  </tbody>
</table>


      </div>
        
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
 
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
 @else
 <br>
     <div class="alert alert-danger text-center" role="alert">
  <h3>Yor are not An Admin</h3>
</div>


 @endif




<!-- Script -->






@endsection