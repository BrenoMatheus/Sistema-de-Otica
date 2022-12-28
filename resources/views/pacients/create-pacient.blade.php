@extends('layouts.main')
@section('title', 'Cadastro de Paciente')
@section('content')
<!-- <div class="form-group">
            <label for="title">Image event:</label>
            <input type="file" class="form-control-file" id="image" name="image" >
        </div> -->

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Paciente</h4>           
              </div>
              <div class="card-body">       
              <form action="/pacients" method="POST" enctype="multipart/form-data">
                @csrf           
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto ">
                    <input type="text" class="form-control fw-bold" placeholder="OS" name="os" id="os" required>                   
                  </div>                 
                  <div class="col-auto align-self-end">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                  </div>  
              </div>
              <div class="row p-3 justify-content-between">   
                  <div class="col-auto ">
                    <input type="file" name="image" id="image" class="form-control">
                  </div>
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Número:</label>
                  <input type="number" class="form-control" name="telefone" id="telefone" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                  <div class="col">
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Local:</label>
                              <select class="form-select" id="local" name="local" required> 
                                @foreach($locals as $local)
                                <option value="{{$local->id}}">{{$local->local}}</option> 
                                @endforeach                             
                              </select>
                            </div> 
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" >                   
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
                     <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
                 </div>
                 <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-paciente-btn" value="Cadastrar" />
             </div>
            </form>
            </div>
        </div>

@endsection