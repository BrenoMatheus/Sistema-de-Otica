@extends('layouts.main')
@section('title', 'Edição de Local')
@section('content')

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Local</h4>           
              </div>
              <form action="/local/update/{{$local->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
              <div class="card-body"> 
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto align-self-end">
                  @if($local->data != null)
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{$local->data->format('Y-m-d')}}" disabled> 
                    @else
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                 @endif 
                  </div>  
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">local:</label>
                    <input type="text" class="form-control" name="local" id="local" value="{{$local->local}}" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Contato Principal:</label>
                  <input type="text" class="form-control" name="contato" id="contato" value="{{$local->contato}}" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{$local->endereco}}" >                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">telefone Principal:</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" value="{{$local->telefone}}" required>                   
                  </div>                
              </div>
              
                <div class="row p-3 justify-content-center">
                    <label class="form-label fw-bold">Observação</label>
                     <textarea class="form-control" name="observacao" id="observacao" rows="3" >{{$local->observacao}}</textarea>
                 </div>
                 <div class="row p-3 justify-content-center">
                        <button type="submit" class="btn btn-warning">Editar</button>
                 </div>
                 </form>
            </div>
        </div>

@endsection