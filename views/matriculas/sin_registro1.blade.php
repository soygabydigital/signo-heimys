@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="section-header">
            <h1 class="text-center">Inscribir Matrícula {{ session('activo') }}</h1>  
                        
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 

                        <div class="card-header">
                            <h4>{{ $alumno[0]->cedula }} | {{ $alumno[0]->apellidos }} {{ $alumno[0]->nombres }}
                        </div>
                        <div class="card-body">  
                            <div>
                                <i>No posee registro en el periodo escolar anterior.</i>
                            </div><br>

                            @if ($status==0)
                                {!! Form::open(array('route'=>'sinregistro1','method'=>'POST')) !!}
                            @method('GET')
                            
                            {!! Form::hidden('anio_id',$anio_activo->id_activo)  !!}
                            {!! Form::hidden('alumno_id',$alumno[0]->id)  !!} 

                            <div class="row">

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="repite">Repitiente:</label>
                                        {!! Form::select('repite', ['0' => 'No', '1' => 'Si'], null,array('class'=>'form-control')) !!}                                       
                                    </div>
                                </div> 

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="grado_id">Año:</label>
                                        {!! Form::select('grado_id',$grados,[],array('class'=>'form-control grado_id','id'))  !!}
                                    </div>
                                </div> 


                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="mat_pend">Materia Pendiente:</label>
                                        {!! Form::select('mat_pend', ['0' => 'Ninguna', '1' => 'Una','2'=> 'Dos'], null,array('class'=>'form-control')) !!}
                                       <p>Si Grado es Primero No hay Materia Pendiente</p>
                                    </div>
                                </div> 
                                  

                              </div><!--row-->
                            </div><!--card-body-->
                         </div><!--card-->


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </div>

                            {!! Form::close() !!} 

                            @else

                            Alumno Graduado.<br>                                   
                            <img src="{{ asset('img/graduado.jpg') }} "  width="100" height="100"> 

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a class="btn btn-primary" href="matriculas">Volver</a>
                            </div>
                            
                            @endif

                           

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

@endsection

