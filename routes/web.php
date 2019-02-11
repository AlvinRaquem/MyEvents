<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
   return Redirect::to('/home');
});

Auth::routes();

Route::get('/AboutUs',function(){
	return view('contact');
});

Route::get('/home', 'HomeController@index');

Route::get('/user/activation/{token}','Auth\RegisterController@userActivation');

Route::post('/comment','CommentController@store')->name('comment.store');
Route::Delete('/comment/{comment}','CommentController@destroy')->name('comment.destroy');

Route::get('user/{user}/edit','User\UserController@edit')->name('user.edit');

Route::put('user/{user}','User\UserController@update')->name('user.update');

Route::get('Event/{event}','User\UserController@show')->name('event.user.show');


Route::group(['middleware'=>['user']],function(){
	Route::get('user/home','User\UserController@index')->name('user.home');
	Route::get('Events/lists/search','User\UserController@searchevent');
	Route::get('Events/Search','User\UserController@searchbycateg');
	Route::get('Events/lists','User\UserController@getevents')->name('events.index');
	Route::post('Events/{category}','User\UserController@geteventsbycategory')->name('events.category');
});


Route::group(['middleware'=>['organizer']], function(){
	Route::resource('event','Organizer\EventController',['as'=>'event']);
	Route::get('organizer/home','Organizer\EventController@index')->name('organizer.home');
	Route::get('organizer/home/search','Organizer\EventController@searchevent');
});


Route::group(['middleware'=>['admin']],function(){

	Route::resource('category','Admin\CategoryController',['as'=>'admin']);
	Route::resource('users','Admin\UserController',['as'=>'admin']);
	Route::resource('events','Admin\EventController',['as'=>'admin']);
	Route::get('Active/Events','Admin\EventController@activeevents')->name('admin.events.active');
	Route::get('Pending/Events','Admin\EventController@index')->name('admin.events.index');
	Route::get('users/Search','Admin\UserController@UserSearch');	
	Route::get('Active/Events/Search','Admin\EventController@searchevent');
	Route::get('Pending/Events/Search','Admin\EventController@searchevent2');
});