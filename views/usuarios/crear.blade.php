@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Crear Usuario</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            {!! Form::open(array('route'=>'usuarios.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6"> 
                                    <div class="form-group">
                                        <label for="name">Nombre <b class="text-danger">*</b></label>
                                        {!! Form::text('name',null,array('class'=>'form-control'))  !!}
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail <b class="text-danger">*</b></label>
                                        {!! Form::text('email',null,array('class'=>'form-control'))  !!}
                                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="password">Pasword <b class="text-danger">*</b></label><br>
                                        {!! Form::password('password',array('class'=>'form-control'))  !!}
                                        @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group"> 
                                        <label for="confirm-password">Confirmar Password <b class="text-danger">*</b></label><br>
                                        {!! Form::password('confirm-password',array('class'=>'form-control'))  !!}
                                        @error('confirm-password') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="">Roles <b class="text-danger">*</b></label> 
                                        {!! Form::select('roles',$roles,[],array('class'=>'form-control'))  !!}
                                        @error('roles') <span class="error text-danger">{{ $message }}</span> @enderror
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