<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/result', function () {
    return view('result');
});
Route::get('/editmyprofile', function () {
    return view('Users.edit');
});
Route::get('/khtot', function () {
    return view('khtot')->with('transports',\App\Transport::all());
});

Route::get('/findchildern/{location}/{destination}',[
   'uses'=>'GraphController@constructgraph',
    'as'=>'Find.child',
]);
Route::get('/yarab',function(){
   return view('ayhaga');
});