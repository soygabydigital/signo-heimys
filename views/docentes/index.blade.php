@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Registro de Docentes &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
			
				@can('crear-docente')
				<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="docentes/create" title="Nuevo Docente">
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
								<table id="docentes" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>
											<td style="display:none;" >#</td> 
											<th>Nombre</th>
											<th>Especialidad</th>								
											<th>Teléfonos</th>								
											<th>Correo</th>																
											<th class="text-center">Condición</th>
											<th class="text-center">Acci&oacute;n</th>
										</tr>
									</thead>

									<tbody>
			
									@foreach($docentes as $docente)

										<tr>
											<td style="display:none;">{{ $docente->iteration }}</td> 
											<td>{{ $docente->nombre_docente }}</td>
											<td>{{ $docente->especialidad }}</td>								
											<td>{{ $docente->telefonos }}</td>
											<td>{{ $docente->correo }}</td>
											
											<td class="text-center text-body" style="font-size:85%;">          
												@if ($docente->estado==1)
												  <span class="badge rounded-pill  bg-primary text-light">activo</span>   
												@else
												  <span class="badge rounded-pill  bg-secondary">Inactivo</span>
												@endif        
											 </td>
										
											<td width="90" class="text-center">
											<div>
												@can('editar-docente')  								
												<a class="btn btn-outline-primary btn-sm" title="Editar Docente" href="{{ route('docentes.edit',$docente->id)}}">
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
			$('#docentes').DataTable();
		});
		</script>
		@endsection

@endsection 

