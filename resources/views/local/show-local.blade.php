@extends('layouts.main')
@section('title', 'Visualização de Local')
@section('content')

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Local</h4>           
              </div>
              <div class="card-body"> 
                 <div class="row p-3 justify-content-between">   
                 @if($local->data != null)
                 <div class="col-auto align-self-end">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{$local->data->format('Y-m-d')}}" disabled>  
                  </div> 
                 @endif 
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">local:</label>
                    <input type="text" class="form-control" name="local" id="local" value="{{$local->local}}" disabled>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Contato Principal:</label>
                  <input type="text" class="form-control" name="contato" id="contato" value="{{$local->contato}}" disabled>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{$local->endereco}}" disabled>                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">telefone Principal:</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" value="{{$local->telefone}}" disabled>                   
                  </div>                
              </div>
              
                <div class="row p-3 justify-content-center">
                    <label class="form-label fw-bold">Observação</label>
                     <textarea class="form-control" name="obs" id="obs" rows="3" disabled>{{$local->observacao}}</textarea>
                 </div>
                 <div class="row p-3 justify-content-center">
                    <a href="/local/edit/{{ $local->id }}" class="btn col-auto btn-warning">Editar</a>
                    <form action="/local/{{ $local->id }}" class='col-auto' method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                 </div>
            </div>
        </div>

@endsection