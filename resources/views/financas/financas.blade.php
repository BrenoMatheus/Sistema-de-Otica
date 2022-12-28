@extends('layouts.main')
@section('title', 'Finanças')
@section('content')
        <!-- Charp -->
        <script src="/js/charts.js"></script>
       <div class="row p-3">
    <div class="card">
      <nav  class="p-2">
        <div class="nav justify-content-center nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-grafic-tab" data-bs-toggle="tab" data-bs-target="#nav-grafic" type="button" role="tab" aria-controls="nav-grafic" aria-selected="true">Graficos</button>
          <button class="nav-link" id="nav-table-tab" data-bs-toggle="tab" data-bs-target="#nav-table" type="button" role="tab" aria-controls="nav-table" aria-selected="false">Tabelas</button>
          <!-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button> -->
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
      <!-- Graficos -->
      <div class="tab-pane fade show active bg-gradient bg-dark text-light" id="nav-grafic" role="tabpanel" aria-labelledby="nav-grafic-tab" tabindex="0">
        <div class="col p-4">
          <span id="msgAlertaSituacao"></span>  
                <label for="validationCustom04" class="form-label fw-bold">Local:</label>
                <select class="form-select" id="local" name="local" required> 
                <option value="">Local</option>
                  @foreach($locals as $local)
                  <option value="{{$local->id}}">{{$local->local}}</option> 
                  @endforeach                             
                </select>
        </div>
        <div class="text-center" id="qtde">
          </div>
         
          <div id="textos" class="col">
          </div>
        <div class="row p-3" id="field-chart">
          
        </div>
       
      </div>
      <!-- fimGraficos -->
      <div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab" tabindex="0">
          <!-- Tabelas -->
          <div class="row p-3 ">
            <div class="col-md-12 input-group">
                <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon"></span>
                <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
            </div>
            <div class="col-12 text-center pt-2">
            <p class="fst-italic" id="info" ></p>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">Local</th>
              <th scope="col">Sinal</th>
              <th scope="col">Falta</th>
              <th scope="col">Total</th>
              <th scope="col">Despesa</th>
            </tr>
          </thead>
          <tbody id ='display'> </tbody>
          <tbody id ='all'>
          @php $vs = 0; @endphp
          @php $vr = 0; @endphp
          @php $vt = 0; @endphp
          @php $d = 0; @endphp
          @foreach($locals as $local)
          <tr>
          <th scope="col">{{$local->local}}</th>
          @forelse($local->venda as $venda)
          @php $vs = $vs + $venda->sinal; @endphp
          @php $vr = $vr + $venda->restante; @endphp
          @php $vt = $vt + $venda->total; @endphp
          @empty          
          @php $vs = 0; @endphp
          @php $vr = 0; @endphp
          @php $vt = 0; @endphp
          @endforelse
          <th scope="col">{{number_format($vs,2,',','.')}}</th>
          <th scope="col">{{number_format($vr,2,',','.')}}</th>
          <th scope="col">{{number_format($vt,2,',','.')}}</th>
          @forelse($local->despesa as $despesa)
          @php $d = $despesa->valor + $d; @endphp
          @empty          
          @php $d = 0; @endphp
          @endforelse
          <th scope="col">{{number_format($d,2,',','.')}}</th>
          @endforeach

          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>

 
        <script type="text/javascript">
          // pesquisa grafico
          $('#local').on("change",function(){
               var html = '<div class="spinner-border text-primary" role="status">';
               html += '<span class="visually-hidden"></span>';
               html += '</div>';
              $('#qtde').html(html);
              $.get("{!! url('pesq_local') !!}", {pesquisar:$('#local').val()},function(data){
                $('#qtde').html(" ");
                  var desp = 0;
                  var tot = 0;
                  var rest = 0;
                  var sin = 0;
                for (var i = 0; i < data.local.length; i++) {
                  for (var f = 0; f < data.venda.length; f++) {
                        if(data.venda[f].tot != null){tot = data.venda[f].tot;}
                        if(data.venda[f].sin != null){ sin = data.venda[f].sin;}
                        if(data.venda[f].rest != null){rest = data.venda[f].rest;}
                  }
                  for (var g = 0; g < data.despesa.length; g++) {
                     if( data.despesa[g].desp != null){desp = data.despesa[g].desp;}
                  }
                    chart(desp,sin,rest,tot,data.local[i].local);
                }
              });
          });
        </script>

         <script>
          // Grafico
         function chart(a,b,c,d,n){
          document.getElementById("field-chart").innerHTML = '&nbsp;';
          document.getElementById("field-chart").innerHTML = '<canvas id="myChart" ></canvas>';
          const ctx = document.getElementById('myChart');
          const ChartPie = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ["Despesa", "Sinal", "Restante", "Ganho Bruto"],
            datasets: [ {
            data: [a, b, c, d],
            backgroundColor: [
            "#FF0000",
            "#4BC0C0",
            "#FFCE56",
            "#006400",
            ]
        }
            ]
          },
          options: {
            responsive:true,
            plugins: {
              legend: {
                display: true,
                labels: {
                    color: '#FFFFFF'
                }},
            title: {
                display: true,
                text: n,
                color: '#FFFFFF',
                padding: 10,
                font:{size:20}
            }
        }
          }
        });
         }
        </script>
        <script type="text/javascript">

  $('#pesquisar').keyup(function(){
    if($('#pesquisar').val().length >= 1){
        var load = '';
        load +='<div class="spinner-grow text-info" role="status">';
        load +='<span class="visually-hidden">Loading...</span>';
        load +='</div>';
      $('#info').html(load);
      $.get("{!! url('pesquisa-financa') !!}", {pesquisar:$('#pesquisar').val()},function(data){
      var pesq = "<div class='row m-0 p-0 justify-content-between'>";
          pesq += "<div class='col-4'>"+data.posts.length.toString()+" Resultados</div>";
          pesq += "<div class='col-4'><a href='/vendas' class='fw-bold col-md-3 offset-md-3 text-light'>Voltar</a></div></div>"
	  $('#info').html(pesq);
      $('#all').remove();
        
        var html = "";
        for (var g = 0; g < data.local.length; g++) {
          var tv = '';
          var td = '';
          html += '<tr><th scope="col">'+data.local[g].local+'</th>';
        for (var i = 0; i < data.posts.length; i++) {
          if(data.local[g].local == data.posts[i].local ){
          html += '<th scope="col">'+data.posts[i].sin.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</th>';
          html += '<th scope="col">'+data.posts[i].rest.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</th>';
          html += '<th scope="col">'+data.posts[i].tot.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</th>';
          tv = '1';
          }
        }
         if( tv != '1'){
          html += '<th scope="col">0,00</th><th scope="col">0,00</th><th scope="col">0,00</th>';
           }
          for (var f = 0; f < data.despesa.length; f++) {
              if(data.local[g].local == data.despesa[f].local ){
           html += '<th scope="col">'+data.despesa[f].desp.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</th>';
           td = '1';
           } 
         }
         if( td != '1'){
          html += '<th scope="col">0,00</th>';
           }
        html += '</tr>';
        }
        if(data.posts.length != 0){
          html += '<div class="col-md-12 p-2 bg-gradient bg-secondary"><a href="/financas" class="fw-bold"> Voltar!</a></div>';
          $("#display").html(html);
        }else{
          $('#info').html("Nenhum Exame foi encontrado! - <a href='/financas' class='fw-bold text-dark'> Ver todos!</a>");
          $("#display").html("");
        }
      });
    }
  });
</script>

@endsection