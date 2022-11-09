@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Asignatura {{ session('activo') }} </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-header">
                            <h4>
                                {{ $anio_asignatura->asignatura->nombre }}
                                ({{ $anio_asignatura->asignatura->abreviado }})
                                {{ $anio_asignatura->asignatura->grado_id }}  año.
                            </h4> 
                        </div>

                        <div class="card-body">      

                            
                            
                            {!! Form::model($anio_asignatura,['method'=>'PUT','route'=>['anio_asignaturas.update',$anio_asignatura->id]]) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="docente_id">Nombre del Docente:</label>
                                            {!! Form::select('docente_id',$docentes,null,array('class'=>' form-control docente_id','id'))  !!}
                                        </div>
                                    </div>                               

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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

