@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Asignaturas por Periodo Escolar &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem;">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
		
			
				@if ($contar<1)
				
				@can('crear-periodo_asignatura')
				<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="anio_asignaturas/create" 
					title="Consolidar asignaturas en periodo escolar"> Consolidar </a>				
				</div>                           
			  	@endcan	<br>

				<label class="text-danger" style="font-size: 1.2em;">
					<strong>OJO:</strong> Se trasladarán todas las asignaturas que estén en condición activa.
				</label>
				@endif 
						 
			</div><br>

			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="anio_asignaturas" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>
										
											<th>Año</th>
											<th>Asignatura</th>								
											<th>Docente</th>
											<th class="text-center">Acci&oacute;n</th>
										</tr>
									</thead>

									<tbody>
			
									@foreach($anio_asignaturas as $anio_asignatura)

										<tr>
										
											<td>{{ $anio_asignatura->asignatura->grado->nombre_grado }}</td>
											<td>{{ $anio_asignatura->asignatura->nombre }}</td>	

											@if (isset($anio_asignatura->docente->nombre_docente))
											<td>{{ $anio_asignatura->docente->nombre_docente }}</td>
											@else
											<td></td>
											@endif	
											
											<td width="90" class="text-center">
											<div>
												@can('editar-periodo_asignatura')  								
												<a class="btn btn-outline-primary btn-sm" title="Editar Grupos" href="{{ route('anio_asignaturas.edit',$anio_asignatura->id)}}">
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
			$('#anio_asignaturas').DataTable();
		});
		</script>
		@endsection

@endsection 

