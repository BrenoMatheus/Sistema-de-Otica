<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Despesa;
use App\Models\Venda;
use App\Models\Pacient;

class LocalController extends Controller
{
    public function create(){
        return view('local.create-local');
    }   
    public function store(Request $request){
        $local = new Local;
        
        $local->local = $request->local;
        $local->contato = $request->contato;
        $local->telefone = $request->telefone;
        $local->endereco = $request->endereco;
        $local->data = $request->data;
        $local->observacao = $request->obs;
        
        $local->save(); 
        return redirect('/locals')->with ('msg','Local cadastrados com sucesso!');
     }
     public function dashboard(){
        $locals = Local::paginate(10);
        return view('local.locals', ['locals' => $locals]);
    }
    public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['posts'] = DB::table('locals')
        ->select('locals.*')
        ->where('local', 'like', '%'.$search.'%')
        ->get();
      return response()->json($dados);
    }
    public function show($id){
        $local = Local::findOrFail($id);
        return view('local.show-local',['local' => $local]);
    }
    public function edit($id){
        $local = Local::findOrFail($id);
        return view('local.edit-local', ['local' => $local]);
    }

    public function update(Request $request){
        $data = $request->all();
        Local::findOrFail($request->id)->update($data);
        return redirect('/locals')->with('msg', 'Cadastro do local editado com sucesso!');
    }
    public function destroy($id){
        $despesa =  Despesa::where('local_id', $id)->first();
        if ($despesa != null) {
            Despesa::where('local_id', $id)->delete();
        }
        $venda = Venda::where('local_id', $id)->first();
        if ($venda != null) {
            Venda::where('local_id', $id)->delete();
        }
        $pacient = Pacient::where('local_id', $id)->first();
        if ($pacient != null) {
            Pacient::where('local_id', $id)->delete();
        }
        Local::findOrFail($id)->delete();
        return redirect('/locals')->with('msg', 'Local excluido com succeso!');
    }
}
