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
    $street_count = count(\App\Street::all());
    $users_count = count(\App\User::all());
    $transport_count = count(\App\Transport::all());
    return view('new_home')->with('streets',\App\Street::orderBy('street_name')->get())->with('street_count',$street_count)->with('transport_count',$transport_count)->with('users_count',$users_count);
})->name('homepage');

Route::get('/#team', function () {
    $street_count = count(\App\Street::all());
    $users_count = count(\App\User::all());
    $transport_count = count(\App\Transport::all());
    return view('new_home')->with('streets',\App\Street::orderBy('street_name')->get())->with('street_count',$street_count)->with('transport_count',$transport_count)->with('users_count',$users_count);
})->name('team');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/result', function () {
    return view('result');
});
Route::get('/Viewprofile', [
    'uses'=>'profilecontroller@index',
    'as'=>'Goto'
]);
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
Route::post('/filterbytime',[
    'uses'=>'GraphController@filtertime',
    'as'=>'Filter.time',
]);
Route::post('/filterbytransport',[
    'uses'=>'GraphController@sortaccordingtranzites',
    'as'=>'Filter.transport',
]);

Route::get('/Review', function () {
    return view('thanks');
});


Route::post('/Editmyprofile',[
    'uses'=>'profilecontroller@update',
    'as'=>'Edit.profile'
]);

Route::get('/Login',function (){
    return view('auth.login');
});

Route::get('/SignUp',function (){
    return view('auth.register');
});


Route::get('/Viewreview/{id}',[
    'uses'=>'Admincontroller@returnreview',
    'as'=>'review.view',
]);

Route::post('/Save',[
    'uses'=>'Admincontroller@editneeded',
    'as'=>'Admin.save'
]);

Route::get('/AdminIndex',[
    'uses'=>"Admincontroller@index",
    'as'=>'Admin.index'
]);
Route::post('/AddTransport',[
    'uses'=>'Admincontroller@AddTransport',
    'as'=>'Add.transport',
]);


Route::post('/Addstreett',[
    'uses'=>'Admincontroller@Addstreet',
    'as'=>'Add.street',
]);
Route::post('/AdminView',[
   'uses'=>'Admincontroller@show',
    'as'=>'Admin.show'
]);

Route::post('/Edit',[
    'uses'=>'Admincontroller@returnediting',
    'as'=>'Admin.edit'
]);
Route::post('/delete',[
    'uses'=>'Admincontroller@delete',
    'as'=>'Admin.remove'
]);

Route::get('/custom',function (){

    dd(config('app.developers'));
});

