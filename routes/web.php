<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// email: admin@gmail.com
// password: 123456


Route::get('/', function () {
    return view('welcome');
});


Route::namespace('Auth')->group(function () {
	Route::group(['prefix'=>'/','middleware'=>'CheckLogedIn'],function(){
		Route::get('','LoginController@getLogin')->name('login');
		Route::post('','LoginController@postLogin');	

		//google login
		Route::get('auth/google', 'GoogleController@redirectToGoogle')->name('auth.google');
		Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

		//google facebook
		Route::get('auth/redirect/{provider}', 'FacebookController@redirect')->name('auth.facebook');
  		Route::get('auth/callback/{provider}', 'FacebookController@callback');
	});

	//register - user
	Route::get('register','RegisterController@getRegister')->name('register');
	Route::post('register','RegisterController@postRegister');

	//forgot-password
	Route::get('forgot-password','ForgotPasswordController@getEmail')->name('forgot-password');
	Route::post('forgot-password','ForgotPasswordController@postEmail');
	Route::get('reset-password/{token}', 'ResetPasswordController@getPassword');
	Route::post('reset-password', 'ResetPasswordController@updatePassword');
});

//admin
Route::namespace('Admin')->group(function () {
	Route::get('logout','HomeController@logout')->name('logout');

	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		//home
		Route::get('','HomeController@home')->name('home');

		//update password follow id
		Route::get('update-password','UserController@getUpdatePasswordId')->name('updatePasswordId');
		Route::post('update-password','UserController@postUpdatePasswordId');

		//================users=================//
		Route::get('user',[
			'uses'=>'UserController@index',
			'middleware'=>'checkAcl:user-list'
		])->name('user.index');
		//create-user
		Route::get('user/create',[
			'uses'=>'UserController@create',
			'middleware'=>'checkAcl:user-create'
		])->name('user.create');
		Route::post('user/create','UserController@store')->name('user.store');
		//edit-user
		Route::get('user/edit/{id}',[
			'uses'=>'UserController@edit',
			'middleware'=>'checkAcl:user-update'
		])->name('user.edit');
		Route::post('user/edit/{id}','UserController@update')->name('user.update');
		//show-user
		Route::get('user/{id}',[
			'uses'=>'UserController@show',
			'middleware'=>'checkAcl:user-view'
		])->name('user.show');
		//delete-user
		Route::get('user/destroy/{id}',[
			'uses'=>'UserController@destroy',
			'middleware'=>'checkAcl:user-delete'
		])->name('user.destroy');

	   	//role - permission
	   	Route::resource('role', 'RoleController')->middleware('can:is-admin');
	   	Route::resource('permission', 'PermissionController')->middleware('can:is-admin');

	   	//post
	   	Route::get('del-post/{id}','PostController@destroy')->name('del-post');		
	   	Route::resource('post', 'PostController');
	   	Route::get('del-post-multiple','PostController@deleteMultiple')->name('del-post-multiple');	

	   	//pdf	
	   	Route::get('post-pdf/{id}', 'PostController@exportPDF')->name('exportPdf');

	   	//excel
	   	Route::get('post-excel', 'PostController@exportExcel')->name('exportExcel');
	});
});




