@extends('layouts.main')
@section('title', 'Pacientes')
@section('content')

<div class="container text-center">
    <h1 class="p-2">Pacientes</h1>
    <div class="row p-3 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon" ></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
   
    <div class="col-auto p-2 pt-4">
        <a class="btn btn-success" href="/pacients/create-pacient">Cadastrar Paciente</a>
    </div>
    
    <div id="textos" class="row row-cols-md-3 p-3 g-4 justify-content-center">
    </div>
   <div id="venda_all">
   <div class="row row-cols-md-3 p-3 g-4 justify-content-center" >
        @foreach($pacients as $pacient)
        <div class="col-6">
            <div class="card text-center" >
                <div class="card-body fw-bold">
                <p>OS: {{ $pacient->os}}</p>
                <p>DATA: {{ date('d/m/y', strtotime($pacient->data))}}</p>
                <p>NOME: {{ $pacient->nome}}</p>
                <p>LOCAL: {{ $pacient->local}}</p>
                <a href="/pacients/edit/{{ $pacient->id }}" class="btn btn-outline-warning w-100 mb-2">Editar</a> 
                <form action="/pacients/{{ $pacient->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger mb-2 w-100">Deletar</button>
                </form>
                <a href="/pacients/{{ $pacient->id }}" class="btn btn-outline-info w-100">Saber mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
   <div class="row justify-content-center">
        <div class="col-auto">
        {{ $pacients->links() }}
        </div> 
    </div>
   </div>
    
</div>
<script type="text/javascript">

  $('#pesquisar').keyup(function(){
    if($('#pesquisar').val().length >= 3){
        var load = '';
        load +='<div class="spinner-grow text-info" role="status">';
        load +='<span class="visually-hidden">Loading...</span>';
        load += '</div>';
      $('#qtde').html(load);
      $.get("{!! url('pesquisa-paciente') !!}", {pesquisar:$('#pesquisar').val()},function(data){
	  $('#qtde').html(data.posts.length.toString()+" Resultados - <a href='/pacientes' class='fw-bold text-dark'> Ver todos!</a>");
      $('#venda_all').remove();
        var html = "";
        for (var i = 0; i < data.posts.length; i++) {
            html += '<div class="col-6">';
            html += '<div class="card text-center" >';
            html += '<div class="card-body fw-bold">';
            html += '<p>OS: '+data.posts[i].os+'</p>';
            html += '<p>DATA: '+data.posts[i].data+'</p>';
            html += '<p>NOME: '+data.posts[i].nome+'</p>';
            html += '<p>LOCAL: '+data.posts[i].local+'</p>';
            html += '<a href="/pacients/edit/'+data.posts[i].id+'" class="btn btn-outline-warning w-100 mb-2">Editar</a> ';
            html += '<form action="/pacients/'+data.posts[i].id+'" method="POST">';
            html += '<button type="submit" class="btn btn-outline-danger mb-2 w-100">Deletar</button>';
            html += '</form>';
            html += '<a href="/pacients/'+data.posts[i].id+'" class="btn btn-outline-info w-100">Saber mais</a>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
        }
        if(data.posts.length!=0){
          $("#textos").html(html);
        }else{
          $('#qtde').html("Nenhum Paciente foi encontrado! - <a href='/pacientes' class='fw-bold text-dark'> Ver todos!</a>");
          $("#textos").html("");
        }
      });
    }
  });
</script>


@endsection