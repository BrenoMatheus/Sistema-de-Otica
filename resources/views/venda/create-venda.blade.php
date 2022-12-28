@extends('exame.show-exame')
@section('title', 'Cliente')
@section('cliente')
<div class="card text-center fw-bold">
              <div class="card-header ">
                <h4 class="card-title  text-center fw-bold">Venda</h4>           
              </div>
              <div class="card-body">       
              <form action="/venda" method="POST" enctype="multipart/form-data">
                @csrf       
                <input type="hidden" name="pacient_id" id="pacient_id" value="{{$exame->pacient_id}}" /> 
                <input type="hidden" name="exame_id" id="exame_id" value="{{$exame->id}}" />     
                 <div class="row p-3 justify-content-between">   
                  <div class="col-auto ">
                    <input type="text" class="form-control fw-bold" placeholder="OV" name="ov" id="ov" required>                   
                  </div>   
                  <div class="col-auto">
                    <select class="form-select" id="local" name="local" required> 
                    <option value="">Local</option>
                      @foreach($locals as $local)
                      <option value="{{$local->id}}">{{$local->local}}</option> 
                      @endforeach                             
                    </select>
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
                        <span id="msgAlertaSituacao"></span>  
                              <label for="validationCustom04" class="form-label fw-bold">Produto:</label>
                              <select class="form-select" id="produto" name="opcao" required> 
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
              <input type="hidden" name="qnt_campo" id="qnt_campo" />             
              </div>
               <div class="row p-3 justify-content-center">                                
                          <div class="col"> 
                              <label for="validationCustom04" class="form-label fw-bold">Pagamento:</label>
                              <select class="form-select" id="forma" name="forma" required> 
                              <option value="Dinheiro">Dinheiro</option> 
                              <option value="Pix">Pix</option>
                              <option value="Cartão de credito">Cartão de crédito</option>
                              <option value="Cartão de debito">Cartão de debito</option> 
                              </select>
                            </div> 
                            <div class="col">
                              <label for="validationCustom04" class="form-label fw-bold">Parcelas:</label>
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
              <div class="row p-2 justify-content-end">
                  
                  <div class="col-auto">
                  <label class="form-label fw-bold">Entrega:</label>
                  </div> 
                  <div class="col-auto">
                    <input type="date" class="form-control fw-bold" placeholder="Data" name="data_entrega" id="data_entrega" required>                   
                  </div> 
                 </div>             
              <div class="row p-3 justify-content-center">
                  <div class="col">
                    <label class="form-label fw-bold">Total:</label>
                    <input type="number" step="0.010" class="form-control" name="total" id="total" >                   
                  </div> 
                  <div class="col">
                    <label class="form-label fw-bold">Sinal:</label>
                    <input type="number"  step="0.010"class="form-control" name="sinal" id="sinal" onkeyup="CALCULO()">                   
                  </div>
                  <div class="col">
                    <label class="form-label fw-bold">Restante:</label>
                    <input type="number" step="0.010" class="form-control" name="restante" id="restante" >                   
                  </div>                
              </div>   
              <div class="row p-3 justify-content-center">
                  <div class="col"> 
                  <h4><strong>Observação</strong></h4>
                  <textarea class="form-control" name="observacao" id="observacao" rows="3"></textarea>
                  </div>                
              </div>               
                 <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-paciente-btn" value="VENDER" />
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
              document.getElementById('venda' + idCampo).remove();
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
