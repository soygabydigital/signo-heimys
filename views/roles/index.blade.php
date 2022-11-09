@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Roles</h4>
        </div>

        <div style="display: inline-block; width: 35rem; ">
            @if (session()->has('message'))
            <div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
            @endif			
        <br><br>
          
            @can('crear-rol')
            <div class="col-2" style="float: left;">
                <a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="{{ route('roles.create')}}" title="Nuevo Grupo">
                    <i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>							
            </div>                             
              @endcan	<br><br>
        	 
        </div>

        <div class="section-body"> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">              
                        <div class="card-body">


                       <table style="width: 100%;" class="table-sm table-striped mt-2 text-center">
                        <thead style="background-color: #6777ef;">                         
                            <th style="color:#fff;">Rol</th>
                            <th style="color:#fff;">Acciones</th>                          
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>                               
                                <td> {{ $role->name }} </td>
                                <td>
                                @can('editar-rol')
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id)}}">Editar</a>
                                @endcan

                                @can('borrar-rol')
                                {!! Form::open(['method'=>'DELETE','route'=>['roles.destroy',$role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Borrar',['class'=>'btn btn-secondary']) !!}
                                {!! Form::close() !!}
                                @endcan                            
                              
                                </td>
                             
                            </tr>                                        
                            @endforeach
                        </tbody>
                    </table>

                    <div class="pagination justify-content-end">
                        {!! $roles->links() !!}
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
