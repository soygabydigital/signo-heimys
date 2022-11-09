@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Matrícula {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>
                            {{ $matricula->alumno->cedula }} |
                            {{ $matricula->alumno->apellidos }} 
                            {{ $matricula->alumno->nombres }} 
                        </h4>
                        </div>

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

                            {!! Form::model($matricula,['method'=>'PUT','route'=>['matriculas.update',$matricula->id]]) !!}
                            
                                <div class="row">

                                 
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="grado_id_id">Año:</label>                                           
                                            {!! Form::select('grado_id',$grados,null,array('class'=>'form-control grado_id','id'))  !!}
                                        </div>
                                    </div>     
                                    
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="seccion_id">Sección:</label>
                                            {!! Form::select('seccion_id',$seccions,null,array('class'=>'form-control seccion_id','id'))  !!}
                                        </div>
                                    </div>        

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <label for="repite">Repitiente:</label>
                                            {!! Form::select('repite', ['0' => 'No', '1' => 'Si'], null,array('class'=>'form-control')) !!}
                                           
                                        </div>
                                    </div>      

                                 
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="grupo_estable_id">Grupo Estable:</label>
                                        {!! Form::select('grupo_estable_id',$grupos,null,array('class'=>'form-control','placeholder'=>'Agregue grupo estable...'))  !!}
                                    </div>                                        
                                    </div> 

                                    @if ($matricula->grado->id!=1)
                             
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">                

                                            <label for="mat_pend1">Materia Pendiente 1</label>        
                                        @if ((!empty($pendientes[0])))
                                            {{ $pendientes[0]->materia }} {{ $pendientes[0]->id}}
                                            {!! Form::hidden('mat_pend11',$pendientes[0]->materia)  !!} 
                                              
                                            {!! Form::hidden('pendiente_id1',$pendientes[0]->id)  !!}  
                                              
                                           {{ $pendientes[0]->id }}
                                        @endif                                       
                                        {!! Form::select('mat_pend1',$asignaturas,null,array('class'=>'form-control','placeholder'=>'Ninguna '))  !!}
                                      
                                    </div>
                                    </div> 
                               
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="mat_pend2">Materia Pendiente 2</label>
                                        @if (!empty($pendientes[1]))
                                            {{ $pendientes[1]->materia }} {{ $pendientes[1]->id}}
                                            {!! Form::hidden('mat_pend22',$pendientes[1]->materia)  !!}  

                                            {!! Form::hidden('pendiente_id2',$pendientes[1]->id)  !!} 
                                            
                                            {{ $pendientes[1]->id }} 
                                        @endif
                                    
                                      
                                       
                                        {!! Form::select('mat_pend2',$asignaturas,null,array('class'=>'form-control','placeholder'=>'Ninguna '))  !!}
                                    </div>
                                    </div>           
                                    
                                @endif  
                                    
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
                                  
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    {!! Form::submit('Guardar', $attributes = ['class'=>'button btn btn-primary']) !!}

                                       <a href="{{ route('retirar', $matricula->id) }}" class="button btn btn-light" >Retirar</a>
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

