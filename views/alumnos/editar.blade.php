@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Alumno {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                           
                            {!! Form::model($alumno,['method'=>'PUT','route'=>['alumnos.update',$alumno->id]]) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="cedula">Cédula <b class="text-danger">*</b></label>
                                            {!! Form::text('cedula',null,array('class'=>'form-control'))  !!}
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
                                            @error('lugar_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            {!! Form::text('telefono',null,array('class'=>'form-control'))  !!}
                                            @error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            {!! Form::email('correo',null,array('class'=>'form-control'))  !!}
                                            @error('correo') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="direccion">Direccián</label>
                                            {!! Form::text('direccion',null,array('class'=>'form-control'))  !!}
                                            @error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror 
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
                                            @error('cedula_rep') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="telefono_rep">Teléfono del Representante</label>
                                            {!! Form::text('telefono_rep',null,array('class'=>'form-control'))  !!}
                                            @error('telefono_rep') <span class="error text-danger">{{ $message }}</span> @enderror 
                                        </div>
                                    </div>

                                    @isset($alumno->id)
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="estado">Condición</label>
                                            <select name="estado" class="form-control">                      
                                                <option value="1" {{old('estado',$alumno->estado)=="1" ? 'selected' : ''}}>Activo</option>
                                                <option value="0" {{old('estado',$alumno->estado)=="0" ? 'selected' : ''}}>Inactivo</option>           
                                              </select>
                                        </div>
                                    </div>
                                    @endisset

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        {!! Form::submit('Editar', $attributes = ['class'=>'button btn btn-primary']) !!}
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

