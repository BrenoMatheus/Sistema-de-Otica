
@extends('layouts.main')
@section('title', $despesa->descricao)
@section('content')


<div class="container p-5">
    <div class="card mb-3 text-bg-dark bg-gradient" style="max-width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="/img/despesas/{{ $despesa->image }}" class="card-img-top w-80" alt="{{ $despesa->nome }}">
            </div>
                <div class="col-md-8">
                    <h5 class="card-header text-bg-success text-center bg-gradient"> {{ $despesa->descricao }}</h5>
                    <div class="card-body fw-bold bg-gradient">
                        <h4 class="card-text">Data: {{ $despesa->data->format('Y-m-d') }}</h4>
                        <h4 class="card-text">Categoria: {{ $despesa->categoria->desc_cat_desp }}</h4>
                        <h4 class="card-text">Descrição: {{ $despesa->descricao }}</h4>
                        <h4 class="card-text">Forma: {{ $despesa->forma }}</h4>
                        <h4 class="card-text">Parcela: {{ $despesa->parcela }}</h4>
                        <h4 class="card-text">Local: {{ $despesa->locals_desp->local }}</h4>
                        <h4 class="card-text">Custo: R$ {{number_format( $despesa->valor, 2, ',', '.') }}</h4>
                    </div>                    
                    </div>
                   
                    <div class="card-footer row  justify-content-end">
                        <div class="col-auto" >
                            <a href="/despesa/edit/{{ $despesa->id }}" class="btn btn-outline-warning"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        </div>
                        <div class="col-auto">
                            <form action="/despesa/{{ $despesa->id }}" method="POST">
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
