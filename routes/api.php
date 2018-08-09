<?php

use Illuminate\Http\Request;
use App\lembrete;

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


Route::group(['prefix'=>'lembretes'],function (){
        Route::get('', 'Api\LembreteController@listAll');
        Route::get('{id}','Api\LembreteController@listOne');
        Route::post('/', function (){

            return 'Criar usuário na base';
        });
        Route::put('{id}', 'Api\LembreteController@update');
        Route::delete('{id}', function ($id){
            return 'Deletar usuário '.$id;
        });

        Route::post('/create','Api\LembreteController@create');
});


