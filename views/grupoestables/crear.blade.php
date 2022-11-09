@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nuevo Grupo Estable {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-body">
                         
                           
 
                            {!! Form::open(array('route'=>'grupoestables.store','method'=>'POST')) !!}
                                <div class="row">

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Grupo <b class="text-danger">*</b></label>
                                            {!! Form::text('nombre',null,array('class'=>'form-control'))  !!}
                                            @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror        
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4"> 
                                        <div class="form-group">
                                            <label for="descripcion">Breve descripción <b class="text-danger">*</b></label>
                                            {!! Form::text('descripcion',null,array('class'=>'form-control'))  !!}
                                            @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror        
                                        </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="docente_id">Docente</label> 
                                            {!! Form::select('docente_id',$docentes,[],array('class'=>'form-control docente_id','id','placeholder'=>'Seleccionar docente.'))  !!}
                                        </div>
                                    </div>
                                
                                            {!! Form::hidden('anio_id',$anio_activo->id_activo,array('class'=>'form-control'))  !!}


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

