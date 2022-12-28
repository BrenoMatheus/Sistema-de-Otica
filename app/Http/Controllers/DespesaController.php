<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\catdespesa;
use App\Models\Local;

class DespesaController extends Controller
{

    public function create(){
        $categorias = catDespesa::all();
        $locals = Local::all();
        return view('despesas.create-despesa', ['categorias' => $categorias, 'locals' => $locals]);
    }
   
    public function show($id){
        $despesa = Despesa::findOrFail($id);
        return view('despesas.show-despesa',['despesa' => $despesa]);
    }
    public function store(Request $request){
        $despesa = new Despesa;
         
        $despesa->descricao = $request->descricao;
        $despesa->parcela = $request->parcela;
        $despesa->forma = $request->forma;
        $despesa->local_id = $request->local;
        $despesa->data = $request->data;
        $despesa->valor = $request->valor;
        $despesa->catdespesa_id = $request->categoria;
     //    image upload
     if($request->hasfile('image') && $request->file('image')->isValid()){
        
        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/despesas'), $imageName);

        $despesa->image = $imageName;
    }else{$despesa->image ="despesa.png";}
        
        $despesa->save(); 
        return redirect('/despesas')->with ('msg','despesa adicionado com sucesso!');
     }
    public function dashboard(){
        $categorias = DB::table('despesas')
        ->join('catdespesas','despesas.catdespesa_id','=', 'catdespesas.id')
        ->groupBy('despesas.catdespesa_id')
        ->select(DB::raw('sum(despesas.valor) as soma, catdespesas.desc_cat_desp as categoria, catdespesas.id'))
        ->get();
        $despesas = Despesa::all();
        return view('despesas.despesas', ['despesas' => $despesas, 'categorias' => $categorias]);
    }
    public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['local'] = Local::all();
      $dados['categoria'] = DB::table('despesas')
      ->join('catdespesas','despesas.catdespesa_id','=', 'catdespesas.id')
      ->groupBy('despesas.catdespesa_id')
      ->select(DB::raw('sum(despesas.valor) as soma, catdespesas.desc_cat_desp as categoria, catdespesas.id'))
      ->where('descricao', 'like', '%'.$search.'%')
      ->orWhere('catdespesas.desc_cat_desp', 'like', '%'.$search.'%')
      ->get();

      $dados['posts'] = DB::table('despesas')
        ->join('locals', 'despesas.local_id', '=', 'locals.id')
        ->join('catdespesas', 'despesas.catdespesa_id', '=', 'catdespesas.id')
        ->select('locals.local','despesas.*')
        ->where('descricao', 'like', '%'.$search.'%')
        ->orWhere('catdespesas.desc_cat_desp', 'like', '%'.$search.'%')
        ->get();
      return response()->json($dados);
    }
    public function destroy($id){
        despesa::findOrFail($id)->delete();
        return redirect('/despesas')->with('msg', 'despesa excluído com sucesso!');
    }
    public function edit($id){
        $despesa = despesa::findOrFail($id);
        $categorias = CatDespesa::all();
        $locals = Local::all();
        return view('despesas.edit-despesa', ['despesa' => $despesa, 'categorias' => $categorias ,'locals' => $locals]);

    }
    public function update(Request $request){
        $data = $request->all();
        if($request->hasfile('image') && $request->file('image')->isValid()){
        
            $requestImage = $request->image;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/events'), $imageName);
    
            $data['image'] = $imageName;
        }
        // $data['cat_despesa_id'] = $request->categoria;
        // $data->cat_despesa_id = $request->categoria;
        Despesa::findOrFail($request->id)->update($data);
        return redirect('/despesas')->with('msg', 'despesa alterado com sucesso!');
    }
}
