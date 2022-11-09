@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Tablero {{ session('activo') }}</h3>
    </div>                       
      <div class="card">          
          <div class="card-header">
            <h4>
              ¡Hola! <strong>{{ Auth::user()->name }},</strong> 
              Bienvenido a SIGNO</h4> 
          </div>                           
          <div class="card-body">

            <h4>Detalles Matrícula</h4><br><br>


            <div class="row">

              <div class="col-sm-3">
                <div class="card">   
                  <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em;  background-color: #c068de; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-venus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Femeninos: {{-- $mat_gen_fem --}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em;  background-color: #5ab1f2; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-mars text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Masculinos: {{-- $mat_gen_mas --}}</h5>
                  </div>
                </div>
              </div>
      
              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-success" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-plus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Ingresos: {{-- $mat_ing --}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-danger" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-minus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Egresos: {{-- $mat_egr --}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-info" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-sync-alt text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Equivalencia: {{-- $mat_equ --}}</h5>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-warning" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-exclamation-circle text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Repitientes: {{-- $mat_rep --}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-primary" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-book-reader text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Materia Pte.: {{-- $mat_mp --}}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-dark" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-user-graduate text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Total: {{-- $matricula --}}</h5>
                  </div>
                </div>
              </div>
              </div><!--row-->
              <br>

          <h4>Matrícula por Seccion</h4><br>

          @php
            $i=0;	
          @endphp

          @foreach ($seccions as $seccion)

          <ul class="list-group" style="display:inline-block; margin-top: 1em; margin-left: 0.5em; width: 13em; box-shadow: 1px 1px 5px;">

            <li class="list-group-item bg-primary text-light text-center">
                <strong>{{ $grado->nombre_grado }}</strong>
            </li>

            <li class="list-group-item">
              <label style="font-size:90%;">

                <strong>Masculinos:</strong> <i>{{ $tt_mas[$i] }}.</i>  <br>
                <strong>Femeninos:</strong> <i>{{ $tt_fem[$i] }}.</i>  <br>
                <strong>Ingresos:</strong> <i>{{ $tt_ing[$i] }}.</i>  <br>

                @php
                    if ($tt_egr[$i]>=5)	{$formato='text-danger';
                    }else{$formato='text-secondary';}						
                @endphp

                <strong>Egresos:</strong> <i class="{{$formato}}">{{ $tt_egr[$i] }}.</i>  <br>
                <strong>Equivalencia:</strong> <i>{{ $tt_equ[$i] }}.</i>  <br>

                @php
                    if ($tt_rep[$i]>=1){$formato='text-danger';
                    }else{$formato='text-secondary';}						
                @endphp

                <strong>Repitientes</strong> <i class="{{$formato}}">{{ $tt_rep[$i] }}.</i>  <br>

                @if ($grado->id==1)
                    <strong>Materia Pte.:</strong> <i>N/A.</i>  <br>
                @else
                    <strong>Materia Pte.:</strong> <i>{{ $tt_mp[$i] }}.</i>  <br>
                @endif

                <br>

                <h6 class="text-primary text-center">
                    <strong>Total: {{ $tt[$i] }}.</strong>  <br>
                </h6>
              
                
              </label>
            </li>
          </ul>

          @php
            $i=$i+1;
          @endphp	
          @endforeach

          </div><!-- card body -->
      </div>
</section>
@endsection

