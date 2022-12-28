@extends('layouts.main')
@section('title', 'Cadastro de Despesa')
@section('content')
        <div class="container p-4">
        <div class="card m-3">     
            <div class="card-header">
                <h4 class="card-title text-center fw-bold">Despesa</h4>           
              </div>
            <div class="card-body justify-content-center">       
              <form action="/despesa" method="POST" enctype="multipart/form-data">
                  @csrf           
                <div class="row p-3 justify-content-center">                                
                  <div class="col-auto">
                  <label class="form-label fw-bold">Data da despesa:</label>
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
                  </div>  
                </div>
                <div class="row p-3 justify-content-center">   
                  <div class="col-auto ">
                    <input type="file" name="image" id="image" class="form-control fw-bold">
                  </div>
                </div>
                <div class="row p-3 justify-content-center">                  
                  <div class="col">
                    <label class="form-label fw-bold">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="3"></textarea>
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
                    <span id="msgAlertaSituacao"></span>                      
                    <label for="validationCustom04" class="form-label fw-bold">Categoria:</label>
                    <select class="form-select" id="categoria" name="categoria" required>
                      @foreach($categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->desc_cat_desp}}</option> 
                      @endforeach                             
                    </select>
                  </div>        
                </div>     
                <div class="row p-3 justify-content-center">                                
                    <div class="col"> 
                        <label class="form-label fw-bold">Pagamento:</label>
                        <select class="form-select" id="forma" name="forma" required> 
                        <option value="Dinheiro">Dinheiro</option> 
                        <option value="Pix">Pix</option>
                        <option value="Cartão de credito">Cartão de crédito</option>
                        <option value="Cartão de debito">Cartão de debito</option> 
                        </select>
                      </div> 
                      <div class="col">
                        <label class="form-label fw-bold">Parcelas:</label>
                        <select class="form-select" id="parcela" name="parcela" required> 
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