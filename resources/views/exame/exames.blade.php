@extends('layouts.main')
@section('title', 'Exames')
@section('content')

<div class="container text-center">
    <h1 class="p-2">Exames</h1>
    <div class="row p-3 mb-4 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon" ></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
    <div id="textos" class="row row-cols-md-3 p-3 g-4 justify-content-center">
    </div>
    <div id="all">
    <div class="row row-cols-md-3 p-3 g-4 justify-content-center" >
        @forelse($exames as $exame)
        <div class="col-6">
            <div class="card text-center" >
                <div class="card-body fw-bold">
                <p>OS: {{ $exame->os}}</p>
                <p>Local: {{ $exame->local}}</p>
                <p>Data: {{ date('d/m/y', strtotime($exame->data))}}</p>
                <p>Nome: {{ $exame->nome}}</p>
                <p>Diag: {{ $exame->diagnostico}}</p>
                <a href="/exame/edit/{{ $exame->id }}" class="btn btn-outline-warning w-100 mb-2">Editar</a> 
                <form action="/exame/{{ $exame->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mb-2 w-100">Deletar</button>
                </form>
                <a href="/exame/{{ $exame->id }}" class="btn btn-outline-info w-100">Saber mais</a>
                </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>
   <div class="row justify-content-center">
        <div class="col-auto">
        {{ $exames->links() }}
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
      $.get("{!! url('pesquisa-exame') !!}", {pesquisar:$('#pesquisar').val()},function(data){
      var pesq = "<div class='row m-0 p-0 justify-content-between'>";
          pesq += "<div class='col-4'>"+data.posts.length.toString()+" Resultados</div>";
          pesq += "<div class='col-4'><a href='/exames' class='fw-bold col-md-3 offset-md-3 text-light'>Voltar</a></div></div>"
	  $('#qtde').html(pesq);
      $('#all').remove();
        var html = "";
        for (var i = 0; i < data.posts.length; i++) {
            html += '<div class="col-6"><div class="card text-center" >';
            html += '<div class="card-body fw-bold">';
            html += '<p>OS: '+data.posts[i].os+'</p>';
            html += '<p>Local: '+data.posts[i].local+'</p>';
            html += '<p>Data: '+data.posts[i].data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</p>';
            html += '<p>Nome: '+data.posts[i].nome+'</p>';
            html += '<p>Diag: '+data.posts[i].diagnostico+'</p>';
            html += '<a href="/exame/edit/'+data.posts[i].id+'" class="btn btn-outline-warning w-100 mb-2">Editar</a>';
            html += '<form action="/exame/'+data.posts[i].id+'" method="POST">';
            html += '<button type="submit" class="btn btn-outline-danger mb-2 w-100">Deletar</button>';
            html += '</form><a href="/exame/'+data.posts[i].id+'" class="btn btn-outline-info w-100">Saber mais</a>';
            html += "</div></div></div>";
        }
        if(data.posts.length != 0){
          html += '<div class="col-md-12 p-2 bg-gradient bg-secondary"><a href="/exames" class="fw-bold text-light"> Ver todos!</a></div>';
          $("#textos").html(html);
        }else{
          $('#qtde').html("Nenhum Exame foi encontrado! - <a href='/exames' class='fw-bold text-dark'> Ver todos!</a>");
          $("#textos").html("");
        }
      });
    }
  });
</script>
@endsection