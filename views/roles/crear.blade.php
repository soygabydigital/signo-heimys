@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Crear Rol</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            

                            {!! Form::open(array('route'=>'roles.store','method'=>'POST')) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del rol <b class="text-danger">*</b></label>
                                        {!! Form::text('name',null,array('class'=>'form-control'))  !!}
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Permisos para este rol <b class="text-danger">*</b></label>
                                        <br/>

                                        @foreach ($permission as $value)
                                            <label>
                                                {!! Form::checkbox('permission[]',$value->id,false,array('class'=>'name'))  !!}
                                                {{ $value->name }} 
                                             </label>       <br>
                                         @endforeach
                                         @error('permission') <span class="error text-danger">{{ $message }}</span> @enderror

                                    </div>  

                                   </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                        {!! Form::submit('Guardar', $attributes = ['class'=>'button btn btn-primary']) !!}
                                    </div>

                             </div>   
                            {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection