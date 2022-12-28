
@extends('layouts.main')
@section('title', $produto->descricao)
@section('content')


<div class="container p-5">
    <div class="card mb-3 text-bg-dark" style="max-width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/produtos/{{ $produto->image }}" class="card-img-top" alt="{{ $produto->nome }}">
            </div>
                <div class="col-md-8">
                    <h5 class="card-header text-bg-success text-center"> {{ $produto->descricao }}</h5>
                    <div class="card-body fw-bold">
                        <h4 class="card-text">Data da compra: {{ $produto->data->format('Y-m-d') }}</h4>
                        <h4 class="card-text">Categoria: {{ $categoria->desc_categoria }}</h4>
                        <h4 class="card-text">Descrição: {{ $produto->descricao }}</h4>
                        <h4 class="card-text">Quantidade: {{ $produto->qtd }}</h4>
                        <h4 class="card-text">Custo: R$ {{number_format( $produto->valor, 2, ',', '.') }}</h4>
                    </div>                    
                    </div>
                   
                    <div class="card-footer row  justify-content-end">
                        <div class="col-auto" >
                            <a href="/produto/edit/{{ $produto->id }}" class="btn btn-outline-warning"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        </div>
                        <div class="col-auto">
                            <form action="/produto/{{ $produto->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </div>                      
                    </div>
                </div>
        </div>
       
    </div>      
</div>

@endsection
