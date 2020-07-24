<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

// チャット書き込み
Route::post('/chat', 'ChatController@write')->name('chat_write');
// チャット取得
Route::get('/chat', 'ChatController@get')->name('chat_get');
// 放送中のラジオすべて取得
Route::get('/on_air', 'OnAirController@getAll')->name('on_air_get_all');
// ラジオを検索し取得
Route::get('search', 'SearchController@get')->name('search_radio');
// ラジオ局すべて取得
Route::get('/radio_station', 'RadioStationController@getAll')->name('radio_station_get_all');
// お気に入りのラジオすべて取得
Route::get('/user_favorite_radios', 'UserFavoriteRadioController@userFavoriteRadios')->name('user_favorite_radios');