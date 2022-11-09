@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Docente {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-body">
                            
                            {!! Form::model($docente,['method'=>'PUT','route'=>['docentes.update',$docente->id]]) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="nombre_docente">Nombre Completo <b class="text-danger">*</b></label>
                                            {!! Form::text('nombre_docente',null,array('class'=>'form-control'))  !!}
                                            @error('nombre_docente') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="especialidad">Especialidad</label>
                                            {!! Form::text('especialidad',null,array('class'=>'form-control'))  !!}
                                            @error('especialidad') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="telefonos">Teléfonos</label>
                                            {!! Form::text('telefonos',null,array('class'=>'form-control'))  !!}
                                            @error('telefonos') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div> 

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo</label>
                                            {!! Form::email('correo',null,array('class'=>'form-control'))  !!}
                                            @error('correo') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
 
                                    @isset($docente->id)
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="estado">Condición</label>
                                            <select name="estado" class="form-control">                      
                                                <option value="1" {{old('estado',$docente->estado)=="1" ? 'selected' : ''}}>Activo</option>
                                                <option value="0" {{old('estado',$docente->estado)=="0" ? 'selected' : ''}}>Inactivo</option>           
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

