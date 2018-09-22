<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers", "Origin, X-Request-Width, Content-Type, Accept"); 
use Illuminate\Http\Request;
<<<<<<< HEAD
use App\lembrete;
//use App\Http\Middleware\JwtMiddleware;
=======

>>>>>>> aeb8564b74093153bd79558457a5675c54e68376

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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
	Route::get('user', 'UserController@getAuthenticatedUser');
	Route::get('closed', 'DataController@closed');
});

Route::group(['prefix'=>'lembretes'],function (){
	Route::get('', 'Api\LembreteController@listAll');
	Route::get('{id}','Api\LembreteController@listOne');
	Route::put('{id}', 'Api\LembreteController@update');
	Route::delete('{id}', 'Api\LembreteController@delete');
	Route::post('/create','Api\LembreteController@create');
});

Route::group(['prefix'=>'chat'], function(){
	Route::post('', 'Api\ChatController@createChat');
	Route::put('{sessionId}', 'Api\ChatController@closeChat');
});



