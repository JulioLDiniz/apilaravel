<?php
namespace App\Http\Controllers\Api;
use App\lembrete;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;




class LembreteController extends Controller
{
    public function __construct()
 
   {
 
       $this->middleware('jwt.verify');
 
   }
    public function create(){
        try {
            $lembrete = new lembrete();
            $lembrete->descricao = request()->descricao;
            $lembrete->data = request()->data;
            $lembrete->status = request()->status;
            if(!$lembrete->save()){
                throw new \Exception("Erro ao criar lembrete!");
            }
            $lembrete->save();
            return response()->json(['message'=>'Lembrete criado!']);
        } catch (\Exception $e) {
            return response()->json(['message-error'=>$e->getMessage()]);
        }
        
    }
    public function listAll(){
        try {
            if(is_null(lembrete::all())){
                throw new \Exception("Nada a exibir");
            }
            return response()->json(lembrete::all());
        } catch (\Exception $e) {
            return response()->json(['message-error'=>$e->getMessage()]);
        }        
    }
    public function listOne($id){
        try {
            if(is_null(lembrete::find($id))){
                throw new \Exception("Lembrete não encontrado");
            }
            return response()->json(lembrete::find($id));
        } catch (\Exception $e) {
            return response()->json(['message-error'=>$e->getMessage()]);
        } 
    }
    public function update($id){
        try {
            $lembrete = lembrete::find($id);
            if(is_null($lembrete)){
                throw new \Exception("Lembrete não encontrado");
            }
            $lembrete->descricao = request()->descricao;
            $lembrete->data = request()->data;
            $lembrete->status = request()->status;
            if(!$lembrete->update()){
                throw new \Exception("Erro ao alterar lembrete");                
            }
            $lembrete->update();
            return response()->json(['message-success'=>'Lembrete Alterado!']);
        } catch (\Exception $e) {
            return response()->json(['message-error'=>$e->getMessage()]);
        }
        
    }
    public function delete($id){
        try {
            $lembrete = lembrete::find($id);
            if(is_null($lembrete)){
                throw new \Exception("Lembrete não econtrado");
            }
            $lembrete->delete();
            return response()->json(['message-success'=>'Lembrete Excluído!']);
        } catch (\Exception $e) {
            return response()->json(['message-error'=>$e->getMessage()]);
        }   
    }
}
