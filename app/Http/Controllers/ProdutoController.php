<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    public function create(){
        $categorias = Categoria::all();
        return view('produtos.create-produto', ['categorias' => $categorias]);
    }
   
    public function show($id){
        $produto = Produto::findOrFail($id)->load('categoria');
        // dd($produto);
        $categoria = Categoria::where('id', $produto->categoria_id)->first();
        return view('produtos.show-produto',['produto' => $produto, 'categoria' => $categoria]);
    }
    public function store(Request $request){
        $produto = new Produto;

        $produto->descricao = $request->descricao;
        $produto->qtd = $request->qtd;
        $produto->data = $request->data;
        $produto->valor = $request->valor;
        $produto->categoria_id = $request->categoria;
     //    image upload
     if($request->hasfile('image') && $request->file('image')->isValid()){
        
        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/produtos'), $imageName);

        $produto->image = $imageName;
    }else{$produto->image ="produto.jpg";}
        
        $produto->save(); 
        return redirect('/produtos')->with ('msg','produto adicionado com sucesso!');
     }
    public function dashboard(){
        $user = auth()->user();
        $produtos = Produto::all();
        $categorias = Categoria::all();
        return view('produtos.produtos', ['produtos' => $produtos, 'categorias' => $categorias]);
    }
    public function destroy($id){
        Produto::findOrFail($id)->delete();
        return redirect('/produtos')->with('msg', 'Produto excluído com sucesso!');
    }
    public function edit($id){
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit-produto', ['produto' => $produto, 'categorias' => $categorias]);

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
        Produto::findOrFail($request->id)->update($data);
        return redirect('/produtos')->with('msg', 'Produto alterado com sucesso!');
    }
}
