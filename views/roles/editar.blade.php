@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Editar Rol</h4>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {!! Form::model($role,['method'=>'PUT','route'=>['roles.update',$role->id]]) !!}
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
                                        <label for="email">Permisos para este rol <b class="text-danger">*</b></label>
                                        <br/>
                                        @foreach ($permission as $value)
                                          <label>
                                             {!! Form::checkbox('permission[]',$value->id,in_array($value->id, $rolePermissions))  !!}
                                          {{ $value->name }}</label>
                                        <br/>
                                        @endforeach
                                        @error('permission') <span class="error text-danger">{{ $message }}</span> @enderror
                                       
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