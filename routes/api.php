<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

Route::get('weather', function() {
//    $url = 'https://api.openweathermap.org/data/2.5/weather?q=tokyo,jp&units=metric&appid=9f7ae4c7148eb987045e019a6ac8889f';
//うまく取得できなかった場合は下記をコメントアウト
//    $baseurl = 'https://api.openweathermap.org/data/2.5/forecast?';
    $baseurl = 'https://api.openweathermap.org/data/2.5/weather?';
    $lat = 'lat=35.770913&';//35.770913 緯度
    $lon = 'lon=139.896147&';//139.896147　経度
    $units = 'units=metric&';
//    $country = ',jp&';
    $id = 'appid=9f7ae4c7148eb987045e019a6ac8889f';
    $url = $baseurl.$lat.$lon.$units.$id;
//    $url = 'https://api.openweathermap.org/data/2.5/forecast?lat=35.770913&lon=139.896147&units=metric&appid=9f7ae4c7148eb987045e019a6ac8889f';
    return file_get_contents($url);
});
