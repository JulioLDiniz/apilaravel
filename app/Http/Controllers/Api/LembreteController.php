<?php
namespace App\Http\Controllers\Api;
use App\lembrete;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LembreteController extends Controller
{
    public function create(){
        $lembrete = new lembrete();
        $lembrete->descricao = request()->descricao;
        $lembrete->data = request()->data;
        $lembrete->status = request()->status;
        $lembrete->save();
        return "Lembrete Inserido";
    }
    public function listAll(){
        return response()->json(lembrete::all());
    }
    public function listOne($id){
        return lembrete::find($id);
    }
    public function update($id){
        $lembrete = lembrete::find($id);
        $lembrete->descricao = request()->descricao;
        $lembrete->data = request()->data;
        $lembrete->status = request()->status;
        $lembrete->save();
        return 'Lembrete Alterado';
    }
    public function delete($id){
        try{
            $lembrete = lembrete::find($id);
            $lembrete->delete();
            return 'Lembrete Deletado';
        }catch(\Exception $e){
            return 'Lembrete não encontrado ';
        }
        
    }
}
