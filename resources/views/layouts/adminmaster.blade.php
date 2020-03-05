<!DOCTYPE html>
 <html>
 <head>
 	<title>BookShopBd</title>
 	<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
 	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 	
 	
 	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/admin.css')}}">
 	
 	@yield('style')
 </head>
 <body>
  
  
  
  
  @yield('content')

  





  <script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 @yield('script')
 </body>
 </html>