@php
use Carbon\Carbon;    
@endphp

@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Registro de Alumnos &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
				@can('crear-alumno')
				<div class="col-2" style="float: left;">					

					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="alumnos/create" title="Nuevo Alumno">
						<i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>							
				</div>                             
			  	@endcan			 
			</div>

			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="alumnos" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>									
											<th>Cédula</th>
											<th>Apellidos</th>								
											<th>Nombres</th>								
											<th class="text-center">Género</th>
											<th class="text-center">F. Nacimiento</th>
											<th class="text-center">Edad</th>
											<th class="text-center">Teléfono</th>							
											<th class="text-center">Condición</th>
											<th class="text-center">Acción</th>
										</tr>
									</thead>

									<tbody>
			
									@foreach($alumnos as $alumno)

									@php
									$edad = Carbon::parse($alumno->fecha_nacimiento)->age;
									@endphp

										<tr>											
											<td>{{ $alumno->cedula }}</td>
											<td>{{ $alumno->apellidos }}</td>								
											<td>{{ $alumno->nombres }}</td>


											<td class="text-center text-body">          
												@if ($alumno->genero=='M')
												  <span class="badge rounded-pill" style="background-color: #91c9f2;">M</span>   
												@else
												  <span class="badge rounded-pill" style="background-color: #ddb5eb;">F</span>
												@endif        
											 </td>

											<td class="text-center">{{ $alumno->fecha_nacimiento }}</td>

											@if ($edad<1)
												<td></td>
											@else
												<td class="text-center">{{ $edad }}</td>
											@endif											

											<td class="text-center">{{ $alumno->telefono }}</td>	
										
											<td class="text-center text-body" style="font-size:85%;">          
												@if ($alumno->estado==1)
												  <span class="badge rounded-pill  bg-primary text-light">Activo</span>   
												@else
												  <span class="badge rounded-pill  bg-secondary">Inactivo</span>
												@endif        
											 </td>
										
											<td width="90" class="text-center">
											<div>
												@can('editar-alumno')  								
												<!--<a class="btn btn-outline-primary btn-sm" title="Editar Alumno" href="{{-- route('alumnos.edit',$alumno->id)--}}">
													<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</a>  -->

													<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Accion
													  </button>
													  <div class="dropdown-menu">														
														<a class="dropdown-item text-primary" href="{{ route('alumnos.edit',$alumno->id) }}">Editar</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item" href="{{ route('historial', $alumno->id) }}">Historial de Notas</a>
													  </div>
												@endcan								
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
			$('#alumnos').DataTable();
		});
		</script>
		@endsection

@endsection 





