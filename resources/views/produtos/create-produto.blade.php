@extends('layouts.main')
@section('title', 'Cadastro de Produto')
@section('content')
        <div class="container p-4">
        <div class="card m-3">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Compra</h4>           
              </div>
            <div class="card-body justify-content-center">       
              <form action="/produto" method="POST" enctype="multipart/form-data">
                  @csrf           
                <div class="row p-3 justify-content-center">                                
                  <div class="col-auto">
                  <label class="form-label fw-bold">Data da compra:</label>
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                  </div>  
                </div>
                <div class="row p-3 justify-content-center">   
                  <div class="col-auto ">
                    <input type="file" name="image" id="image" class="form-control">
                  </div>
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
                  </div>                
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col-auto">
                    <span id="msgAlertaSituacao"></span>                      
                    <label for="validationCustom04" class="form-label fw-bold">Categoria:</label>
                    <select class="form-select" id="categoria" name="categoria" required>
                      @foreach($categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->desc_categoria}}</option> 
                      @endforeach                             
                    </select>
                  </div>        
                </div>              
                  <div class="row p-1 justify-content-center">
                    <div class="col-2">
                      <input type="number" class="form-control" name="qtd" id="qtd" placeholder="QTD" required>
                    </div> 
                    <div class="col">
                      <input type="number" class="form-control" step="0.010" name="valor" id="valor"  placeholder="Valor" required>
                    </div> 
                  </div>  
                  <div class="row p-1 justify-content-center">
                      <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-produto-btn" value="Cadastrar" />
                  </div>             
              </form>
            </div>
        </div>
        </div>    

@endsection