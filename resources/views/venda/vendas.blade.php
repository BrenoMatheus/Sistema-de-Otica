@extends('layouts.main')
@section('title', 'vendas')
@section('content')

<div class="container text-center pb-2">
    <h1 class="p-2">Vendas</h1>
    <div class="row p-3 mb-4 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon"></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
    <div class="row row-cols-2 row-cols-md-3 p-2 g-4" id='textos'>

    </div>
    <div class="row row-cols-2 row-cols-md-3 p-2 g-4" id="all">
        @foreach($vendas as $venda)
          <div class="col-4">
              <div class="card text-center border-secondary">
                  <!-- <img src="/img/pac.jpg" class="card-img-top" alt="..."> -->
                  <div class="card-body fw-bold">
                  <p>OS: {{ $venda->pac->os}}</p>
                  <p>Nome: {{ $venda->pac->nome}}</p>
                  <p>Data: {{ date('d/m/y', strtotime($venda->data))}}</p>
                  <p>Entrega: {{ date('d/m/y', strtotime($venda->data_entrega))}}</p>
                  <p>Local: {{ $venda->local->local}}</p>         
                  <p>Total: {{ number_format($venda->total,2,',','.')}}</p>
                  <a href="/venda/{{ $venda->id }}" class="btn btn-outline-info w-100">Saber mais</a>
                  <a href="/venda/edit/{{ $venda->id }}" class="btn btn-outline-warning w-100">Editar</a>
                  <form action="/venda/{{ $venda->id }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-outline-danger w-100">Deletar</button>
                  </form>
                  </div>
              </div>
          </div>
      @endforeach  
    </div>
    <div class="row p-3 justify-content-center" id="all">
        <div class="col-auto ">
        {{ $vendas->links() }}
        </div> 
    </div>
</div>
<script type="text/javascript">

  $('#pesquisar').keyup(function(){
    if($('#pesquisar').val().length >= 1){
        var load = '';
        load +='<div class="spinner-grow text-info" role="status">';
        load +='<span class="visually-hidden">Loading...</span>';
        load +='</div>';
      $('#qtde').html(load);
      $.get("{!! url('pesquisa-venda') !!}", {pesquisar:$('#pesquisar').val()},function(data){
      var pesq = "<div class='row m-0 p-0 justify-content-between'>";
          pesq += "<div class='col-4'>"+data.posts.length.toString()+" Resultados</div>";
          pesq += "<div class='col-4'><a href='/vendas' class='fw-bold col-md-3 offset-md-3 text-light'>Voltar</a></div></div>"
	  $('#qtde').html(pesq);
      $('#all').remove();
     
        var html = "";
        for (var i = 0; i < data.posts.length; i++) {
          var dt = '';
            if(data.posts[i].data_entrega != null){
            dt = data.posts[i].data_entrega.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
            }else{dt = 'S/ Data';}
            html += '<div class="col-4">';
            html += '<div class="card text-center border-secondary">';
            html += '<div class="card-body fw-bold">';
            html += '<p>OS: '+data.posts[i].os+'</p>';
            html += '<p>Nome: '+data.posts[i].nome+'</p>';
            html += '<p>Data: '+data.posts[i].data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</p>';
            html += '<p>Entrega: '+dt+'</p>';
            html += '<p>Local: '+data.posts[i].local+'</p>';         
            html += '<p>Total: '+data.posts[i].total.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</p>';
            html += '<a href="/venda/'+data.posts[i].id+'" class="btn btn-outline-info w-100">Saber mais</a>';
            html += '<a href="/venda/edit/'+data.posts[i].id+'" class="btn btn-outline-warning w-100">Editar</a>';
            html += '<form action="/venda/'+data.posts[i].id+'" method="POST">';
            html += '<button type="submit" class="btn btn-outline-danger w-100">Deletar</button>';
            html += '</form></div></div></div>';
        }
        if(data.posts.length != 0){
          html += '<div class="col-md-12 p-2 bg-gradient bg-secondary"><a href="/vendas" class="fw-bold text-light"> Ver todos!</a></div>';
          $("#textos").html(html);
        }else{
          $('#qtde').html("Nenhum Exame foi encontrado! - <a href='/vendas' class='fw-bold text-dark'> Ver todos!</a>");
          $("#textos").html("");
        }
      });
    }
  });
</script>
@endsection