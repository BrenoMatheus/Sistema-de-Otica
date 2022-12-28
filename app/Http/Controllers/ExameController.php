<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pacient;
use App\Models\Exame;
use App\Models\User;
use App\Models\Local;

class ExameController extends Controller
{
    public function create($id){
        $disabled = '1';
        $pacient = Pacient::findOrFail($id);
        $local = Local::where('id', $pacient->local_id)->first();  
        $user = auth()->user();      
        return view('exame.create-exame',['pacient' => $pacient,'local' => $local, 'user'=> $user->name,'disabled' => $disabled]);
    }
public function store(Request $request){
    $exame = new Exame;

    $exame->doutor = $request->doutor;
    $exame->dir_longe = $request->dir_longe;
    $exame->dir_perto = $request->dir_perto;
    $exame->esq_longe = $request->esq_longe;
    $exame->esq_perto = $request->esq_perto;
    $exame->diagnostico = $request->diagnostico;
    $exame->indicacao = $request->indicacao;
    $exame->observacao = $request->observacao;
    $exame->data = $request->data;
    $exame->pacient_id = $request->pacient_id;
    $exame->local_id = $request->local;
    
    $user = auth()->user();
    $exame->user_id = $user->id;
    $exame->save(); 
    return redirect('/exames')->with ('msg','Exame criado com sucesso!');
 }
 public function show($id){
    $user = auth()->user();    
    $disabled = '1';
    $exame = Exame::findOrFail($id);
    $local = Local::findOrFail($exame->local_id);
    $pacient = Pacient::findOrFail($exame->pacient_id);
    $disabled_exame = '0';
    return view('exame.show-exame',['local' => $local,'exame' => $exame, 'pacient' => $pacient, 'disabled' => $disabled, 'disabled_exame' => $disabled_exame]);
}
public function edit($id){
    $user = auth()->user();    
    $disabled = '1';
    $exame = Exame::findOrFail($id);
    $local = Local::findOrFail($exame->local_id);
    $pacient = Pacient::findOrFail($exame->pacient_id);
    return view('exame.edit-exame',['local' => $local,'exame' => $exame, 'pacient' => $pacient,'disabled' => $disabled]);
}
public function update(Request $request){
    $data = $request->all();   
    Exame::findOrFail($request->id)->update($data);
    return redirect('/exames')->with('msg', 'Exame editado com sucesso!');
}
public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['posts'] = DB::table('exames')
        ->join('pacients','exames.pacient_id','=','pacients.id')
        ->join('locals','exames.local_id','=','locals.id')
        ->where('pacients.nome', 'like', '%'.$search.'%')
        ->orWhere('exames.id', 'like', '%'.$search.'%')
        ->orWhere('pacients.os', 'like', '%'.$search.'%')
        ->orWhere('locals.local', 'like', '%'.$search.'%')
        ->orderBy('exames.id','desc')
        // ->select('locals.local','pacients.nome','exames.*')
        ->get();
      return response()->json($dados);
    }
public function dashboard(){    
    $exames = DB::table('exames')
    ->join('pacients','exames.pacient_id','=','pacients.id')
    ->join('locals','exames.local_id','=','locals.id')
    ->orderBy('id','desc')
    ->select('locals.local','pacients.nome','pacients.os','exames.*')
    ->paginate(10);
    // dd($exames);
    return view('exame.exames', ['exames' => $exames]);
}
public function destroy($id){
    $exame = Exame::findOrFail($id)->delete();     
    return redirect('/exames')->with('msg', 'Exame excluido com succeso!');
}
}
