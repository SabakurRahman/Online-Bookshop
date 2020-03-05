@extends('layouts.master')


@section('content')
 
 

 
<div class="container">
   <form class="mt-5" action="{{route('book.search')}}" method="get">
    <div class="input-group">
   <input type="search" name="search" class="form-control">
   <div class="input-group-append">
     <a><button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button></a>
   </div>
   
    </div>
  </from>
   
<div class="row mt-5">
  @foreach($books as $book)
  
	<div class="col-md-4 col-sm-12 mb-3" >
  <div  class="card" style="width: 20rem;">

  


  <img class="card-img-top" height="200px"  src="{{url('/images/'.$book->image_path)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title text-success">{{$book->title}}</h5>
    <p class="card-text text-info">{{$book->description}}</p>
    <div class="clearfix">
    <div class="price pull-left text-danger">Price:${{$book->price}}</div><br>
    @if($book->prem_dis !=0)
    <div class="price pull-left text-warning">{{$book->prem_dis}}% OFF</div><br>
    
  
    @endif
    
    <a href="{{ route('book.AddToCart',['id'=>$book->id]) }}" class="btn btn-primary pull-right">Add to Cart</a>
</div>
  </div>
</div>

</div>
@endforeach

</div>

</div>
















@endsection