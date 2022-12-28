@extends($extend)
@section('title', 'Venda:' .$pacient->nome)
@section($section)

<div class="card text-center fw-bold">
              <div class="card-header ">
                <h4 class="card-title  text-center fw-bold">Venda</h4>           
              </div>
              <div class="card-body">
                <div class="row justify-content-center">
                <div class="col-auto ">
              @if($pacient->image == null)
              <img src="/img/vendas/oculos.jpg" class="" alt="{{ $pacient->nome }}">
              @else
              <img src="/img/vendas/{{ $pacient->image }}" class="" alt="{{ $pacient->nome }}">
              @endif 
              </div> 
              </div>          
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto ">
                    <input type="text" class="form-control fw-bold" placeholder="OV" name="ov" id="ov" value="{{$venda->ov}}" disabled>                   
                  </div>                 
                  <div class="col-auto align-self-end">
                  <input type="date" class="form-control fw-bold" placeholder="Data" value="{{ $venda->data->format('Y-m-d') }}" disabled> 
                  </div>  
              </div>              
              <div class="row p-3 justify-content-center">                  
                <div class="col">
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Produtos:</label>
                               @if($produtos != null )
                               @foreach($produtos as $produto)                                
                                <div class="col-auto m-1 btn btn-outline-primary" id="venda'+controleCampo+'"> 
                                <option value="{{$produto->id}}">{{$produto->descricao}}</option> 
                                </div>
                                @endforeach
                               @endif                    
                </div>                  
              </div>   
               <div class="row p-3 justify-content-center">                                
                          <div class="col"> 
                              <label for="validationCustom04" class="form-label fw-bold">Pagamento:</label>
                              <input type="text" class="form-control fw-bold" value="{{$venda->forma}}" disabled> 
                            </div> 
                            <div class="col">
                              <label for="validationCustom04" class="form-label fw-bold">Parcelas:</label>
                              <input type="text" class="form-control fw-bold" value="{{$venda->parcela}}" disabled>
                            </div>              
              </div>  
              <div class="row p-2 justify-content-end">
                  <div class="col-auto">
                  <label class="form-label fw-bold">Entrega:</label>
                  </div> 
                  @if($venda->data_entrega != null)
                  <div class="col-auto">
                    <input type="date" class="form-control fw-bold" placeholder="Data" value="{{ $venda->data_entrega->format('Y-m-d') }}" disabled>                   
                  </div> 
                  @endif
                 </div>             
              <div class="row p-3 justify-content-center">
                  <div class="col">
                    <label class="form-label fw-bold">Total:</label>
                    <input type="number" class="form-control"  value="{{$venda->total}}" disabled>                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">Sinal:</label>
                    <input type="number" class="form-control"  value="{{$venda->sinal}}" disabled>                   
                  </div>
                  <div class="col">
                    <label class="form-label fw-bold">Restante:</label>
                    <input type="number" class="form-control" value="{{$venda->restante}}" disabled>                   
                  </div>                
              </div>   
              <div class="row p-3 justify-content-center">
                  <div class="col"> 
                  <h4><strong>Observação</strong></h4>
                  <textarea class="form-control"  rows="3" disabled>{{$venda->observacao}}</textarea>
                  </div>                
              </div>    
                </div>
                <div class="row p-1 justify-content-center">
                <div class="col-auto">
                    <a href="/venda/edit/{{ $venda->id }}" class="btn btn-warning col">Editar</a> 
                </div>
                <form action="/venda/{{ $venda->id }}" class="col-auto" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
             </div>
        </div>
                      
@endsection
