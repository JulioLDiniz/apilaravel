<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers", "Origin, X-Request-Width, Content-Type, Accept"); 
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

Route::group(['prefix'=>'pacientes'],function(){
    Route::get('/', function(){
        $a = ["nome" => "Julio",
        "peso"=> 90,
        "altura"=> 1.83,
        "gordura"=> 10,
        "imc"=> 00.00],[
            "nome" => "Julio",
        "peso"=> 90,
        "altura"=> 1.83,
        "gordura"=> 10,
        "imc"=> 00.00
        ];
        return response()->json($a);
    });
});


