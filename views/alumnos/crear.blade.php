@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nuevo Alumno {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body"> 

                            {!! Form::open(array('route'=>'alumnos.store','method'=>'POST')) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cedula">Cedula <b class="text-danger">*</b> </label>
                                            {!! Form::text('cedula',$cedula,array('class'=>'form-control'))  !!}
                                            @error('cedula') <span class="error text-danger">{{ $message }}</span> @enderror            
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos <b class="text-danger">*</b></label>
                                            {!! Form::text('apellidos',null,array('class'=>'form-control'))  !!}
                                            @error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="nombres">Nombres <b class="text-danger">*</b></label>
                                            {!! Form::text('nombres',null,array('class'=>'form-control'))  !!}
                                            @error('nombres') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>                                   

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Género</label> 
                                            <select name="genero"  class="form-control" selected="selected">        
                                              <option value="M" class="form-control">Masculino</option>
                                              <option value="F" class="form-control">Femenino</option>
                                            </select>                                         
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                            {!! Form::date('fecha_nacimiento',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                                            {!! Form::text('lugar_nacimiento',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            {!! Form::text('telefono',null,array('class'=>'form-control'))  !!}
                                            @error('telefonos') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            {!! Form::text('correo',null,array('class'=>'form-control'))  !!}
                                            @error('correo') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            {!! Form::text('direccion',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="representante">Nombre del Representante</label>
                                            {!! Form::text('representante',null,array('class'=>'form-control'))  !!}
                                            @error('representante') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cedula_rep">Cédula del Representante</label>
                                            {!! Form::text('cedula_rep',null,array('class'=>'form-control'))  !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="telefono_rep">Teléfono del Representante</label>
                                            {!! Form::text('telefono_rep',null,array('class'=>'form-control'))  !!}
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

