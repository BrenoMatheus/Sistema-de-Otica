<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pacient;
use App\Models\Exame;
use App\Models\User;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\Despesa;
use App\Models\Local;


class FinancaController extends Controller
{
    public function dashboard(){    
        $locals = Local::all()->load('despesa')->load('venda');
        return view('financas.financas', ['locals' => $locals]);
    }

    public function p_local()
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      if($search) {
        $dados['venda'] = DB::table('locals')
        ->join('vendas', 'locals.id', '=', 'vendas.local_id')
        ->groupBy( 'locals.local')
        ->select(DB::raw('locals.local, sum(vendas.sinal) as sin, sum(vendas.restante) as rest, sum(vendas.total) as tot'))
        ->where('locals.id', '=', $search)
        ->get();

        $dados['despesa'] = DB::table('locals')
        ->join('despesas', 'locals.id', '=', 'despesas.local_id')
        ->groupBy('locals.local')
        ->select(DB::raw('locals.local, sum(despesas.valor) as desp'))
        ->where('locals.id', '=', $search)
        ->get();
        $dados['local'] = DB::table('locals')
        ->select('locals.*')
        ->where('locals.id', '=', $search)
        ->get();
        }else{
        //  $dados['posts'] = Local::all();
        }
      
      return response()->json($dados);
    }
    public function pesquisar()
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
        $dados['posts'] = DB::table('locals')
        ->join('vendas', 'locals.id', '=', 'vendas.local_id')
        ->groupBy( 'locals.local')
        ->select(DB::raw('locals.local, sum(vendas.sinal) as sin, sum(vendas.restante) as rest, sum(vendas.total) as tot'))
        ->where('locals.local', 'like', '%'.$search.'%')
        ->get();

        $dados['despesa'] = DB::table('locals')
        ->join('despesas', 'locals.id', '=', 'despesas.local_id')
        ->groupBy('locals.local')
        ->select(DB::raw('locals.local, sum(despesas.valor) as desp'))
        ->where('locals.local', 'like', '%'.$search.'%')
        ->get();
        $dados['local'] = DB::table('locals')
        ->select('locals.*')
        ->where('locals.local', 'like', '%'.$search.'%')
        ->get();
        
      
      return response()->json($dados);
    }

}
