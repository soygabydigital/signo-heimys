@extends('layouts.app')

@section('datatable_css')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')

    <section class="section">

        <div class="section-body"> 
			<div class="section-header">
				<h4 class="page__heading">Retiros&#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>

 

				@can('crear-retiro')
				<!--<div class="col-2" style="float: left;">
					<a class="btn btn-outline-primary btn-sm" style="width: 5rem;" href="grupoestables/create" title="Nuevo Grupo">
						<i class="fa fa-plus" aria-hidden="true"></i> Nuevo</a>							
				</div>                -->             
			  	@endcan	
 
			</div>

			<div class="section-body"> 
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
							  <div class="table-responsive">
								<table id="retiros" style="width: 100%;" class="table-sm table-striped mt-2">
									<thead class="thead text-light bg-primary">
										<tr>
											<td class="text-center">id</td> 
											<th>Cédula</th>
                                            <th>Apellidos</th>
                                            <th>Nombres</th>
											<th>Fecha</th>								
											<th>Motivo</th>	
                                            <th>Responsable</th>		

											<th class="text-center">Acci&oacute;n</th>
										</tr>
									</thead>

									<tbody>									
									@foreach($retiros as $retiro)
 
										<tr>										
											<td class="text-center">{{$retiro->id }}</td> 
                                            <td>{{ $retiro->cedula }}</td>
                                            <td>{{ $retiro->apellidos }}</td>
                                            <td> {{ $retiro->nombres }} </td> 


											<td>{{ $retiro->fecha_retiro }}</td>
											<td>{{ $retiro->motivo }}</td>

                                            <td>{{ $retiro->name }}</td>					
										
											<td width="90" class="text-center">
											<div>
											
												@can('editar-grupo')  		 						
												<a class="btn btn-outline-primary btn-sm" title="Reporte del Retiro" href="{{ route('retiro', $retiro->id) }}">
													<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Reporte</a>  
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
					$('#retiros').DataTable();
				});
		</script>
		@endsection

@endsection 