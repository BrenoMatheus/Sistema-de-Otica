<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Exame;
use App\Models\Pacient;
use App\Models\Venda;
use App\Models\Local;
use App\Models\Produto;
use App\Models\User;

class VendaController extends Controller
{
    public function create($id){
        $exame = Exame::find($id);
        $pacient = Pacient::find($exame->pacient_id);        
        $produtos = Produto::all();
        $locals = Local::all();
        $disabled ='1';
        $disabled_exame ='1';
        $user = auth()->user();
        return view('venda.create-venda',['locals' => $locals,'exame' => $exame, 'pacient' =>$pacient, 'disabled' => $disabled, 'produtos' => $produtos, 'disabled_exame' => $disabled_exame]);
    }  
    public function show($id){
        $venda = Venda::findOrFail($id);
        if($venda->compra != ''){
            $produtos = Produto::whereIn('id', $venda->compra)->get();
        }else{
            $produtos = null;
        }
         if($venda->exame_id != ''){
          $exame = Exame::where('id', $venda->exame_id)->first(); 
          $extend ='exame.show-exame';
          $section ='cliente';
        }else{
            $exame = null;
            $extend ='pacients.show-pacient';
            $section ='exame';
        }
        $pacient = Pacient::where('id', $venda->pacient_id)->first(); 
        $user = auth()->user();
        $disabled = '1';
        $disabled_exame = '1';
        $hasUserJoined = false;
        if($exame != null){       
            $hasUserJoined = true;
        }

        return view('venda.show-venda',['section' => $section,'extend' => $extend,'venda' => $venda,'produtos' => $produtos,'exame' => $exame, 'pacient' => $pacient, 'hasUserJoined' => $hasUserJoined,'disabled' => $disabled, 'disabled_exame' => $disabled_exame]);
    }
    public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['posts'] = DB::table('vendas')
        ->join('locals', 'vendas.local_id', '=', 'locals.id')
        ->join('pacients', 'vendas.pacient_id', '=', 'pacients.id')
        ->select('locals.local','vendas.*','pacients.nome','pacients.os')
        ->where('pacients.nome', 'like', '%'.$search.'%')
        ->orWhere('locals.local', 'like', '%'.$search.'%')
        ->orWhere('pacients.os', 'like', '%'.$search.'%')
        ->get();
      return response()->json($dados);
    }
    public function edit($id){
        $venda = Venda::findOrFail($id);
        $produtos = Produto::all();
        // if($venda->compra != ''){
        //     $produtos = Produto::whereIn('id', $venda->compra)->get();
        // }else{
        //     $produtos = null;
        // }
         if($venda->exame_id != ''){
          $exame = Exame::where('id', $venda->exame_id)->first(); 
          $extend ='exame.show-exame';
          $section ='cliente';
        }else{
            $exame = null;
            $extend ='pacients.show-pacient';
            $section ='exame';
        }
        $pacient = Pacient::where('id', $venda->pacient_id)->first(); 
        $user = auth()->user();
        $disabled = '1';
        $disabled_exame = '1';
        $hasUserJoined = false;
        if($exame != null){       
            $hasUserJoined = true;
        }

        return view('venda.edit-venda',['section' => $section,'extend' => $extend,'venda' => $venda,'produtos' => $produtos,'exame' => $exame, 'pacient' => $pacient, 'hasUserJoined' => $hasUserJoined,'disabled' => $disabled, 'disabled_exame' => $disabled_exame]);
    }
    public function update(Request $request){
        $data = $request->all();   
        Venda::findOrFail($request->id)->update($data);
        return redirect('/vendas')->with('msg', 'Venda editada com sucesso!');
    }
    public function dashboard(){ 
        $vendas = Venda::orderBy('id', 'desc')->paginate(12); 
        // :paginate(12)->orderBy('id');
        // $vendas = DB::table('vendas')->orderBy('id')->cursorPaginate(15);
        // $vendas->appends(['id','desc']); 
        return view('venda.vendas', ['vendas' => $vendas]); 
    }
    public function store(Request $request){
        $venda = new Venda;

        $venda->ov = $request->ov;
        $venda->compra = $request->compra;
        $venda->data = $request->data;
        $venda->local_id = $request->local;
        $venda->observacao = $request->observacao;
        $venda->sinal = $request->sinal;
        $venda->restante = $request->restante;
        $venda->total = $request->total;
        $venda->parcela = $request->parcela;
        $venda->forma = $request->forma;
        $venda->exame_id = $request->exame_id;
        $venda->pacient_id = $request->pacient_id;
        $venda->data_entrega = $request->data_entrega;
     //    image upload
     if($request->hasfile('image') && $request->file('image')->isValid()){
        
        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/vendas'), $imageName);

        $venda->image = $imageName;
    }else{$venda->image ="oculos.jpg";}        
        $user = auth()->user();
        $venda->user_id = $user->id;
        $venda->save(); 
        return redirect('/vendas')->with ('msg','Venda realizada com sucesso!');
     }
     public function destroy($id){
        $venda = Venda::findOrFail($id)->load('exa')->load('pac')->delete();   
        // Exame::where('pacient_id', $pacient->id)->first()->delete();
        // Pacient::findOrFail($id)->delete();
        return redirect('/vendas')->with('msg', 'Venda excluida com succeso!');
    }
    //  public function edit($id){
    //     $user = auth()->user();
    //     $venda = venda::findOrFail($id);
    //     $locals = Local::all();
    //     if($user->id != $venda->user_id){
    //         return redirect('/vendaes');
    //     }        
    //     return view('vendas.edit-venda', ['venda' => $venda, 'locals'=>$locals]);
    // }

}
