
@extends('layouts.main')
@section('title', 'Cadastro de Despesa')
@section('content')
        <div class="container p-4">
        <div class="card m-3">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Despesa</h4>           
              </div>
            <div class="card-body justify-content-center">       
              <form action="/despesa/update/{{$despesa->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="row p-3 justify-content-center">                                
                  <div class="col-auto">
                  <label class="form-label fw-bold">Data da despesa:</label>
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{ $despesa->data->format('Y-m-d') }}" required>  
                  </div>  
                </div>
                <div class="row p-3 justify-content-center">   
                  <div class="col-auto ">
                    <input type="file" name="image" id="image" class="form-control fw-bold">
                    <img src="/img/despesas/{{ $despesa->image }}" class="p-2 rounded mx-auto d-block" alt="{{ $despesa->nome }}">
                  </div>
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3">{{$despesa->descricao}}</textarea>
                  </div>                
                </div>
                <div class="row p-3 justify-content-center">    
                  <div class="col">
                      <span id="msgAlertaSituacao"></span>                      
                      <label for="validationCustom04" class="form-label fw-bold">Local:</label>
                      <select class="form-select" id="local_id" name="local_id" required>
                        @foreach($locals as $local)
                        @if($local->id == $despesa->local_id)
                        <option value="{{$local->id}}" selected>{{$local->local}}</option> 
                        @else
                        <option value="{{$local->id}}">{{$local->local}}</option> 
                        @endif
                        @endforeach                             
                      </select>   
                  </div>                   
                  <div class="col">
                    <span id="msgAlertaSituacao"></span>                      
                    <label for="validationCustom04" class="form-label fw-bold">Categoria:</label>
                    <select class="form-select" id="catdespesa_id" name="catdespesa_id" required>
                      @foreach($categorias as $categoria)
                      @if($categoria->id == $despesa->catdespesa_id)
                      <option value="{{$categoria->id}}" selected>{{$categoria->desc_cat_desp}}</option> 
                      @else
                      <option value="{{$categoria->id}}">{{$categoria->desc_cat_desp}}</option> 
                      @endif
                      @endforeach                             
                    </select>
                  </div>        
                </div>     
                <div class="row p-3 justify-content-center">                                
                    <div class="col"> 
                        <label class="form-label fw-bold">Pagamento:</label>
                        <select class="form-select" id="forma" name="forma" required> 
                        <option value="{{$despesa->forma}}">{{$despesa->forma}}</option>
                        <option value="Dinheiro">Dinheiro</option> 
                        <option value="Pix">Pix</option>
                        <option value="Cartão de credito">Cartão de crédito</option>
                        <option value="Cartão de debito">Cartão de debito</option> 
                        </select>
                      </div> 
                      <div class="col">
                        <label class="form-label fw-bold">Parcelas:</label>
                        <select class="form-select" id="parcela" name="parcela" required> 
                        <option value="{{$despesa->parcela}}">{{$despesa->parcela==1 ? 'Á Vista' : $despesa->parcela}}</option> 
                        <option value="1">Á Vista</option> 
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        </select>
                      </div>              
                </div>      
                  <div class="row p-3 justify-content-center">
                    <div class="col">
                    <label class="form-label fw-bold">Valor:</label>
                      <input type="number" class="form-control" name="valor" id="valor" value="{{$despesa->valor}}" placeholder="Valor" required>
                    </div>
                  </div>  
                  
                  <div class="row p-1 justify-content-center">
                      <input type="submit" class="btn btn-outline-warning btn-sm col-3" id="cad-despesa-btn" value="Editar" />
                  </div>             
              </form>
            </div>
        </div>
        </div>    

@endsection