<?php

use App\Http\Controllers\LikeController;
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
Route::get('discussion/{slug}', 'DiscussionController@show')->name('discuss.show');
Route::post('discussions/{id}', 'DiscussionController@reply')->name('discuss.reply');
Route::get('discussions/{channel}', 'DiscussionController@showChannel')->name('discuss.showChannel');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelController');

    Route::get('discuss/create/new', 'DiscussionController@create')->name('discuss.create');
    Route::post('discuss/store', 'DiscussionController@store')->name('discuss.store');
    Route::get('discuss/edit/{id}', 'DiscussionController@edit')->name('discuss.edit');
    Route::post('discuss/update/{id}', 'DiscussionController@update')->name('discuss.update');

    Route::get('reply/like/{id}', 'RepliesController@like')->name('reply.like');
    Route::get('reply/unlike/{id}', 'RepliesController@unlike')->name('reply.unlike');
    Route::get('reply/delete/{id}', 'RepliesController@destroy')->name('reply.delete');

    Route::get('discussion/watch/{id}', 'WatchersController@watch')->name('discussion.watch');
    Route::get('discussion/unwatch/{id}', 'WatchersController@unwatch')->name('discussion.unwatch');


});


