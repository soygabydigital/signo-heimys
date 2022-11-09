@extends('layouts.app')

@section('content')
    <section class="section">

        <div class="section-body"> 
            
             @if ($anio_activo)  
            <div class="section-header">
            <h3 class="page__heading">Activar Periodo Escolar {{ session('activo') }}</h3> 
            </div>     
            
             @else
             <div class="section-header"></div>
             @endif

             <h5><span class="text-light badge badge-primary">Activo</span>
                <span class="text-dark badge badge-light">Inactivo</span></h5>
                
            <div class="row">          
           
                        <div class="card-body justify-content-center">                               
                                    
                                <div class="card"> 
                                    <div class="{{$formato}}" role="alert">{{$mensaje}}</div>				
                                        <div class="row w-100">

                                        @foreach ($anios as $anio) 
                                        @if ($anio->id!=1)	
                                        @php
                                        $texto=" text-center text-dark";	
                                        $badge="badge badge-light";	                                                
                                        @endphp
                                                
                                        @if ($anio->numero==$anio_activo->numero)
                                        @php
                                        $texto="text-center text-white";
                                        $badge="badge badge-primary";                                              
                                        @endphp
                                        
                                        @endif
                                            <div class="col-sm-2"> <!-- col-md-2-->
                                                <div class="mx-sm-1 p-1">    
                                                     {!! Form::model($anio,['method'=>'PUT','route'=>['anios.update',$anio->id]]) !!}                   
                                                    <div class="p-1" >
                                                        <button type="submit"  class="btn" style="float:center;"> 
                                                        <div class="{{$texto}} mt-2 {{ $badge }}" title="Activar/Desactivar">{{$anio->numero}}</div>   
                                                        </button>
                                                    </div>

                                                     {!! Form::close() !!}
        
                                                </div>
                                            </div>	
                                            
                                        @endif		
                                        @endforeach	
                                         
                                      
                                                                
                                            </div><!-- row w-100 -->                                     
                                </div><!--card -->                        
                      </div><!-- card-body -->    
                        
            </div> <!-- row -->    
                 
        </div><!-- section body -->
    </section>
@endsection
