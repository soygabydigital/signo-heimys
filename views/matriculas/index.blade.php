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
				<h4 class="page__heading">Matrículas &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
			
			@if ($fuera_fecha==0)
			@role('Super Admin|Admin')
				<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="matriculas/create" title="Nueva Matricula">
						<i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>							
				</div>                             
			@endrole
			@endif
				
			</div>	
			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="matriculas" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>										
											<th>Cedula</th>
											<th>Apellidos</th>								
											<th>Nombres</th>								
											<th class="text-center">Gen</th>
											<th class="text-center">Edad</th>
								
											<th class="text-center">Sección</th>
											<th class="text-center">Grupo</th>

											<th class="text-center">Estatus</th>
											<th class="text-center">Repite</th>
											<th class="text-center">Pendiente</th>										
										
											<th class="text-center">Acci&oacute;n</th>
										</tr>
									</thead>

									<tbody>
			
									@foreach($matriculas as $matricula)
									@php	
									  	$fecha_actual = Carbon::now(); 
										$nacimiento= new DateTime($matricula->alumno->fecha_nacimiento);            						      
										$fecha_final= new DateTime('31-07-'.substr($anio_activo->numero,-4));
            							$resta = $fecha_final->diff($fecha_actual);
										
										//dd($resta->invert);
										if ($resta->invert==0) {
										// * * *  Periodo Escolar Terminado * * *
										$edad = $fecha_final->diff($nacimiento)->format("%y");
										//echo 'se acabo el año';
										}else{
										// * * * Periodo Escolar Vigente * * *
										$edad = $fecha_actual->diff($nacimiento)->format("%y");
										//echo 'dentro del periodo escolar';
										}
									
									@endphp

										<tr>											
											<td >{{ $matricula->alumno->cedula }}</td> 
											<td>{{ $matricula->alumno->apellidos }}</td>
											<td>{{ $matricula->alumno->nombres }}</td>	
											
												<td class="text-center text-body">          
												@if ($matricula->alumno->genero=='M')
												  <span class="badge rounded-pill" style="background-color: #91c9f2;">M</span>   
												@else
												  <span class="badge rounded-pill" style="background-color: #ddb5eb;">F</span>
												@endif        
											 </td>

											 @if (($edad<10 ) | ($edad>20))
												 <td class="text-center text-danger">{{ $edad }}</td>
											 @else
											 	<td class="text-center">{{ $edad }}</td>
											 @endif
											
											 
											@if (!empty($matricula->seccion->nombre_seccion))
											<td class="text-center">{{ $matricula->grado->nombre_grado }} {{ $matricula->seccion->nombre_seccion }}</td>			
											@else
													<td class="text-center">{{ $matricula->grado->nombre_grado }} </td>								
											@endif

											@if (!empty($matricula->grupo_estable->nombre))
												<td>{{ $matricula->grupo_estable->nombre }}</td>
											@else
												<td></td>
											@endif	
			
											<td class="text-center text-body" style="font-size:85%;">          
												@if ($matricula->estatus=="Ingreso") 
												  <span class="badge rounded-pill bg-primary text-light" style="font-size:90%;">Ingreso</span><br><span style="font-size:75%;">{{ $matricula->fecha_estatus }}</span>   
												@elseif($matricula->estatus=="Egreso")
												  <span class="badge rounded-pill bg-secondary text-dark" style="font-size:90%;">Egreso </span><br><span style="font-size:75%;">{{ $matricula->fecha_estatus }}</span>
												  @elseif($matricula->estatus=="Equivalencia")
												  <span class="badge rounded-pill" style="font-size:90%; background-color: #91c9f2;">Equivalencia</span><br><span style="font-size:75%;">{{ $matricula->fecha_estatus }}</span>
												@endif        
											 </td>     
									
											 @if ($matricula->repite==1)
												<td class="text-center"><i class="fas fa-check text-primary"></i> </td>   
											 @else
												<td class="text-center"></td>   
											 @endif 
										

											 @php
												 $igual ='';
												 if ((!empty($matricula->pendientes[0]->materia)) && (!empty($matricula->pendientes[1]->materia))){		
												 if($matricula->pendientes[0]->materia==$matricula->pendientes[1]->materia){
													$igual='(ojo)';
													
												 }
												}
											 @endphp
										
 											<td class="text-center">
											@if (!empty($matricula->pendientes[0]->materia))											
												<a href="{{ route('pendientes.edit',$matricula->pendientes[0]->id)}}"> {{ $matricula->pendientes[0]->materia }}</a>
											<br>									
											@endif

											@if (!empty($matricula->pendientes[1]->materia))
												<a href="{{ route('pendientes.edit',$matricula->pendientes[1]->id)}}"> {{ $matricula->pendientes[1]->materia }}</i></a>	 
											
											@endif																			
											</td>
										
											<td width="90" class="text-center">
											<div>
												@if ($fuera_fecha==0)
												@role('Super Admin|Admin|docente')  								
												<!--<a class="btn btn-outline-primary btn-sm" title="Editar Matricula" href="{{-- route('matriculas.edit',$matricula->id) --}}">
													<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</a>  -->

													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Accion
													  </button>
													  <div class="dropdown-menu">														
														<a class="dropdown-item text-primary" href="{{ route('matriculas.edit',$matricula->id) }}">Editar</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="{{ route('constancia', $matricula->id) }}">Constancia de Estudios</a>
														<a class="dropdown-item" href="{{ route('inscripcion', $matricula->id) }}">Constancia de Inscripción</a>
														<a class="dropdown-item" href="{{ route('boletin', $matricula->id) }}">Boletín Informativo</a>
														<!--<a class="dropdown-item" href="{{-- route('historial', $matricula->id) --}}">Historial de Notas</a>-->
													  </div>
												@endrole
												@endif							
											</div>
											</td>
										</tr>
										@endforeach
										
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
			$('#matriculas').DataTable();
		});
		</script>
		@endsection

@endsection 

