@extends('layouts.master')


@section('content')

<div class="container">
<div class="row mt-5">


<div class="col-sm-6 ml-5 col-md-4 col-md-offset-4 col-sm-offset-4 ">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


   @if(count($errors)>0)

     <div class="alert alert-danger" >
   <ul>
       @foreach($errors->all() as $error)

      <li>{{$error}}</li>

      @endforeach
  
   </ul>

     </div>

   
   @endif
	
	


  <h3 class="text-success">Shipping Address</h3>
  


 

<form name="myForm" action="{{route('user.customer')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label>Address</label>
      <input type="text" class="form-control" name="address">
    </div>
    <div class="form-group">
      <label>Phone:</label>
      <input type="text" class="form-control" name="phone">
    </div>
    <div class="form-group">
      <label>Zip Code:</label>
      <input type="text" class="form-control" name="zip">
    </div>
    <button  type="submit" class="btn btn-success mb-5 btn-block" name="submit">Submit</button>
    {{csrf_field()}}

  </form>         
</div>
  





 <div class="col-md-4 order-md-2 mb-4 ">
  @if(Auth::user()->is_premium==1)
  <h3 class="text-success">#Premium</h3>
  @elseif(Auth::user()->is_premium==2)
  <h3 class="text-success">#Gold</h3>
  <h2>Free Shipping</h2>
  @else
  <h3 class="text-info">General User </h3>
 @endif
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Your Total</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">${{$preDiscount}}</span>
            </li>
            @if(Auth::user()->is_premium==1 || Auth::user()->is_premium==0)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Delivery Fee</h6>
                <small class="text-muted">Only for Dhaka</small>
              </div>
              <span class="text-muted">$20</span>
            </li>
            
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Your New Total</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">${{$preDiscount+20}}</span>
            </li>
            @endif
            @if(session()->has('cupon'))
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>{{session()->get('cupon')['name']}}</small>
              </div>


             <form name="myForm"  action="{{route('delete.cupon')}}" method="post" >
            <div class="form-group">
               <button type="submit" class="btn btn-danger">Remove</button>

    {{csrf_field()}}

    </div>
  </form>


              <span class="text-success">-${{session()->get('cupon')['discount']}}</span>
            </li>
            @endif
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>@if(session()->get('cupon')['discount'])


                   
                     @if($preDiscount+20-session()->get('cupon')['discount']<0)
                     
                     $20(Minimum have to pay)

                     @else
                       @if(Auth::user()->is_premium==1 || Auth::user()->is_premium==0)
                       ${{$preDiscount+20-session()->get('cupon')['discount']}}
                       @else
                         ${{$preDiscount-session()->get('cupon')['discount']}}
                       @endif

                     @endif

                     @elseif(!session()->get('cupon')['discount'])
                      @if(Auth::user()->is_premium==1 || Auth::user()->is_premium==0)

                        ${{$preDiscount+20}}

                       @else
                         ${{$preDiscount}}
                       
                       @endif 

                     @endif
         



            </strong>
            </li>
          </ul>







  <form name="myForm" class="card p-2" action="{{route('store.cupon')}}" method="post" >
   <div class="input-group">
    <input type="text" class="form-control" name="cupon"placeholder="Promo code">
    <div class="input-group-append">
    <button type="submit" class="btn btn-success">Apply</button>

    {{csrf_field()}}
  </div>

    </div>
  </form>


  
  




</div>

</div>







@endsection