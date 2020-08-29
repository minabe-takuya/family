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
//イベント登録用
Route::post('/events', 'EventsController@create')->name('events.create')->middleware('auth');
//イベント登録画面表示用
Route::get('/events/new', 'EventsController@new')->name('events.new')->middleware('auth');
//マイページ表示用
Route::get('/mypage', 'EventsController@mypage')->name('events.mypage')->middleware('auth');
//検索結果表示用
Route::get('/search', 'EventsController@search')->name('events.search')->middleware('auth');
//イベント編集画面表示用
Route::get('/events/{id}/edit', 'EventsController@edit')->name('events.edit')->middleware('auth');
//イベント削除用
Route::post('/events/{id}/delete', 'EventsController@destroy')->name('events.delete')->middleware('auth');
//イベント更新用
Route::post('/events/{id}/edit', 'EventsController@update')->name('events.update')->middleware('auth');
//写真登録用
Route::post('/photos', 'PhotosController@create')->name('photos.create')->middleware('auth');
//写真画面表示用
Route::get('/photos/new', 'PhotosController@new')->name('photos.new')->middleware('auth');
//写真一覧表示用
Route::get('/index', 'PhotosController@index')->name('photos.index')->middleware('auth');
//写真編集画面表示用
Route::get('/photos/{id}/edit', 'PhotosController@edit')->name('photos.edit')->middleware('auth');
//写真削除用
Route::post('/photos/{id}/delete', 'PhotosController@destroy')->name('photos.delete')->middleware('auth');
//写真更新用
Route::post('/photos/{id}/edit', 'PhotosController@update')->name('photos.update')->middleware('auth');
//プロフィール編集画面表示用
Route::get('/auth/{id}/edit', 'Controller@edit')->name('auth.edit')->middleware('auth');
//プロフィール更新用
Route::post('/auth/{id}/edit', 'Controller@update')->name('auth.update')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
