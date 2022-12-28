@extends('layouts.main')
@section('title', 'Editando: '.$produto->descricao)
@section('content')
        <div class="container p-4">
        <div class="card m-3">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Editando: {{$produto->descricao}}</h4>           
              </div>
            <div class="card-body justify-content-center">       
            <form action="/produto/update/{{$produto->id}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')     
                <div class="row p-3 justify-content-center">                                
                  <div class="col-auto">
                  <label class="form-label fw-bold">Data da compra:</label>
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{ $produto->data->format('Y-m-d') }}" required>  
                  </div>  
                </div>
                <div class="row p-3 justify-content-center"> 
                      
                  <div class="col-auto ">
                    <input type="file" name="image" id="image" class="form-control-file">
                  </div>
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3">{{$produto->descricao}}</textarea>
                  </div>                
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col-auto">
                    <span id="msgAlertaSituacao"></span>                      
                    <label for="validationCustom04" class="form-label fw-bold">Categoria:</label>
                    <select class="form-select" id="categoria_id" name="categoria_id" required>
                      @foreach($categorias as $categoria)
                      @if($categoria->id == $produto->categoria_id)
                      <option value="{{$categoria->id}}" selected>{{$categoria->desc_categoria}}</option> 
                      @else
                      <option value="{{$categoria->id}}">{{$categoria->desc_categoria}}</option> 
                      @endif
                      @endforeach                             
                    </select>
                  </div>        
                </div>              
                  <div class="row p-1 justify-content-center">
                    <div class="col-2">
                      <input type="number" class="form-control" name="qtd" id="qtd" placeholder="QTD" value="{{$produto->qtd}}" required>
                    </div> 
                    <div class="col">
                      <input type="number" class="form-control" name="valor" id="valor"  placeholder="Valor" value="{{$produto->valor}}"required>
                    </div> 
                  </div>  
                  <div class="row p-1 justify-content-center">
                      <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-produto-btn" value="Editar" />
                  </div>             
              </form>
            </div>
        </div>
        </div>    

@endsection