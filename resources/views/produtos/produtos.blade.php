@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
    <h1 class="p-2 text-center">Estoque/Compras</h1>

    <div class="col text-center p-2">
        <a class="btn btn-warning bg-gradient" href="/produto/create-produto">Cadastrar Produtos</a>
    </div>
    
    @foreach($categorias as $categoria)
        <h4 class="p-2 text-start bg-dark bg-gradient text-white">{{$categoria->desc_categoria}}</h4>
       
        @foreach($produtos as $produto)
        @if($produto->categoria_id == $categoria->id)
        <div class="col-auto">
            <div class="card text-center border-secondary" style="width: 18rem;">
                <div class="card-body fw-bold">
                    <p>Descrição: {{ $produto->descricao}}</p>
                    <p>Categoria: {{  $produto->desc_categoria}}</p>
                    <p>QTD: {{ $produto->qtd}}</p>
                    <p>R$: {{number_format( $produto->valor, 2, ',', '.') }}</p>
                    <a href="/produto/{{ $produto->id }}" class="btn btn-outline-info w-100">Saber mais</a>
                    <a href="/produto/edit/{{ $produto->id }}" class="btn btn-outline-warning w-100">Editar</a>
                    <form action="/produto/{{ $produto->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100">Deletar</button>
                    </form>
                </div>
            </div>
        </div> 
        @endif
        @endforeach
        
    @endforeach 

@endsection