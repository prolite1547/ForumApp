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

Route::group(['middleware'=>'auth'], function(){
    
    Route::resource('channels','ChannelsController');
    Route::get('discussion/create','DiscussionsController@create')->name('discussion.create');
    Route::post('discussion/store','DiscussionsController@store')->name('discussion.store');
   
 
    Route::post('reply/{discussion_id}', 'RepliesController@store')->name('reply.store');

    Route::get('like/{id}', 'LikesController@like')->name('like');
    Route::get('unlike/{id}', 'LikesController@unlike')->name('unlike');
    
    Route::get('watch/{id}', 'WatchersController@watch')->name('watch');
    Route::get('unwatch/{id}', 'WatchersController@unwatch')->name('unwatch');

    Route::get('forum/{navigation}', 'ForumsController@navigation')->name('navigation');
   
});
    Route::get('forum','ForumsController@index')->name('forum');
    Route::get('forum/{channel}','ForumsController@filtered')->name('forum.filter');
    Route::get('discussion/{id}/{slug}','DiscussionsController@show')->name('discussion.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
