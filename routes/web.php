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




Route::get('/test','TestController@test');
Route::get('/test2','TestController@test2');
Route::get('/test3','TestController@test3');
Route::get('/loading','TestController@loading');
Route::get('/font','TestController@fontawesome');
Route::get('/curltest','TestController@curltest');
Route::get('/wepay','TestController@wepay');
Route::get('/oauth','TestController@oauth');
Route::post('/weinfo','TestController@WeInfo');
Route::get('/pay','TestController@Pay');
Route::get('/weusers','TestController@WeUsers');
Route::post('/wecreate','TestController@WeCreate');
Route::get('/payauto','TestController@PayAuto');
Route::get('/success','TestController@success');


Route::get('/key','TestController@key');
Route::get('/send','TestController@send');
Route::get('/rsub','TestController@redisSubscribe');
Route::get('/rpub','TestController@redisPublish');
Route::get('/kafka','TestController@kafka');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->get('helloworld', 'App\Api\Controllers\HelloController@index');
});






Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

