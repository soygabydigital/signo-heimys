@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
@php
	use Carbon\Carbon;
@endphp

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Cargar Notas &#160; {{ session('activo') }}</h4>
			</div>
			
			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
				@endif
			
				
			</div>

			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="notas" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>
											<th>Id</th>									
											<th>Cédula</th>
											<th>Apellidos</th>								
											<th>Nombres</th>								
											<th class="text-center">Gen</th>
											<th class="text-center">Edad</th>
								
											<th class="text-center">Sección</th>

											<th class="text-center">Asignatura</th>
											<th class="text-center">Mom 1</th>
											<th class="text-center">Mom 2</th>
											<th class="text-center">Mom 3</th>
											<th class="text-center">Def</th>
										
											<th class="text-center">Acción</th>
										</tr>
									</thead>

									<tbody>
										@php
											$cont=0;
										@endphp

                                    {!! Form::model($notas,['method'=>'PUT','route'=>['notas.cargar',$notas]]) !!}

									@foreach($notas as $nota)
									@php								
    								$edad = Carbon::parse($nota->matricula->alumno->fecha_nacimiento)->age;
									
   									$cont=$cont+1;
									//$promedio=number_format((($nota->nota1+$nota->nota2+$nota->nota3)/3),2); 
									$formato_promedio="text-primary";
									if ($nota->nota_def<9.5){
									$formato_promedio="text-danger";     
									} 
									if($nota->nota_def==0){
									$nota->nota_def='';
									}
									@endphp
									

										<tr>	
											<td >{{ $cont }}</td> 									
											<td >{{ $nota->matricula->alumno->cedula }}</td> 
											<td>{{ $nota->matricula->alumno->apellidos }}</td>
											<td>{{ $nota->matricula->alumno->nombres }}</td>
											
												<td class="text-center text-body">          
												@if ($nota->matricula->alumno->genero=='M')
												  <span class="badge rounded-pill" style="background-color: #91c9f2;">M</span>   
												@else
												  <span class="badge rounded-pill" style="background-color: #ddb5eb;">F</span>
												@endif        
											 </td>

											<td class="text-center">{{ $edad }}</td>
											<td>{{ $nota->matricula->grado->nombre_grado }} {{ $nota->matricula->seccion->nombre_seccion }}</td>
											 

											@if (($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') && (isset($nota->matricula->grupo_id)))             
											<td>{{ $nota->anioasignatura->asignatura->abreviado }}
											<br> {{ $nota->matricula->grupo->nombre }}</td>
									 		@else
											<td>{{ $nota->anioasignatura->asignatura->abreviado }}
												@if (!empty($nota->anioasignatura->docente_id))	
												<br>{{ $nota->anioasignatura->docente->nombre_docente }}											
												@endif
																	
											</td> 
									  		@endif      
                                            							
                                              <td class="text-center"> 
                                                @if ($corte[0]->estado==1)
                                                  <input name="nota1" class="form-control" style="font-size:95%;" value="{{old('nota1',$nota->nota1)}}">
                                                   {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}        
                                                @else
                                                 <input type="hidden" name="nota1" value="{{ $nota->nota1 }}">
                                                  {{ $nota->nota1 }}           
                                                @endif
                                               </td> 

                                               <td class="text-center"> 
                                                @if ($corte[0]->estado==1)
                                                  <input name="nota1" class="form-control" style="font-size:95%;" value="{{old('nota1',$nota->nota1)}}">
                                                   {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}        
                                                @else
                                                 <input type="hidden" name="nota1" value="{{ $nota->nota1 }}">
                                                  {{ $nota->nota1 }}           
                                                @endif
                                               </td> 

                                               <td class="text-center"> 
                                                @if ($corte[0]->estado==1)
                                                  <input name="nota1" class="form-control" style="font-size:95%;" value="{{old('nota1',$nota->nota1)}}">
                                                   {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}        
                                                @else
                                                 <input type="hidden" name="nota1" value="{{ $nota->nota1 }}">
                                                  {{ $nota->nota1 }}           
                                                @endif
                                               </td> 
											
											<td class="text-center {{ $formato_promedio }}">{{ $nota->nota_def }} </td>
										
											<td width="90" class="text-center">
											
											</td>
										</tr>
										@endforeach
										<div>															
                                            <a class="btn btn-outline-primary btn-sm" title="Aceptar Todas las Notas" href="{{ route('notas.',$nota->nota_id) }}">
                                            <i class="fa fa-edit fa-sm" aria-hidden="true"></i> Aceptar</a>  
                                                        
                                        </div>
                                        {!! Form::close() !!}
									</tbody>
 
								</table>
							</div><!--table-responsive-->
						</div><!--card-body-->
					</div><!--card-->
				</div><!--col-lg-12-->
			</div><!--row-->	
		</div><!-- section body -->



	    </section>	

		@section('datatable_js')
		<script type="text/javascript" src="{{ asset('assets/Datatables/jquery.dataTables.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/Datatables/dataTables.bootstrap5.min.js') }}"></script>

		<script>
		$(document).ready(function () { 
			$('#notas').DataTable();
		});
		</script>
		@endsection

@endsection 
