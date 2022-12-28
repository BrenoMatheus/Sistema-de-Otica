@extends('layouts.main')
@section('title', 'Editando:' .$pacient->nome)
@section('content')

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Editando Paciente:{{$pacient->nome}}</h4>           
              </div>
              <div class="card-body">       
              <form action="/pacients/update/{{$pacient->id}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')          
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto ">
                    <input type="text" class="form-control fw-bold" placeholder="OS" name="os" id="os" value="{{$pacient->os}}" required>                   
                  </div>                 
                  <div class="col-auto ">
                    <input type="date" class="form-control fw-bold" name="data" id="data" value="{{ $pacient->data->format('Y-m-d') }}" required>  
                  </div>  
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{$pacient->nome}}" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Número:</label>
                  <input type="number" class="form-control" name="telefone" id="telefone" value="{{$pacient->telefone}}" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                  <div class="col">
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Local:</label>
                              <select class="form-select" id="local_id" name="local_id" required> 
                                @foreach($locals as $local)
                                @if($local->id == $pacient->local_id)
                                <option value="{{$local->id}}" selected>{{$local->local}}</option>
                                @else
                                <option value="{{$local->id}}">{{$local->local}}</option>
                                @endif 
                                @endforeach                             
                              </select>
                            </div> 
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{$pacient->endereco}}">                   
                  </div>                
              </div>
              
            <div class="row p-1 justify-content-center">
                 <div class="col-auto">
              <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="doencas[]" value="Catarata">
                  <label class="form-check-label fw-bold" for="inlineCheckbox1">Catarata</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="doencas[]" value="Diabetes">
                  <label class="form-check-label fw-bold" for="inlineCheckbox2">Diabetes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="doencas[]" value="Pressão alta">
                  <label class="form-check-label fw-bold" for="inlineCheckbox3">Pressão alta</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" name="doencas[]" value="Sem doenças">
                  <label class="form-check-label fw-bold" for="inlineCheckbox3">Sem doenças</label>
                </div>
                </div>
                </div> 
                <div class="row p-3 justify-content-center">
                    <label class="form-label fw-bold">Observação</label>
                     <textarea class="form-control" name="observacao" id="observacao" rows="3" >{{$pacient->observacao}}</textarea>
                 </div>
                 <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" value="Editar" />
             </div>
            </form>
            </div>
        </div>

@endsection