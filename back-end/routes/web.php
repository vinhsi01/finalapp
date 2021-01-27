<?php
// use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/','User.index');
 Route::view('/album','User.album');
 //Route::view('/login','User.login');
 Auth::routes(['verify' => true]);

Route::post('/login/post','UserController@postLogin');
Route::get('/login','UserController@getLogin')->name('login');
Route::get('/register','UserController@getRegister');
Route::post('/register/post','UserController@postRegistration');
Route::get('/logout', 'UserController@logout');
Route::get('/','PostController@index');
// Route::view('/photo','User.photo');
//Route::view('/editPhoto/{id}','User.editPhoto');
Route::get('/admin','AdminController@index')->name('admin');
Route::group(['middleware' => ['auth']],function(){
    Route::view('/addPhoto/store','User.addPhoto');
    Route::get('/photo','PostController@showPhoto');
    Route::post('/photo/store','PostController@store');
    Route::get('/editPhoto/{id}','PostController@edit');
    Route::put('/photo/update','PostController@update');
    Route::get('/photo/delete/{id}','PostController@destroy');
});

// Route::redirect('/here','/there');
// Route::view('/welcome','welcome');
// Route::get('user/{id}',function($id){
//     return 'User '.$id;
// });
// Route::get('user/{user}/post/{post}',function($id,$idPost){
//     return 'this is '.$idPost.' of '.$id;
// });
// Route::get('user/{id?}',function($id = null){
//     if($id == null){
//         return 'List User';
//     }
//     return "User $id";
// });
// Route::get('post/{id}/comment/{comment?}',function($id,$comment=2){
//     return "Post $id with comment $comment";
// });
// Route::get('user/{id}',function($id){
//     return "this is $id";
// });
// Route::get('search/{search}',function ($search){
//     return $search;
// })->where('search','.*');

// //$url = route('profile',['id' => 1]);
// Route::namespace('admin')->group(function(){
//     Route::get('user',function(){
//         return "this is user";
//     });
// });
// Route::domain('{account}.myapp.com')->group(function(){
//     Route::get('user/{id}',function ($account,$id){
//         return "this is $account and $id";
//     });
// });
// Route::get('age/{age}',function($age){
//     return $age;
// })->middleware(CheckAge::class);

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::view('/vinh','layouts.app');