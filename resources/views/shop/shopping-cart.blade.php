 @extends('layouts.master')
 @section('content')

 @if(Session::get('cart')!=null && Session::get('cart')->totalQty !=0)
 <br>
 <div class="container">
  <a href="{{ route('book.clearall') }}" class="btn btn-danger pull-right">Clearall</a>
  <table class="table table-bordered mt-5">
    <tr>
     <th width="20%">Image</th>
     <th width="20%">Item Name</th>
     <th width="10%">Quantity</th>
     <th width="20%">Price</th>
     <th width="20%">Discount</th>
     <th width="40%">New Price</th>
      
     <th width="5%">Action</th>
    </tr>
   
  @foreach($books as $cartItems)
    <tr>
       <td><img height="50px" src="{{url('/images/'.$cartItems['item']['image_path'])}}" style=""></td>
     <td>{{$cartItems['item']['title']}}</td>

     <td>{{$cartItems['qty']}}</td>

     <td>$ {{$cartItems['price']}}</td>
     <td>{{$cartItems['item']['prem_dis']}}%</td>
     
      <td>{{$cartItems['dispre']}}</td>
   
   
     <td><a href="{{ route('book.remove',['id'=>$cartItems['item']['id']]) }}"><span class="text-danger"><i class="fa fa-times fa-2x" aria-hidden="true"></i></span></a></td>
    </tr>
    @endforeach
    
    <tr>
     <td colspan="3" align="right">Total</td>
     <td align="right">$ {{$totalPrice}}</td>
      <td colspan="1" align="right">New Total</td>
      <td align="right"colspan="1">$ {{$totalDisPre}}</td>
     <td></td>
    </tr>
    
   
   </table>
   
   <a class="btn btn-success float-right" type="button" href="{{route('checkout')}}" >Checkout</a>


   @else
   <br>
     <div class="alert alert-danger text-center" role="alert">
  <h3>Cart is empty! Please Add Item</h3>
</div>

   @endif

   

</div>

@endsection