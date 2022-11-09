@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h4 class="page__heading">Usuarios</h4>
        </div>

        <div style="display: inline-block; width: 35rem; ">
            @if (session()->has('message'))
            <div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
            @endif			
        <br><br>
          
            @can('crear-user')
            <div class="col-2" style="float: left;">
                <a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="{{ route('usuarios.create')}}" title="Nuevo Grupo">
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
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">E-mail</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th> 
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td style="display: none"> {{ $usuario->id }} </td>
                                        <td> {{ $usuario->name }} </td>
                                        <td> {{ $usuario->email }} </td>

                                        <td>
                                            @if (!empty($usuario->getRoleNames()))
                                                @foreach ($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-primary"> {{ $rolName }} </span></h5>
                                                @endforeach                                                
                                            @endif
                                        </td>

                                        <td>
                                             @if ($usuario->id!=1)
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>                                            
                                            {!! Form::open(['method'=>'DELETE','route'=>['usuarios.destroy',$usuario->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class'=>'btn btn-secondary']) !!}   
                                            @endif                                      
                                         

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>                                        
                                    @endforeach
                                </tbody>
                            </table>

                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
@endsection
