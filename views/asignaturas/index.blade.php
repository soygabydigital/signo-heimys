@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Registro de Asignaturas &#160; {{ session('activo') }}</h4>
			</div>
 
			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
				@can('crear-asignatura')
				<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="asignaturas/create" title="Nueva Asignatura">
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
								<table id="asignaturas" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>																				
											<th>Grado</th>
											<th>Abreviado</th>								
											<th>Nombre</th>								
											<th class="text-center">Tipo de Calificación</th>														
											<th class="text-center">Condición</th>
											<th class="text-center">Acción</th>
										</tr>
									</thead>

									<tbody>
			
									@foreach($asignaturas as $asignatura)

										<tr>
											<td class="text-center">{{--$asignatura->grado_id--}}</td>
											<td>{{ $asignatura->abreviado }}</td>
											<td>{{ $asignatura->nombre }}</td>			
											
											<td class="text-center text-body" style="font-size:85%;">          
												@if ($asignatura->calificacion_tipo=='numerica')
												  <strong class="badge rounded-pill  bg-secondary">123</strong>   
												@else
												  <strong class="badge rounded-pill  text-light  bg-primary">ABC</strong>
												@endif        
											 </td>

										
											<td class="text-center text-body" style="font-size:85%;">          
												@if ($asignatura->estado==1)
												  <span class="badge rounded-pill  bg-primary text-light">Activo</span>   
												@else
												  <span class="badge rounded-pill  bg-secondary">Inactivo</span>
												@endif        
											 </td>
										
											<td width="90" class="text-center">
											<div>
												@can('editar-asignatura')  								
												<a class="btn btn-outline-primary btn-sm" title="Editar Asignatura" href="{{ route('asignaturas.edit',$asignatura->id)}}">
													<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</a>  
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
			$('#asignaturas').DataTable();
		});
		</script>
		@endsection

@endsection 

