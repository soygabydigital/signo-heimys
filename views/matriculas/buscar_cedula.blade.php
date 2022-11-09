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
                        <div class="card-body">

                            {!! Form::open(array('route'=>'inscribir')) !!}
                            @method('GET')   
                            
                            {!! Form::hidden('anio_id',$anio_activo->id_activo)  !!}

                            <div class="row">

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="alumno_id">Estudiante: <b class="text-danger">*</b></label>
                                        {!! Form::text('alumno_id',null,array('class'=>'form-control','placeholder'=>'ingrese cedula...')) !!}
                                        {!!$errors->first('alumno_id','<small style="color:red;">:message</small><br>')!!} 
                                    </div>
                                </div>   

                              </div><!--row-->
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

