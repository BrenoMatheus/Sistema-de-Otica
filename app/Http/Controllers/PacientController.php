<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Pacient;
use App\Models\Exame;
use App\Models\Venda;
use App\Models\Local;
use App\Models\User;

class PacientController extends Controller
{
   
    public function index(){
        return view('welcome');
    }

    public function show($id){
        $pacient = Pacient::findOrFail($id);
        $exame = Exame::where('pacient_id', $pacient->id)->first(); 
        // dd($exame) 
        $user = auth()->user();
        $disabled = '0';
        $hasUserJoined = false;
        if($exame != null){       
            $hasUserJoined = true;
        }

        return view('pacients.show-pacient',['exame' => $exame, 'pacient' => $pacient, 'hasUserJoined' => $hasUserJoined,'disabled' => $disabled]);
    }

    public function store(Request $request){
        $pacient = new Pacient;
        
        $pacient->os = $request->os;
        $pacient->nome = $request->nome;
        $pacient->data = $request->data;
        $pacient->telefone = $request->telefone;
        $pacient->local_id = $request->local;
        $pacient->endereco = $request->endereco;
        $pacient->observacao = $request->obs;
        $pacient->doencas = $request->doencas;
     //    image upload
     if($request->hasfile('image') && $request->file('image')->isValid()){
        
        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/pacients'), $imageName);

        $pacient->image = $imageName;
    }else{$pacient->image ="pac.jpg";}
        
        $user = auth()->user();
        $pacient->user_id = $user->id;
        $pacient->save(); 
        return redirect('/pacientes')->with ('msg','paciente criado com sucesso!');
     }
     public function edit($id){
        $user = auth()->user();
        $pacient = Pacient::findOrFail($id);
        $locals = Local::all();      
        return view('pacients.edit-pacient', ['pacient' => $pacient, 'locals'=>$locals]);
    }

    public function update(Request $request){
        $data = $request->all();
        if($request->hasfile('image') && $request->file('image')->isValid()){
        
            $requestImage = $request->image;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/pacients'), $imageName);
    
            $data['image'] = $imageName;
        }
        
        Pacient::findOrFail($request->id)->update($data);
        return redirect('/pacientes')->with('msg', 'Cadastro do paciente editado com sucesso!');
    }

     public function create(){
        $locals = Local::all();
        return view('pacients.create-pacient', ['locals'=>$locals]);
    }   
    public function dashboard(){
        $user = auth()->user();
        $pacients = DB::table('pacients')
        ->join('locals', 'pacients.local_id', '=', 'locals.id')
        ->orderBy('id', 'DESC')
        ->select('locals.local','pacients.*')
        ->paginate(12);
        // dd($pacients);
        $exames = Exame::all();
        $pacientsAsParticipant = $user->pacientsAsParticipant;
        return view('pacients.pacients', ['exames' => $exames,'pacients' => $pacients, 'pacientsAsParticipant' => $pacientsAsParticipant]);
    }
    public function pesquisar(Request $request)
    {
      $search = request('pesquisar');
      $dados = [];
      $dados['url'] = url('/');
      $dados['posts'] = DB::table('pacients')
        ->join('locals', 'pacients.local_id', '=', 'locals.id')
        ->select('locals.local','pacients.*')
        ->where('nome', 'like', '%'.$search.'%')
        ->orWhere('pacients.id', 'like', '%'.$search.'%')
        ->orWhere('os', 'like', '%'.$search.'%')
        ->get();
      return response()->json($dados);
    }
    public function destroy($id){
        $exame =  Exame::where('pacient_id', $id)->first();
        if ($exame != null) {
            Exame::findOrFail('pacient_id', $id)->first()->delete();
        }
        $venda = Venda::where('pacient_id', $id)->first();
        if ($venda != null) {
            Venda::where('pacient_id', $id)->first()->delete();
        }
        Pacient::findOrFail($id)->delete();
        return redirect('/pacientes')->with('msg', 'Paciente excluido com succeso!');
    }
}
