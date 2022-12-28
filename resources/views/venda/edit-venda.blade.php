@extends($extend)
@section('title', 'Venda:' .$pacient->nome)
@section($section)

<form action="/venda/update/{{$venda->id}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT') 
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
                    <input type="text" class="form-control fw-bold" placeholder="OV" name="ov" id="ov" value="{{$venda->ov}}" required>                   
                  </div>                 
                  <div class="col-auto align-self-end">
                  <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{$venda->data->format('Y-m-d')}}" required> 
                  </div>  
              </div>              
              <div class="row p-3 justify-content-center">                   
                <div class="col">
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Produto:</label>
                              <select class="form-select" id="produto" required> 
                                @foreach($produtos as $produto)
                                <option value="{{$produto->id}}">{{$produto->descricao}}</option> 
                                @endforeach  
                              </select>                              
                </div>  
                <div class="col-auto pt-4">
                <a  class="btn btn-success mt-2" onclick="add()" id="add"><img src="/img/icons/add-outline.svg" class="icon" ></a>
                </div>                 
              </div>  
              <div class="row p-3 "id="comp"> 
              <input type="hidden" id="qnt_campo" />             
              </div>               
                @if($venda->compra != null)
                  @php $t = 20; @endphp
                  {{$venda->forma}}
                  @foreach($venda->compra as $produto)
                  @foreach($produtos as $produto)
                    @php $t = $t+1; @endphp       
                    <div class="col">                         
                    <div class="col-auto m-1 btn btn-outline-warning" id="venda{{$t}}"> 
                    <a onclick="deletar({{$t}})">
                    <option value="">{{$produto->descricao}}</option> 
                    </a>
                    <input type="hidden" value="{{$produto->id}}" name="compra[]">
                    </div>
                    </div>  
                    @endforeach
                    @endforeach
                @endif
              </div>   
              <div class="row p-3 justify-content-center">                                
                          <div class="col"> 
                              <label for="validationCustom04" class="form-label fw-bold">Pagamento:</label>
                              <select class="form-select" id="forma" name="forma"  required> 
                              <option value="{{$venda->forma}}">{{$venda->forma}}</option> 
                              <option value="Dinheiro">Dinheiro</option> 
                              <option value="Pix">Pix</option>
                              <option value="Cartão de credito">Cartão de crédito</option>
                              <option value="Cartão de debito">Cartão de debito</option> 
                              </select>
                            </div> 
                            <div class="col">
                              <label for="validationCustom04" class="form-label fw-bold">Parcelas:</label>
                              <select class="form-select" id="parcela" name="parcela" value="{{$venda->forma}}" required> 
                              <option value="{{$venda->parcela}}">{{$venda->parcela==1 ? 'Á Vista' : $venda->parcela}}</option> 
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
              <div class="row p-2 justify-content-end">
                  <div class="col-auto">
                  <label class="form-label fw-bold">Entrega:</label>
                  </div> 
                  @if($venda->data_entrega != null)
                  <div class="col-auto">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data_entrega" id="data_entrega" value="{{ $venda->data_entrega->format('Y-m-d') }}" required>                   
                  </div> 
                  @endif
                 </div>             
              <div class="row p-3 justify-content-center">
                  <div class="col">
                    <label class="form-label fw-bold">Total:</label>
                    <input type="number" class="form-control" name="total" id="total"  value="{{$venda->total}}" onkeyup="CALCULO()" required>                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">Sinal:</label>
                    <input type="number" class="form-control" name="sinal" id="sinal"  value="{{$venda->sinal}}" onkeyup="CALCULO()" required>                   
                  </div>
                  <div class="col">
                    <label class="form-label fw-bold">Restante:</label>
                    <input type="number" class="form-control"name="restante" id="restante"  value="{{$venda->restante}}" required>                   
                  </div>                
              </div>   
              <div class="row p-3 justify-content-center">
                  <div class="col"> 
                  <h4><strong>Observação</strong></h4>
                  <textarea class="form-control"  rows="3" required>{{$venda->observacao}}</textarea>
                  </div>                
              </div>    
                </div>
                <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-warning btn-sm col-3" value="Editar" />
                 </div>
        </div>
    </form>
    <script type="text/javascript">
            
            var controleCampo = 1;
            var calculo = 0;
            function add() {
              var select = document.getElementById('produto');
              var option = select.options[select.selectedIndex];
              var text = option.text;
              var value = option.value;
                controleCampo++;
                document.getElementById('comp').innerHTML+='<div class="col-auto m-1 btn btn-outline-primary" id="venda'+controleCampo+'"><a onclick="deletar(' + controleCampo + ')" ><option >'+text+'</option></a> <input type="hidden" value="'+value+'" name="compra[]"/></div>';
                document.getElementById("qnt_campo").value = controleCampo;
            }
  
            function deletar(idCampo){
                document.getElementById('venda'+idCampo).remove();
            }
            function CALCULO(){
              sinal = document.getElementById('sinal').value;
              total = document.getElementById('total').value;
              calculo = (total-sinal);
              document.getElementById("restante").value = calculo;
              // System.out.println(calculo);
            }
              </script>  
                  
@endsection
