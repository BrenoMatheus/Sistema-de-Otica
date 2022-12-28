@extends('layouts.main')
@section('title', 'Cadastro de Local')
@section('content')

<div class="container p-4 ">
        <div class="card m-5">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Local</h4>           
              </div>
              <div class="card-body">       
              <form action="/local" method="POST" enctype="multipart/form-data">
                @csrf           
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto align-self-end">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                  </div>  
              </div>
              <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">local:</label>
                    <input type="text" class="form-control" name="local" id="local" required>
                  </div>  
                  <div class="col">
                  <label for="validationCustom03" class="form-label fw-bold">Contato Principal:</label>
                  <input type="text" class="form-control" name="contato" id="contato" required>
                </div>                 
              </div>
               <div class="row p-3 justify-content-center">                  
                   <div class="col">
                    <label class="form-label fw-bold">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" id="endereco" >                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">telefone Principal:</label>
                    <input type="number" class="form-control" name="telefone" id="telefone" >                   
                  </div>                
              </div>
              
                <div class="row p-3 justify-content-center">
                    <label class="form-label fw-bold">Observação</label>
                     <textarea class="form-control" name="obs" id="obs" rows="3"></textarea>
                 </div>
                 <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" value="Cadastrar" />
             </div>
            </form>
            </div>
        </div>

@endsection