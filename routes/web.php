<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/forum', 'ForumController@index')->name('forum');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelController');
    Route::get('discuss/create', 'DiscussionController@create')->name('discuss.create');
    Route::post('discuss/store', 'DiscussionController@store')->name('discuss.store');
    Route::get('discussion/{slug}', 'DiscussionController@show')->name('discuss.show');
    Route::get('discussions/{channel}', 'DiscussionController@showChannel')->name('discuss.showChannel');
    Route::post('discussions/{id}', 'DiscussionController@reply')->name('discuss.reply');


});


