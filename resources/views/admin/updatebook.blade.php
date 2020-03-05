@extends('layouts.adminmaster')


@section('content')

@if(Auth::user()->role_id==2)

<div class="container mt-5 main">
<div class="row mt-5">
<div class="col-sm-6 ml-5 col-md-4 col-md-offset-4 col-sm-offset-4">
	<form name="myForm" action="{{route('admin.storebook')}}" method="post" enctype="multipart/form-data">
    <div class="form-group">
    	<h3>Add New Book</h3>
      <label>Books Name</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea type="text" class="form-control" name="description"></textarea>
    </div>
    <div class="form-group">
      <label>Price</label>
      <input type="text" class="form-control" name="price">
    </div>
    <div class="sk1">
     <label>Insert Your Image</label><br>
     <input type="file" name="photo_path">
     </div>
                  
    <button  type="submit" class="btn btn-success mt-3" name="submit">Submit</button>
    {{csrf_field()}}

  </form>         
</div>

</div>
</div>






@else

<br>
     <div class="alert alert-danger text-center" role="alert">
  <h3>Yor are not An Admin</h3>
</div>


@endif






@endsection