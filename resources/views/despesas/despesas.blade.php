@extends('layouts.main')
@section('title', 'Despesas')
@section('content')
<div class="container text-center">
    <h1 class=" text-center">Despesas</h1>

    <div class="col text-center p-2">
        <a class="btn btn-danger bg-gradient" href="/despesa/create-despesa">Cadastrar Despesas</a>
    </div>
    <div class="row p-3 mb-4 bg-gradient bg-secondary">
        <div class="col input-group">
            <span class="input-group-text bg-gradient bg-info"><img src="/img/icons/search-outline.svg" class="icon"></span>
            <input type="text" id="pesquisar" name="pesquisar" class="form-control" placeholder="Procurar">
        </div>
        <div class="col-md-12 p-2 pt-3">
            <h5 id="qtde" class="text-light" ></h5>
        </div>
    </div>
   
    <div class="row p-3 g-4 justify-content-center" >
    <div class="table-responsive-xl" >
    <table class="table">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Desc</th>
            <th scope="col">Data</th>
            <th scope="col">Forma</th>
            <th scope="col">Custo</th>
            <th scope="col">Ações</th>
            <tr>
        </thead>
        <tbody id="textos">
    </tbody>
        <tbody id="all">
    @foreach($categorias as $categoria)
        <tr class="text-start bg-dark bg-gradient text-white grid">
          <td colspan="5">
            {{$categoria->categoria}}
          </td>
          <td colspan="1">Total: {{number_format($categoria->soma,2,',','.')}}</td>
        </tr>
        @foreach($despesas as $despesa)
        @if($despesa->catdespesa_id == $categoria->id)
       <tr >
                <td >{{ $despesa->id}}</td>
                <td >{{ $despesa->descricao}}</td>
                <td >{{ date('d/m/y', strtotime($despesa->data))}}</td>
                <td>{{ $despesa->forma}}</td>
                <td>{{number_format( $despesa->valor, 2, ',', '.') }}</td>
                <td class='row'>
                    <a href="/despesa/{{ $despesa->id }}" class="btn col-auto  btn-outline-info"><img src="/img/icons/eye-outline.svg" class="icon"></a>
                    <a href="/despesa/edit/{{ $despesa->id }}" class="btn col-auto btn-outline-warning"><img src="/img/icons/create-outline.svg" class="icon"></a>
                    <form action="/despesa/{{ $despesa->id }}" class='col-auto' method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"><img src="/img/icons/trash-outline.svg" class="icon"></button>
                    </form>
                </td>
        </tr> 
        @endif    
        @endforeach
        @endforeach 
         </tbody>
        </table>
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
      $.get("{!! url('pesquisa-despesa') !!}", {pesquisar:$('#pesquisar').val()},function(data){
      var pesq = "<div class='row m-0 p-0 justify-content-between'>";
          pesq += "<div class='col-4'>"+data.posts.length.toString()+" Resultados</div>";
          pesq += "<div class='col-4'><a href='/despesas' class='fw-bold col-md-3 offset-md-3 text-light'>Voltar</a></div></div>"
	  $('#qtde').html(pesq);
      $('#all').remove();
      var html = '';
        for (var i = 0; i < data.categoria.length; i++) {
        html += '<tr class="text-end bg-dark bg-gradient text-white grid">';
        html += '<td colspan="6">Total: '+data.categoria[i].soma.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</td></tr>';
        for (var i = 0; i < data.posts.length; i++) {
        html +='<tr ><td >'+data.posts[i].id+'</td>';  
        html += '<td >'+data.posts[i].descricao+'</td>';
        html += '<td >'+data.posts[i].data.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1')+'</td>';
        html += '<td>'+data.posts[i].forma+'</td>';
        html += '<td>'+data.posts[i].valor.toLocaleString("pt-BR", { style: "currency" , currency:"BRL"})+'</td>';
        html += '<td class="row">';
        html += '<a href="/despesa/'+data.posts[i].id+'" class="btn col-auto  btn-outline-info"><img src="/img/icons/eye-outline.svg" class="icon"></a>';
        html += '<a href="/despesa/edit/'+data.posts[i].id+'" class="btn col-auto btn-outline-warning"><img src="/img/icons/create-outline.svg" class="icon"></a>';
        html += '<form action="/despesa/'+data.posts[i].id+'" class="col-auto" method="POST">';
        html += '<a type="submit" class="btn btn-outline-danger"><img src="/img/icons/trash-outline.svg" class="icon"></a>';
        html += '</form>';
        html += '</td>';
        html += '</tr>';
        }
        }
        if(data.posts.length != 0){
          html += '<div class="col-md-12 mt-3  p-2 bg-gradient bg-secondary"><a href="/despesas" class="fw-bold text-light"> Ver todos!</a></div>';
          $("#textos").html(html);
        }else{
          $('#qtde').html("Nenhum Exame foi encontrado! - <a href='/despesas' class='fw-bold text-dark'> Ver todos!</a>");
          $("#textos").html("");
        }
      });
    }
  });
</script>

@endsection