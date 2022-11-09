@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva Matrícula {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-body">
                         
                            @if ($errors->any())
                            <div style="width: 100%;" class="alert alert-light alert-dismissible fade show" role="alert">
                            <strong>Revise los campos</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-primary">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div> 
                            @endif

                            {!! Form::open(array('route'=>'matriculas.store','method'=>'POST')) !!}

                            {!! Form::hidden('anio_id',$anio_activo->id_activo)  !!} 
                            {!! Form::hidden('grado_id',$asign[0]->grado_id+1)  !!}                           
                            {!! Form::hidden('grupo_id',null)  !!} 
                            {!! Form::hidden('alumno_id',$alumno[0]->id)  !!} 

                            <div class="card">

                                <div class="card-header">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="col-xs-12 col-sm-12 col-md-12" style="font-size:85%;">
                                        <h4>
                                        {{ $alumno[0]->cedula }} | {{ $alumno[0]->apellidos }} {{ $alumno[0]->nombres }}
                                        <p> Ratificar Inscripcion para {{ ($asign[0]->grado_id+1) }} año</p>
                                        </h4>

                                    @if (($reprobadas==1) | ($reprobadas==2))
                                        <div class="col-xs-6 col-sm-6 col-md-6">                                       
                                            <label for="mat_pend1">Materia Pendiente 1=></label>
                                            <label for="" class="text-danger">{{ $asign[0]->abreviado}}</label> 
                                           {!! Form::hidden('mat_pend1',$asign[0]->anio_asignatura_id)  !!}
                                        </div>
                                    @endif
                                    
                                    @if ($reprobadas==2) 
                                        <div class="col-xs-6 col-sm-6 col-md-6">                                       
                                            <label for="mat_pend2">Materia Pendiente 2=></label>
                                            <label for="" class="text-danger">{{ $asign[1]->abreviado}}</label>  
                                            {!! Form::hidden('mat_pend2',$asign[1]->anio_asignatura_id)  !!}
                                        </div>
                                    @endif 

                                        </div>
                                    </div>                                    
                                </div>                               
                            </div> <!--card-->

                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="seccion_id">Sección:</label>
                                            {!! Form::select('seccion_id',$seccions,[],array('class'=>'form-control seccion_id','id'))  !!}
                                        </div>
                                    </div> 

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="grupo_estable_id">Grupo Estable:</label>
                                            {!! Form::select('grupo_estable_id',$grupos,null,array('class'=>'form-control','placeholder'=>'Agregue grupo estable...'))  !!}
                                        </div>                                        
                                    </div> 
                                    
                                  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    {!! Form::submit('Ratificar', $attributes = ['class'=>'button btn btn-primary']) !!}
                                    </div>

                                </div>
                            {!! Form::close() !!}

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

