<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">BookShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">



      <li class="nav-item active">
        <a class="nav-link" href="{!! url('/'); !!}"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('shop.index')}}">Shop<span class="sr-only">(current)</span></a>
      </li>

        @if(Auth::check())
        <li class="nav-item">
        <a class="nav-link" href="{{ route('shoppingCart.show')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shoping Cart <span class="badge badge-pill badge-light">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <img src="{{Auth::user()->photo->file ?url('/images/'.Auth::user()->photo->file) : 'https://via.placeholder.com/150'}}" width="35" height="30" class="rounded-circle"> </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Dashboard</a>
          <a class="dropdown-item" href="{{route('user.updated',['id'=>Auth::user()->id])}}" >Edit Profile</a>
          <a class="dropdown-item" href="{{route('user.logout')}}">Log Out</a>
        </div>
      </li>   
      </li>

       @else
       <li class="nav-item">
            <a href="{{route('user.signup')}}" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>
          </li>
          <li class="nav-item">
            <a href="{{route('user.signin')}}" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
          </li>
          

       @endif



      
       
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    
  </div>
</nav>