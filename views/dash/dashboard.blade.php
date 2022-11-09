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

            <h4>Matrícula General</h4><br><br>


            <div class="row">

              <div class="col-sm-3">
                <div class="card">   
                  <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em;  background-color: #c068de; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-venus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Femeninos: {{ $mat_gen_fem }}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em;  background-color: #5ab1f2; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-mars text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Masculinos: {{ $mat_gen_mas }}</h5>
                  </div>
                </div>
              </div>
      
              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-success" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-plus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Ingresos: {{ $mat_ing }}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-danger" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-minus text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Retiros: {{ $mat_egr }}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-info" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-sync-alt text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Equivalencia: {{ $mat_equ }}</h5>
                  </div>
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-warning" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-exclamation-circle text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Repitientes: {{ $mat_rep }}</h5>
                  </div>
                </div>
              </div>
 
              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-primary" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-book-reader text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Materia Pte.: {{ $mat_mp }}</h5>
                  </div>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="card">   
                  <div class="bg-dark" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h5 class="fa fa-user-graduate text-light" style="padding: 1em;"></h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Total: {{ $matricula }}</h5>
                  </div>
                </div>
              </div>
              </div><!--row-->
              <br>

          <h4>Matrícula por Años</h4><br>

          @php
            $i=0;	
          @endphp

          @foreach ($grados as $grado)

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

                <strong>Retiros:</strong> <i class="{{$formato}}">{{ $tt_egr[$i] }}.</i>  <br>
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

                <div class="col-xs-12 col-sm-12 col-md-12">
                  <!--<a class="btn btn-primary" href="{{-- route('dash',$grado->id) --}}">Detalles</a>-->
                  </div>
                
              </label>
            </li>
          </ul>


          

          @php
            $i=$i+1;
          @endphp	
          @endforeach
          <br><br>
          <h5 class="text-primary" style="float: right;">Promedio de alumnos por años: <i>{{round($media_grado, 2)}}</i></h5>
          <br><br><br>
          <h4>Matrícula por Secciones</h4><br>

          <div class="row">

            <div class="col-sm-4">
              <div class="card">   
                <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em;  background-color: #c068de; box-shadow: 1px 1px 5px;">
                    <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      1°A
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_1a_fem}} <br>
                    <b>Masculinos: </b> {{$mat_1a_mas}} <br>
                    <b>Ingresos: </b> {{$mat_1a_in}} <br>
                    <b>Retiros: </b> {{$mat_1a_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_1a_eq}} <br>
                    <b>Repitientes: </b> {{$mat_1a_rep}} <br>
                    <b>Total:</b>  {{ $mat_1a }}
                  </h6>
                </div>
              </div>
            </div>


            <div class="col-sm-4">
              <div class="card">   
                <div class="bg bg-warning" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                    <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      1°B
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_1b_fem}} <br>
                    <b>Masculinos: </b> {{$mat_1b_mas}} <br>
                    <b>Ingresos: </b> {{$mat_1b_in}} <br>
                    <b>Retiros: </b> {{$mat_1b_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_1b_eq}} <br>
                    <b>Repitientes: </b> {{$mat_1b_rep}} <br>
                    <b>Total:</b>  {{ $mat_1b }}
                  </h6>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card">   
                <div class="bg bg-info" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                    <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      1°C
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_1c_fem}} <br>
                    <b>Masculinos: </b> {{$mat_1c_mas}} <br>
                    <b>Ingresos: </b> {{$mat_1c_in}} <br>
                    <b>Retiros: </b> {{$mat_1c_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_1c_eq}} <br>
                    <b>Repitientes: </b> {{$mat_1c_rep}} <br>
                    <b>Total:</b>  {{ $mat_1c }}
                  </h6>
                </div>
              </div>
            </div>
                        </div><!--row-->
            <br>
            <h5 class="text-primary" style="float: right;">Promedio de alumnos de 1° año: <i>{{round($media_1, 2)}}</i></h5>

            <div class="row" style="margin-top: 5em;">

            <div class="col-sm-4">
              <div class="card">   
                <div class="bg bg-primary" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                    <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      2°A
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_2a_fem}} <br>
                    <b>Masculinos: </b> {{$mat_2a_mas}} <br>
                    <b>Ingresos: </b> {{$mat_2a_in}} <br>
                    <b>Retiros: </b> {{$mat_2a_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_2a_eq}} <br>
                    <b>Repitientes: </b> {{$mat_2a_rep}} <br>
                    <b>Total:</b>  {{ $mat_2a }}
                  </h6>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card">   
                <div class="bg bg-success" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                    <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      2°B
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_2b_fem}} <br>
                    <b>Masculinos: </b> {{$mat_2b_mas}} <br>
                    <b>Ingresos: </b> {{$mat_2b_in}} <br>
                    <b>Retiros: </b> {{$mat_2b_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_2b_eq}} <br>
                    <b>Repitientes: </b> {{$mat_2b_rep}} <br>
                    <b>Total:</b>  {{ $mat_2b }}
                  </h6>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card">   
                <div class="bg bg-light" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                    <h6 class="text-dark" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                      2°C
                    </h6>
                </div>
                <div class="card-body">
                  <h6 class="card-title" style="font-size: 15px;">
                    <b>Femeninos: </b> {{$mat_2c_fem}} <br>
                    <b>Masculinos: </b> {{$mat_2c_mas}} <br>
                    <b>Ingresos: </b> {{$mat_2c_in}} <br>
                    <b>Retiros: </b> {{$mat_2c_ret}} <br>
                    <b>Equivalencia: </b> {{$mat_2c_eq}} <br>
                    <b>Repitientes: </b> {{$mat_2c_rep}} <br>
                    <b>Total:</b>  {{ $mat_2c }}
                  </h6>
                </div>
              </div>
            </div>
                        </div><!--row-->
            <br>
            <h5 class="text-primary" style="float: right;">Promedio de alumnos de 2° año: <i>{{round($media_2,2)}}</i></h5>


            <div class="row" style="margin-top: 5em;">

              <div class="col-sm-4">
                <div class="card">   
                  <div class="bg bg-danger" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                        3°A
                      </h6>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title" style="font-size: 15px;">
                      <b>Femeninos: </b> {{$mat_3a_fem}} <br>
                      <b>Masculinos: </b> {{$mat_3a_mas}} <br>
                      <b>Ingresos: </b> {{$mat_3a_in}} <br>
                      <b>Retiros: </b> {{$mat_3a_ret}} <br>
                      <b>Equivalencia: </b> {{$mat_3a_eq}} <br>
                      <b>Repitientes: </b> {{$mat_3a_rep}} <br>
                      <b>Total:</b>  {{ $mat_3a }}
                    </h6>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-4">
                <div class="card">   
                  <div class="bg bg-secondary" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                      <h6 class="text-dark" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                        3°B
                      </h6>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title" style="font-size: 15px;">
                      <b>Femeninos: </b> {{$mat_3b_fem}} <br>
                      <b>Masculinos: </b> {{$mat_3b_mas}} <br>
                      <b>Ingresos: </b> {{$mat_3b_in}} <br>
                      <b>Retiros: </b> {{$mat_3b_ret}} <br>
                      <b>Equivalencia: </b> {{$mat_3b_eq}} <br>
                      <b>Repitientes: </b> {{$mat_3b_rep}} <br>
                      <b>Total:</b>  {{ $mat_3b }}
                    </h6>
                  </div>
                </div>
              </div>
  
              <div class="col-sm-4">
                <div class="card">   
                  <div  style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px; background-color: #5ab1f2;">
                      <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                        3°C
                      </h6>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title" style="font-size: 15px;">
                      <b>Femeninos: </b> {{$mat_3c_fem}} <br>
                      <b>Masculinos: </b> {{$mat_3c_mas}} <br>
                      <b>Ingresos: </b> {{$mat_3c_in}} <br>
                      <b>Retiros: </b> {{$mat_3c_ret}} <br>
                      <b>Equivalencia: </b> {{$mat_3c_eq}} <br>
                      <b>Repitientes: </b> {{$mat_3c_rep}} <br>
                      <b>Total:</b>  {{ $mat_3c }}
                    </h6>
                  </div>
                </div>
              </div>
                          </div><!--row-->
              <br>
              <h5 class="text-primary" style="float: right;">Promedio de alumnos de 3° año: <i>{{round($media_3,2)}}</i></h5>


              <div class="row" style="margin-top: 5em;">

                <div class="col-sm-4">
                  <div class="card">   
                    <div class="bg bg-warning" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                        <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                          4°A
                        </h6>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title" style="font-size: 15px;">
                        <b>Femeninos: </b> {{$mat_4a_fem}} <br>
                        <b>Masculinos: </b> {{$mat_4a_mas}} <br>
                        <b>Ingresos: </b> {{$mat_4a_in}} <br>
                        <b>Retiros: </b> {{$mat_4a_ret}} <br>
                        <b>Equivalencia: </b> {{$mat_4a_eq}} <br>
                        <b>Repitientes: </b> {{$mat_4a_rep}} <br>
                        <b>Total:</b>  {{ $mat_4a }}
                      </h6>
                    </div>
                  </div>
                </div>
    
                <div class="col-sm-4">
                  <div class="card">   
                    <div class="bg bg-primary" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                        <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                          4°B
                        </h6>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title" style="font-size: 15px;">
                        <b>Femeninos: </b> {{$mat_4b_fem}} <br>
                        <b>Masculinos: </b> {{$mat_4b_mas}} <br>
                        <b>Ingresos: </b> {{$mat_4b_in}} <br>
                        <b>Retiros: </b> {{$mat_4b_ret}} <br>
                        <b>Equivalencia: </b> {{$mat_4b_eq}} <br>
                        <b>Repitientes: </b> {{$mat_4b_rep}} <br>
                        <b>Total:</b>  {{ $mat_4b }}
                      </h6>
                    </div>
                  </div>
                </div>
    
                <div class="col-sm-4">
                  <div class="card">   
                    <div style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;  background-color: #c068de;">
                        <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                          4°C
                        </h6>
                    </div>
                    <div class="card-body">
                      <h6 class="card-title" style="font-size: 15px;">
                        <b>Femeninos: </b> {{$mat_4c_fem}} <br>
                        <b>Masculinos: </b> {{$mat_4c_mas}} <br>
                        <b>Ingresos: </b> {{$mat_4c_in}} <br>
                        <b>Retiros: </b> {{$mat_4c_ret}} <br>
                        <b>Equivalencia: </b> {{$mat_4c_eq}} <br>
                        <b>Repitientes: </b> {{$mat_4c_rep}} <br>
                        <b>Total:</b>  {{ $mat_4c }}
                      </h6>
                    </div>
                  </div>
                </div>
                            </div><!--row-->
                <br>
                <h5 class="text-primary" style="float: right;">Promedio de alumnos de 4° año: <i>{{round($media_4,2)}}</i></h5>
            
                <div class="row" style="margin-top: 5em;">

                  <div class="col-sm-4">
                    <div class="card">   
                      <div class="bg bg-danger" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                          <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                            5°A
                          </h6>
                      </div>
                      <div class="card-body">
                        <h6 class="card-title" style="font-size: 15px;">
                          <b>Femeninos: </b> {{$mat_5a_fem}} <br>
                          <b>Masculinos: </b> {{$mat_5a_mas}} <br>
                          <b>Ingresos: </b> {{$mat_5a_in}} <br>
                          <b>Retiros: </b> {{$mat_5a_ret}} <br>
                          <b>Equivalencia: </b> {{$mat_5a_eq}} <br>
                          <b>Repitientes: </b> {{$mat_5a_rep}} <br>
                          <b>Total:</b>  {{ $mat_5a }}
                        </h6>
                      </div>
                    </div>
                  </div>
      
                  <div class="col-sm-4">
                    <div class="card">   
                      <div class="bg bg-dark" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;">
                          <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                            5°B
                          </h6>
                      </div>
                      <div class="card-body">
                        <h6 class="card-title" style="font-size: 15px;">
                          <b>Femeninos: </b> {{$mat_5b_fem}} <br>
                          <b>Masculinos: </b> {{$mat_5b_mas}} <br>
                          <b>Ingresos: </b> {{$mat_5b_in}} <br>
                          <b>Retiros: </b> {{$mat_5b_ret}} <br>
                          <b>Equivalencia: </b> {{$mat_5b_eq}} <br>
                          <b>Repitientes: </b> {{$mat_5b_rep}} <br>
                          <b>Total:</b>  {{ $mat_5b }}
                        </h6>
                      </div>
                    </div>
                  </div>
      
                  <div class="col-sm-4">
                    <div class="card">   
                      <div class="bg bg-success" style="width: 4em; height: 4em; border-radius: 1em; margin: -1em; box-shadow: 1px 1px 5px;"">
                          <h6 class="text-light" style="padding: 1.3em; font-size: 13px; padding-top:1.5em;">
                            5°C
                          </h6>
                      </div>
                      <div class="card-body">
                        <h6 class="card-title" style="font-size: 15px;">
                          <b>Femeninos: </b> {{$mat_5c_fem}} <br>
                          <b>Masculinos: </b> {{$mat_5c_mas}} <br>
                          <b>Ingresos: </b> {{$mat_5c_in}} <br>
                          <b>Retiros: </b> {{$mat_5c_ret}} <br>
                          <b>Equivalencia: </b> {{$mat_5c_eq}} <br>
                          <b>Repitientes: </b> {{$mat_5c_rep}} <br>
                          <b>Total:</b>  {{ $mat_5c }}
                        </h6>
                      </div>
                    </div>
                  </div>
                              </div><!--row-->
                  <br>
                  <h5 class="text-primary" style="float: right;">Promedio de alumnos de 5° año: <i>{{round($media_5,2)}}</i></h5>


          </div><!-- card body -->
      </div>
</section>
@endsection

