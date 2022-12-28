@extends('layouts.main')
@section('title', $pacient->nome)
@section('content')


<div class="container p-5">
    <div class="card mb-3 text-bg-dark  bg-gradient" style="max-width: auto;">
        <div class="row g-0">
            <div class="col-md-4">
            @if($pacient->image == null)
            <img src="/img/pacients/pac.jpg" class="card-img-top" alt="{{ $pacient->nome }}">
            @else
            <img src="/img/pacients/{{ $pacient->image }}" class="card-img-top" alt="{{ $pacient->nome }}">
            @endif
            </div>
                <div class="col-md-8">
                    <h5 class="card-header text-bg-success text-center">OS:  {{ $pacient->os }}</h5>
                    <div class="card-body fw-bold  bg-gradient">
                        <h4 class="card-text">Nome: {{ $pacient->nome }}</h4>
                        <h4 class="card-text">Telefone: {{ $pacient->telefone }}</h4>
                        <h4 class="card-text">Local: {{ $pacient->local->local }}</h4>
                        <h4 class="card-text">Endereço: {{ $pacient->endereco }}</h4>
                        <h4 class="card-text">Observação: {{ $pacient->observacao }}</h4>
                        <h3 class="border-top p-2">O paciente é diagnosticado com:</h3>
                        <ul id="items-list">
                           @if($pacient->doencas == null)
                           <li><h5 class="card-text">Sem doença</h5></li>
                           @else
                           @foreach($pacient->doencas as $doenca)
                            <li><h5 class="card-text">{{ $doenca }}</h5></li>
                            @endforeach
                           @endif
                        </ul> 
                    @if($disabled == 1)
                    </div>
                    @else
                    
                        @if(!$hasUserJoined)
                        <p class="alert alert-danger">Paciente ainda não foi examinado!</p>                        
                        @else
                        <h5 class="alert alert-success">Paciente foi examinado! - Click aqui para visualizar: <a href="/exame/{{ $exame->id }}" class="alert-link">Exame</a></h5>
                        @endif
                    </div>
                   
                    <div class="card-footer row">
                        <div class="col" >
                        </div>
                        @if(!$hasUserJoined)
                        @else
                        <div class="col" >
                            <a href="/venda/create-venda/{{ $exame->id }}" class="btn btn-outline-success">Vender</a> 
                        </div>
                        @endif
                        <div class="col" >
                            <a href="/exame/create-exame/{{ $pacient->id }}" class="btn btn-outline-info">Exame</a> 
                        </div>
                        <div class="col">
                            <form action="/pacients/{{ $pacient->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Deletar</button>
                            </form>
                        </div>                      
                    </div>
                    @endif
                </div>
        </div>
       
    </div>      
    @yield('exame')  
</div>

@endsection
