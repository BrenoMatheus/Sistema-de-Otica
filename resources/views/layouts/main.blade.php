<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

<!-- Fontes do Google -->
<link href="/css/font.css" rel="stylesheet">
<!-- CSS Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet" >
 <!-- JS Bootstrap -->
 <script src="/js/bootstrap.min.js"></script>
 <!-- <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.bundle.min.js"></script> -->
  
<!-- CSS aplicaçao -->

        
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/scripts.js"></script>
        <script src="/js/jquery.js"></script>
    </head>
    <body class="antialiased">
        <header>
   

        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">  
                <a href="/" class="navbar-brand">
                     <img src="/img/cbv.jpg" class="rounded-circle border border-primary" width="50" alt="Campanha_boa_visao">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/locals">                        
                        Local
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pacientes">                        
                        Pacientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vendas">
                        Vendas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/produtos">
                        Produtos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/despesas">
                        Despesas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/exames">
                        Exame
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="/financas">
                        Financas
                        </a>
                    </li>  
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="nav-link"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link"> Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest           
                </ul>
                </div>
            </div>
        </nav>
            
        </header>
            
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))                                                    
                        <p class="msg alert alert-success text-center">{{ session('msg') }}</p>
                        @endif
                    @yield('content')   
                </div>
                </div>
            </main>
           

    <div class="container border-top border-dark">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/pacients" class="nav-link px-2 text-muted">Pacientes</a></li>
            <li class="nav-item"><a href="/vendas" class="nav-link px-2 text-muted">Vendas</a></li>
            <li class="nav-item"><a href="/despesas" class="nav-link px-2 text-muted">Despesa</a></li>
            <li class="nav-item"><a href="/financas" class="nav-link px-2 text-muted">Finanças</a></li>
            <li class="nav-item"><a href="/produtos" class="nav-link px-2 text-muted">Produtos</a></li>
            <li class="nav-item"><a href="/exames" class="nav-link px-2 text-muted">Exames</a></li>
            <li class="nav-item"><a href="/locals" class="nav-link px-2 text-muted">Locals</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 Company, Inc</p>
        </footer>
    </div>
    </body>
</html>
