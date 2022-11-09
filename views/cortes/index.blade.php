@extends('layouts.app')

@section('content')
    <section class="section">

<div class="section-header">
    <h3 class="page__heading">Gestión de Corte Notas {{ session('activo') }}</h3> 
</div>

    <div class="section-body"> 
        <h5><span class="text-light badge badge-primary">Activo</span>
        <span class="text-dark badge badge-light">Inactivo</span></h5>

        <div class="row">              
            <div class="card-body justify-content-center">                               
                             
                <div class="card">                                  		
                    <div class="row w-100">
                                            
                        @forelse ($cortes as $corte)
				
                            @php
                            $texto="text-dark";
                            $badge="badge badge-light";	     
                            @endphp
                                                  
                            @if ($corte->estado=='1')

                            @php 
                            $texto="text-light";
                            $badge="badge badge-primary";	  
                            @endphp	

                            @endif
                                      
                            <div class="col-sm-2"> <!-- col-md-2-->
                                <div class="mx-sm-1 p-1">    
                                    {!! Form::model($corte,['method'=>'PUT','route'=>['cortes.update',$corte->id]]) !!}                   
                                        <div class="p-1" >
                                            <button type="submit" class="btn" style="float:center;"> 
                                                <div class="{{ $texto }} mt-2 {{ $badge }}" title="Activar/Desactivar">
                                                    &nbsp; {{ $corte->nombre }} &nbsp;
                                                </div>   
                                            </button>
                                        </div>                                     
                                      
                                    {!! Form::close() !!}
                                </div>
                            </div>	
                                            
                                        	
                        @endforeach
                     
                    </div><!-- row w-100 -->                                     
                </div><!--card -->                        
            </div><!-- card-body -->                 
        </div> <!-- row -->             
    </div><!-- section body -->
</section>
@endsection
