<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup1', function () {
    return view('users.signup1');
});


Route::get('/signup',[

'uses'=>'UserController@index',
'as'=>'user.signup',
'middleware'=>'guest'

]);

Route::post('/signup',[

'uses'=>'UserController@store',
'as'=>'user.signup',

'middleware'=>'guest'
]);



Route::get('/signin',[
 'uses'=>'UserController@getSignIn',
 'as'=>'user.signin',
 'middleware'=>'guest'


]);

Route::post('/signin',[
 'uses'=>'UserController@postSignIn',
 'as'=>'user.signin',
 'middleware'=>'guest'


]);

Route::get('/logout',[
'uses'=>'UserController@logOut',
'as'=>'user.logout',
'middleware'=>'auth'


]);



Route::get('/clearall',[

'uses'=>'BookController@clearall',
'as'=>'book.clearall',
'middleware'=>'auth'



]);


Route::get('/remove/{id}',[

'uses'=>'BookController@remove',
'as'=>'book.remove',
'middleware'=>'auth'



]);







Route::get('/addToCart/{id}',[
 'uses'=>'BookController@getAddToCart',
 'as'=>'book.AddToCart',
'middleware'=>'auth'

]);






Route::get('/shoppinCart',[
 
 'uses'=>'BookController@showCart',
 'as'=>'shoppingCart.show',
 'middleware'=>'auth'


]);


Route::get('/shop',[

'uses'=>'BookController@getIndex',
 'as'=>'shop.index',
 'middleware'=>'auth'

]);

Route::get('/search',[

'uses'=>'BookController@search',
 'as'=>'book.search',
 'middleware'=>'auth'

]);

Route::get('/checkout',[

'uses'=>'BookController@checkout',
 'as'=>'checkout',
 'middleware'=>'auth'

]);

Route::get('/paypal',[

'uses'=>'UserController@paypal',
 'as'=>'paypal',
 'middleware'=>'auth'

]);



Route::get('/admin',[

'uses'=>'AdminController@getAdminIndex',
 'as'=>'admin.index',
 'middleware'=>'auth'
 

]);

Route::get('/updatebook',[

'uses'=>'AdminController@updateBook',
 'as'=>'admin.updatebook',
 'middleware'=>'auth'
 

]);

Route::post('/updatebook',[

'uses'=>'AdminController@storeBooks',
 'as'=>'admin.storebook',
 'middleware'=>'auth'
 

]);

Route::get('/admin/{id}',[

'uses'=>'AdminController@deleteUsers',
 'as'=>'users.delete',
 'middleware'=>'auth'
 

]);
Route::get('/update/{id}',[

'uses'=>'UserController@updateUser',
 'as'=>'user.updated',
 'middleware'=>'auth'
 

]);


Route::post('/update/{id}',[

'uses'=>'UserController@UpdaTed',
 'as'=>'user.updated',
 'middleware'=>'auth'
 

]);

Route::post('/adminupdate/{id}',[

'uses'=>'AdminController@adminUpdaTed',
 'as'=>'admin.updated',
 'middleware'=>'auth'
 
]);

Route::post('/customer',[

'uses'=>'UserController@customerDetails',
 'as'=>'user.customer',
 'middleware'=>'auth'
 

]);

Route::post('/cupon',[

'uses'=>'CuponsController@storeCupon',
 'as'=>'store.cupon',
 'middleware'=>'auth'
 

]);

Route::post('/cupons',[

'uses'=>'CuponsController@deleteCupon',
 'as'=>'delete.cupon',
 'middleware'=>'auth'
 

]);








