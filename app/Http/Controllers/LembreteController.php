<?php
namespace App\Http\Controllers;
use App\lembrete;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LembreteController extends Controller
{
    public function create(){
        $lembrete = new lembrete();
        $lembrete->descricao = request()->descricao;
        $lembrete->data = request()->data;
        $lembrete->status = request()->status;
        $lembrete->save();
        return "Inserido";
    }
    public function listAll(){
        return lembrete::all();
    }
    public function listOne($id){

    }
    public function update($id){

    }
    public function delete($id){

    }
}
