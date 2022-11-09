@extends('layouts.app')

@section('content')
    <section class="section">
@php
    if($repite==0){
        $repitiente='No';
    }else{
        $repitiente="Si";
    }
@endphp


        <div class="section-header">
            <h1>Inscribir Matrícula {{ session('activo') }}</h1>            
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
                                <label>Año a Cursar:{{ $grado_id.'°' }} </label> | 
                                <label>Repitiente: {{ $repitiente }} </label> |
                                <i>No posee registro en el periodo escolar anterior.</i>
                            </div><br>

                            {!! Form::open(array('route'=>'matriculas.store','method'=>'POST')) !!}
                            
                            {!! Form::hidden('anio_id',$anio_id)  !!}
                            {!! Form::hidden('alumno_id',$alumno[0]->id)  !!}
                            {!! Form::hidden('grado_id',$grado_id)  !!}                          
                            {!! Form::hidden('repite',$repite)  !!}
                            {!! Form::hidden('mat_pend',$mat_pend)  !!}

                            <div class="row">
                                
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Estatus</label>         
                                        {!! Form::select('estatus', ['Ingreso' => 'Ingreso', 'Equivalencia' => 'Equivalencia'], null,array('class'=>'form-control','placeholder'=>'Seleccionar Estatus...')) !!}
                                    </div>
                                </div>   
                                
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="fecha_estatus">Fecha Estatus:</label>
                                        {!! Form::date('fecha_estatus',null,array('class'=>'form-control'))  !!}
                                    </div>
                                </div>                               
                                                            

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="seccion_id">Sección:</label>
                                        {!! Form::select('seccion_id',$seccions,[],array('class'=>'form-control seccion_id','id'))  !!}
                                    </div>
                                </div>
                               
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="grupo_estable_id">Grupo Estable:</label>
                                        {!! Form::select('grupo_estable_id',$grupoestables,null,array('class'=>'form-control','placeholder'=>'Agregue grupo estable...'))  !!}
                                    </div>                                        
                                </div> 

                              @if (($mat_pend==1) | ($mat_pend==2))
                                  <div class="col-xs-4 col-sm-4 col-md-4">   
                                    <div class="form-group">                                    
                                        <label for="mat_pend1">Materia Pendiente 1 ({{ ($grado_id-1) }}º año)</label>
                                        <select name="mat_pend1" id="mat_pend1" class="form-control">
                                            <option value="">Materia Pendiente 1 </option>
                                            @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura->abreviado }}">{{ $asignatura->abreviado }}
                                            @endforeach                                         
                                            </option>   
                                        </select>                                     
                                       
                                    </div>
                                </div>  
                              @endif
                                  
                              @if ($mat_pend==2)
                                   <div class="col-xs-4 col-sm-4 col-md-4">   
                                    <div class="form-group">                                    
                                        <label for="mat_pend2">Materia Pendiente 2 ({{ ($grado_id-1) }}º año)</label>                                         
                                        <select name="mat_pend2" id="mat_pend2" class="form-control">
                                            <option value="">Materia Pendiente 2</option>
                                            @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura->abreviado }}">{{ $asignatura->abreviado }}
                                            @endforeach                                         
                                            </option>   
                                        </select>        
                                    </div>
                                </div>     
                              @endif
                                
                                
                                  

                              </div><!--row-->

                              <div>
                                <div class="form-group"> 
                                    <label for="anio_asignaturas">Asignaturas del Año a Cursar:</label>
                                    <br/>   <br>  
                                         <div class="form-check form-check-inline" >                                  
                                    @foreach ($anio_asignaturas as $anio_asignatura)     
                                    <label style="padding-left: 1.2em;"> 
                                             {!! Form::checkbox('anio_asignatura[]',$anio_asignatura->id,true,array('class'=>'id')) !!}                         
                                        {{ $anio_asignatura->abreviado }}  
                                    </label>                                       
                                    
                                    @endforeach 
                                    </div>
                                    <br/>
                            </div>
                            </div><!--card-body-->
                         </div><!--card-->


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </div>

                            {!! Form::close() !!}

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

@endsection

