<?php

namespace App\Http\Controllers\Api;
use App\chat;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function createChat(){
    	$chat = new Chat();
    	$chat->id_session = request()->id_session;
    	$chat->inicio_sessao = request()->inicio_sessao;
    	$chat->save();

    	return response()->json(['message'=>'Registro inserido com sucesso']);
    }
    public function closeChat($sessionId){
    	$chat = Chat::where('session_id', $sessionId);
    	$chat->id_session = request()->id_session;
    	$chat->fim_sessao = request()->fim_sessao;
    	$chat->save();

    	return response()->json(['message'=>'Registro inserido com sucesso. Chat finalizado hehehe']);
    }
}
