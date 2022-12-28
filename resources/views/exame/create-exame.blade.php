@extends('pacients.show-pacient')
@section('title', 'Exame:' .$pacient->nome)
@section('exame')

        <div class="card text-center fw-bold">
                <form action="/exame" method="POST" enctype="multipart/form-data">
                @csrf 
            <div class="card-header">
                <h5><strong>Exame</strong></h5>
            </div>
            <input type="hidden" name="pacient_id" value="{{$pacient->id}}">
            <input type="hidden" name="local" value="{{$pacient->local_id}}">
            <div class="card-header">            
            <input type="text" class="form-control" name="doutor" value="Dr. {{$user}}" required>
            </div>
            <div class="card-body ">         
                <!-- longe -->
                    <div class="row justify-content-end p-3">
                    <div class="col-2">
                        <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" required>  
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
                        <!-- // -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Direito</strong></div>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_longe[]" required>
                        </div>
                        <!-- // -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Esquerdo</strong></div>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_longe[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_longe[]" required>
                        </div>    
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
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="dir_perto[]" required>
                        </div>
                        <!-- // -->
                        <div class="col">
                        <div class="p-1 border form-control"><strong>Esquerdo</strong></div>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_perto[]" required>
                        </div>
                        <div class="col">
                        <input type="text" class="p-1 border form-control" name="esq_perto[]" required>
                        </div>    
                    </div>
                    </div>
                    <!-- perto -->
                    <!-- diagnostico -->
        <div class="container text-center"> 
            <div class="row p-3 justify-content-center">
                <div class="col-auto">
                    <h4><strong>Diagnóstico</strong></h4>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Miopia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Miopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Hipermetropia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Hipermetropia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Presbiopia" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Presbiopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Astigmatismo" name="diagnostico[]">
                    <label class="form-check-label" for="flexCheckDefault">Astigmatismo</label>
                    </div>
                </div>
            </div>
        <div class="row p-3 justify-content-center">
        <div class="col-auto">
            <h4><strong>Indicação</strong></h4>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Multifocal" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Multifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Bifocal" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Bifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="V.S" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">V.S.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Fotossensível" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Fotossensível</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="A.R." name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">A.R.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Incolor" name="indicacao[]">
            <label class="form-check-label" for="flexCheckDefault">Incolor</label>
            </div>
        </div>
        </div>
        <div class="row p-1 justify-content-center">
            <h4><strong>Observação</strong></h4>
            <textarea class="form-control" name="observacao" id="observacao" rows="3"></textarea>
        </div>
        <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-success btn-sm col-3" id="cad-paciente-btn" value="Cadastrar" />
             </div>
        </div>
        </form>
        </div>  

        @endsection
