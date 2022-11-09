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

                        <div class="card-header">
                            <h4>{{$alumno[0]->cedula}} | {{$alumno[0]->apellidos}} {{$alumno[0]->nombres}}</h4>
                        </div>

                        <div class="card-body"> 

                            {!! Form::open(array('route'=>'matriculas.store','method'=>'POST')) !!}
                            
                           @php
                               if($repite==0){
                                $grado_id=$grado_id+1;
                               }
                           @endphp

                            {!! Form::hidden('anio_id',$anio_activo->id_activo)  !!}                           
                            {!! Form::hidden('alumno_id',$alumno[0]->id)  !!}
                            {!! Form::hidden('repite',$repite)  !!}    
                            {!! Form::hidden('grado_id',$grado_id)  !!}
                            {!! Form::hidden('mat_pend',$reprobadas)  !!}            

                            @if (($grado_id==6) && ($reprobadas<=2))
                                    {!! Form::hidden('seccion_id', 1)  !!}  
                            @endif

                             <strong>Datos: </strong> 
                              @if ($repite==1)
                                 <label>Repitiente</label> |
                             @endif   
                             <label>
                                Año a Cursar: {{ $grado_id.'°' }} | 
                                <i>Posee registro en el periodo escolar anterior.</i>
                            </label>
                             <br>
                             
                             <!--contar_materia: {{-- $contar_materia --}} |
                             contar_notas: {{-- $contar_notas --}} |-->
                             

                             @if ($contar_materia!=$contar_notas)
                             <br>
                                <h4 class="text-primary text-center "> 
                                        <ul class="fas fa-exclamation-circle" style="font-size: 110%;"></ul> 
                                        REVISAR NOTAS DEL PERIODO ANTERIOR
                                </h4>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a class="btn btn-primary" href="matriculas">Volver</a>
                                    </div>

                                @else

                                <div class="row">      

                                


                                @if (($grado_id>5) && ($reprobadas==0))

                                    <br>
                                    <h4 class="text-primary" style="margin-left:auto; margin-right: auto;"> 
                                            <ul class="fas fa-user-graduate" style="font-size: 110%;"></ul> 
                                            ALUMNO GRADUADO
                                    </h4>
                                
                                @elseif(($grado_id>5) && ($reprobadas<=2))
                                <label style="margin-left: 1em;">
                                     <strong>Año a Cursar: </strong> {{ $grado_id-1}}° &nbsp; | &nbsp;
                                     <strong>Reprobadas: </strong> {{ $reprobadas }} &nbsp; | &nbsp;
                                </label>
                               
                                {!! Form::hidden('grado_id',$grado_id-1)  !!}
                                {{-- $docente_pend1[0] --}}
                             
                                @if ($mat_pend1)
                                       {{-- $mat_pend1->id --}} {{ $mat_pend1->abreviado }} {{ $mat_pend1->nota_def }}. &nbsp; | &nbsp;                               
                                        {!! Form::hidden('mat_pend1',$mat_pend1->abreviado)  !!}

                                        @if (!empty($docente_pend1[0]))
                                        {!! Form::hidden('docente_pend1',$docente_pend1[0])  !!}
                                        @endif
                                     
                                @endif  

                                @if ($mat_pend2)
                                        {{-- $mat_pend2->id --}} {{ $mat_pend2->abreviado }} {{ $mat_pend2->nota_def }}                                     
                                        {!! Form::hidden('mat_pend2',$mat_pend2->abreviado)  !!}

                                        @if (!empty($docente_pend2[0]))
                                        {!! Form::hidden('docente_pend2',$docente_pend2[0])  !!}
                                        @endif
                                    
                                @endif

                            @elseif(($grado_id==5)  && ($repite==1))
                            {!! Form::hidden('grado_id',$grado_id)  !!}
                          <!--  grado a cursar:{{--$grado_id --}}<br>  -->

                            @php
                            //echo $aplazadas; 
                            for ($i=0; $i<$reprobadas  ; $i++) { 
                                
                               // echo $aplazadas[$i]->anio_asignatura_id.' | '; 

                                echo '<label style="margin-left: 1.5em;">'.$aplazadas[$i]->abreviado, $aplazadas[$i]->nota_def.'&nbsp;  | </label>';
                                //echo ; 
                                
                               // echo "<input type='hidden' name='anio_asignatura_id' value='$aplazadas.'['.$i.']'>";
                            }                                
                            @endphp 

                            @foreach ($aplazadas as $aplazada)
                                 {!! Form::hidden('anio_asignatura[]',$aplazada->anio_asignatura_id)  !!}
                            @endforeach

                       
                            
                                <div class="form-group" style="margin-top: 2em; margin-left: -20em; width: 20em;">
                                    <label for="seccion_id">Sección:</label>
                                    {!! Form::select('seccion_id',$seccions,[],array('class'=>'form-control seccion_id','id'))  !!}
                                </div>
                          

                            @elseif($grado_id<=5) 
                            
                                <!--grado a cursar:{{-- $grado_id --}}<br> -->

                                {!! Form::hidden('mat_pend',$reprobadas)  !!}                          

                                @if ($mat_pend1)
                                     <strong style="margin-left: 1em;">Materia Pendiente:</strong> {{-- $mat_pend1->id --}} {{ $mat_pend1->abreviado }} &nbsp;
                                      <strong>Nota:</strong> <i>{{ $mat_pend1->nota_def }}.</i>   &nbsp;                                  
                                     {!! Form::hidden('mat_pend1',$mat_pend1->abreviado)  !!}  

                                    @if (!empty($docente_pend1[0]))
                                          {!! Form::hidden('docente_pend1',$docente_pend1[0])  !!}
                                    @endif
                                   

                                @endif  

                                @if ($mat_pend2)
                                     | &nbsp;{{-- $mat_pend2->id --}} {{ $mat_pend2->abreviado }} &nbsp;
                                     <strong>Nota:</strong> <i>{{ $mat_pend2->nota_def }}.</i>                                   
                                     {!! Form::hidden('mat_pend2',$mat_pend2->abreviado)  !!}

                                    @if (!empty($docente_pend2[0]))
                                           {!! Form::hidden('docente_pend2',$docente_pend2[0])  !!}
                                    @endif               
                                @endif

                              </div><!--row-->
                              <br>
                              <div class="form-group" style="width: 20em;">
                                <label for="seccion_id">Sección:</label>
                                {!! Form::select('seccion_id',$seccions,[],array('class'=>'form-control seccion_id','id'))  !!}
                            </div>


                            <strong>Asignaturas de {{ $grado_id.'°'}} año </strong>
                               @foreach ($anio_asignaturas as $anio_asignatura)
                                    <i>| &nbsp;{{$anio_asignatura->abreviado}} {{-- $anio_asignatura->id--}}</i>
                                    {!! Form::hidden('anio_asignatura[]',$anio_asignatura->id)  !!}
                               @endforeach

                            @endif 
                         
                           @if (($grado_id>5) && ($reprobadas==0))
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                <a class="btn btn-primary" href="matriculas">Volver</a>
                                </div>
                                                      
                            @else
                                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:1em;">
                                <button type="submit" class="btn btn-primary">Ratificar</button>
                                </div>
                            @endif
                            @endif
                             {!! Form::close() !!}        
                            </div><!--card-body-->
                        </div><!--card-->     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

