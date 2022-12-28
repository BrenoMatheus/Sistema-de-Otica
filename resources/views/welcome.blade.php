@extends('layouts.main')
@section('title', 'Campanha da Boa visao')
@section('content')

  <div id="search-container" class="col-ml-12">
      
  </div>
  <div class="row row-cols-md-3 p-3 g-4 justify-content-center">
  <div class="col-6">
  <a href="/pacientes"> 
    <div class="card">
    <img src="/img/pacients/pac.jpg" class="card-img-top img-painel" alt="..."> 
      <div class="card-img-overlay">
        <h5 class="card-title text-center">Pacientes</h5>
      </div>
      </a>
    </div>
   
  </div>
  <div class="col-6">
  <a href="/exames"> 
    <div class="card">
      <img src="/img/exame.jpg" class="card-img-top img-painel" alt="...">
      <div class="card-img-overlay">
      <h5 class="card-title text-center ">Exames</h5>
      </div>
    </div>
   </a>
  </div>
  
  <div class="col-6">
  <a href="/produtos">
    <div class="card" >
      <img src="/img/produto.jpg" class="card-img-top img-painel">
      <div class="card-img-overlay">
      <h5 class="card-title text-center">Produtos</h5> 
      </div>
    </div>
   </a>
  </div>
  <div class="col-6">
    <a href="/despesas">
      <div class="card" >
      <img src="/img/despesa.jpg" class="card-img-top img-painel" alt="...">
      <div class="card-img-overlay">
      <h5 class="card-title  text-center">Despesas</h5>
      </div>
      </a>
    </div>
  
  </div>
  <div class="col-6">
  <a href="/vendas">
    <div class="card" >
    <img src="/img/venda.jpg" class="card-img-top img-painel" alt="...">
      <div class="card-img-overlay">
        <h5 class="card-title text-center">Vendas</h5>
      </div>
    </div>
    </a>
  </div>
  <div class="col-6">
  <a href="/financas">
    <div class="card" >
      <img src="/img/financa.jpg" class="card-img-top img-painel" alt="...">
      <div class="card-img-overlay">
      <h5 class="card-title text-center">Finanças</h5>
      </div>
    </div>
   </a>
  </div>
</div>
  @endsection