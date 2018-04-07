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
    return view('welcome')->with('streets',\App\Street::all());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/result', function () {
    return view('result');
});
Route::get('/editmyprofile', function () {
    return view('Users.edit');
});
Route::post('/Findpath',[
   "uses"=>"GraphController@startgraph",
    "as"=>"Graph.start"
]);

Route::get('/findchildern/{location}/{destination}',[
   'uses'=>'GraphController@constructgraph',
    'as'=>'Find.child',
]);
Route::post('/Sendreview',[
    "uses"=>"ReviewsController@store",
     "as"=>"ReviewsController.store"
 ]);



 Route::post('/filterbycost',[
    'uses'=>'GraphController@filtercost',
     'as'=>'Filter.cost',
 ]);
