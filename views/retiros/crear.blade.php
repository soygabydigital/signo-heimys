@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Retiro de Matricula &#160; {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="display: inline-block; width: 35rem; ">
                                @if (session()->has('message'))
                                <div class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                                @endif
                              </div>
                            
                                {!! Form::open(array('route'=>'retiros.store','method'=>'POST')) !!}
                                  
                                        {!! Form::hidden('user_id',$user->id)  !!}  
                                        {!! Form::hidden('matricula_id',$matricula_id)  !!}  

                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="fecha_retiro">Fecha de Retiro<b class="text-danger">*</b></label>
                                                    {!! Form::date('fecha_retiro',null,array('class'=>'form-control'))  !!}
                                                    @error('fecha_retiro') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="motivo">Motivo <b class="text-danger">*</b></label>
                                                    {!! Form::text('motivo',null,array('class'=>'form-control'))  !!}
                                                    @error('motivo') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="botones">Retirar</button>
                                  
                                    {!! Form::close() !!}  
 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection