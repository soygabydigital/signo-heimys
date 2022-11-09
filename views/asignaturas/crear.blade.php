@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nueva Asignatura {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-body">

                            {!! Form::open(array('route'=>'asignaturas.store','method'=>'POST')) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="grado_id">Año <b class="text-danger">*</b></label>
                                            {!! Form::select('grado_id',$grados,[],array('class'=>'form-control grado_id','id','placeholder'=>'Seleccionar grado...'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group"> 
                                            <label for="abreviado">Abreviado <b class="text-danger">*</b></label>
                                            {!! Form::text('abreviado',null,array('class'=>'form-control'))  !!}
                                            @error('abreviado') <span class="error text-danger">{{ $message }}</span> @enderror        
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre <b class="text-danger">*</b></label>
                                            {!! Form::text('nombre',null,array('class'=>'form-control'))  !!}
                                            @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror        
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Tipo de Calificación</label>
                                            <select name="calificacion_tipo" class="form-control">                      
                                                <option value="numerica">Numérica</option>
                                                <option value="literal">Literal</option>           
                                              </select>       
                                        </div>
                                    </div>

                                    {!! Form::hidden('estado','1')  !!} 

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        {!! Form::submit('Guardar', $attributes = ['class'=>'button btn btn-primary']) !!}
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

