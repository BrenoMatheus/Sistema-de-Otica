@extends('pacients.show-pacient')
@section('title', 'Editando:' .$pacient->nome)
@section('exame')
<div class="card text-center fw-bold">
      
            <input type="hidden" name="pacient_id" value="{{$pacient->id}}">
            <div class="card-header text-bg-secondary  bg-gradient">            
            <input type="text" class="form-control fw-bold" name="doutor" value="{{$exame->doutor}}" disabled>
            </div>
            <div class="card-body  bg-gradient">         
                <!-- longe -->
                    <div class="row justify-content-end p-3">
                    <div class="col-2">
                        <input type="date" class="form-control fw-bold" placeholder="Data"value="{{ $exame->data->format('Y-m-d') }}" disabled>  
                    </div>
                    </div>
                    <div class="container text-center">                      
                    <div class="row g-0">
                        <div class="col">
                        <div class="p-2 border bg-warning text-white"><strong>Longe</strong> </div>
                        </div>
                    </div>
                    <div class="row row-cols-6 g-0">
                        <div class="col">
                            <div class="p-1 border">-</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Esférico</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Cilindrico</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Eixo</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">DNP.</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">ALT.</div>
                        </div>
                        <!-- // DL-->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Direito</strong></div>
                        </div>
                        @foreach($exame->dir_longe as $dl)
                        <div class="col">
                            <input type="text" class="p-1 border form-control" name="dir_longe[]" value="{{$dl}}" disabled>
                        </div>
                        @endforeach
                        <!-- //EL -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Esquerdo</strong></div>
                        </div>
                        @foreach($exame->esq_longe as $el)
                        <div class="col">
                            <input type="text" class="p-1 border form-control" name="esq_longe[]" value="{{$el}}" disabled>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    <!-- longef -->
                    <!-- pertoi -->
                    <div class="container text-center">
                    <div class="row g-0">
                        <div class="col">
                        <div class="p-2 border bg-danger text-white"><strong>Perto</strong> </div>
                        </div>
                    </div>
                    <div class="row row-cols-6 g-0">
                        <div class="col">
                            <div class="p-1 border">-</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Esférico</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Cilindrico</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">Eixo</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">DNP.</div>
                        </div>
                        <div class="col">
                            <div class="p-1 border">ALT.</div>
                        </div>
                        <!-- // -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Direito</strong></div>
                        </div>
                        @foreach($exame->dir_perto as $dp)
                        <div class="col">
                            <input type="text" class="p-1 border form-control" name="dir_perto[]" value="{{$dp}}" disabled>
                        </div>
                        @endforeach
                        <!-- // -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Esquerdo</strong></div>
                        </div>
                        @foreach($exame->esq_perto as $ep)
                        <div class="col">
                            <input type="text" class="p-1 border form-control" name="esq_perto[]" value="{{$ep}}" disabled>
                        </div>
                        @endforeach   
                    </div>
                    </div>
                    <!-- perto -->
                    <!-- diagnostico -->
        <div class="container text-center"> 
            <div class="row p-3 justify-content-center">
                <div class="col-auto"> 
                   
                    <h4><strong>Diagnóstico</strong></h4>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Miopia" name="diagnostico[]" id="Miopia">
                    <label class="form-check-label" for="flexCheckDefault">Miopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Hipermetropia" name="diagnostico[]" id="Hipermetropia" >
                    <label class="form-check-label" for="flexCheckDefault">Hipermetropia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Presbiopia" name="diagnostico[]" id="Presbiopia" >
                    <label class="form-check-label" for="flexCheckDefault">Presbiopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Astigmatismo" name="diagnostico[]" id="Astigmatismo" >
                    <label class="form-check-label" for="flexCheckDefault">Astigmatismo</label>
                    </div>                     
                </div>
                <script>
                        var m = document.querySelector('#Miopia');
                        var h = document.querySelector('#Hipermetropia');
                        var p = document.querySelector('#Presbiopia');
                        var a = document.querySelector('#Astigmatismo');
                    @foreach($exame->diagnostico as $dg)
                        @switch($dg) 
                        @case($dg == 'Miopia')        
                        m.checked = true;                                        
                        @break
                        @case($dg == 'Hipermetropia')
                        h.checked = true;
                        @break
                        @case($dg == 'Presbiopia')
                        p.checked = true;
                        @break;
                        @case($dg == 'Astigmatismo')
                        a.checked = true;
                        @break
                        @default
                        @endswitch
                    @endforeach
                </Script> 
            </div>
        <div class="row p-3 justify-content-center">
        <div class="col-auto">
            <h4><strong>Indicação</strong></h4>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Multifocal" name="indicacao[]" id="Multifocal">
            <label class="form-check-label" for="flexCheckDefault">Multifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Bifocal" name="indicacao[]" id="Bifocal">
            <label class="form-check-label" for="flexCheckDefault">Bifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="V.S" name="indicacao[]" id="VS">
            <label class="form-check-label" for="flexCheckDefault">V.S.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Fotossensível" name="indicacao[]" id="Fotossensível">
            <label class="form-check-label" for="flexCheckDefault">Fotossensível</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="A.R." name="indicacao[]" id="AR">
            <label class="form-check-label" for="flexCheckDefault">A.R.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Incolor" name="indicacao[]" id="Incolor">
            <label class="form-check-label" for="flexCheckDefault">Incolor</label>
            </div>
        </div>
        </div>
        <script>
                         var inc = document.querySelector('#Incolor');
                        var ar = document.querySelector('#AR');
                        var ft = document.querySelector('#Fotossensível');
                        var mf = document.querySelector('#Multifocal');
                        var vs = document.querySelector('#VS');
                        var bf = document.querySelector('#Bifocal');
                    @foreach($exame->indicacao as $ind)
                        @switch($ind) 
                        @case($ind == 'Incolor')        
                        inc.checked = true;                                        
                        @break
                        @case($ind == 'A.R.')        
                        ar.checked = true;                                        
                        @break
                        @case($ind == 'Fotossensível')        
                        ft.checked = true;                                        
                        @break
                        @case($ind == 'Multifocal')        
                        mf.checked = true;                                        
                        @break
                        @case($ind == 'V.S')        
                        vs.checked = true;                                        
                        @break
                        @case($ind == 'Bifocal')        
                        bf.checked = true;                                        
                        @break
                        @endswitch
                    @endforeach
                </Script> 
        <div class="row p-1 justify-content-center">
            <h4><strong>Observação</strong></h4>
            <textarea class="form-control" name="observacao" id="observacao" rows="3" disabled>{{$exame->observacao}}</textarea>
        </div>
        @if($disabled_exame != 1)
        <div class="row p-1 justify-content-center">
                <div class="col-auto">
                    <a href="/exame/edit/{{ $exame->id }}" class="btn btn-warning col">Editar</a> 
                </div>
                <form action="/exame/{{ $exame->id }}" class="col-auto" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </form>
                <div class="col-auto">
                    <a href="/venda/create-venda/{{ $exame->id }}" class="btn btn-success col">Vender</a> 
                </div>
             </div>
        </div>
        @endif
        </div>      
        @yield('cliente')     

@endsection