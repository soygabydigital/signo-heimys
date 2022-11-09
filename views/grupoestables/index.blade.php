@extends('layouts.app')

@section('datatable_css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Grupo Estable &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>
				@if ($fuera_fecha==0)
				@can('crear-grupo')
				<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="grupoestables/create" title="Nuevo Grupo">
						<i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>							
				</div>                             
			  	@endcan	
				@endif		 
			</div>

			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="grupos_estables" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>
											<td class="text-center">#</td> 
											<th>Nombre</th>
											<th>Descripción</th>								
											<th>Docente</th>								
											<th class="text-center">Periodo</th>
											<th class="text-center">Acci&oacute;n</th>
										</tr>
									</thead>

									<tbody>									
									@foreach($grupoestables as $grupoestable)
 
										<tr>										
											<td class="text-center">{{ $grupoestable->iteration }}</td> 
											<td>{{ $grupoestable->nombre }}</td>
											<td>{{ $grupoestable->descripcion }}</td>
											@if (!empty($grupoestable->docente->nombre_docente))
												<td>{{ $grupoestable->docente->nombre_docente }}</td>
											@else
												<td></td>
											@endif								
											
											<td class="text-center">{{ $grupoestable->anio->numero }}</td>
										
											<td width="90" class="text-center">
											<div>
												@if ($fuera_fecha==0)
												@can('editar-grupo')  		 						
												<a class="btn btn-outline-primary btn-sm" title="Editar Grupos" href="{{ route('grupoestables.edit',$grupoestable->id)}}">
													<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Editar</a>  
												@endcan		
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
			$('#grupos_estables').DataTable();
		});
		</script>
		@endsection

@endsection 

