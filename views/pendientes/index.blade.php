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
				<h4 class="page__heading">Materia Pendiente &#160; {{ session('activo') }}</h4>
			</div>

			<div style="display: inline-block; width: 35rem; ">
				@if (session()->has('message'))
				<div wire:poll.4s class="alert alert-success" style="margin-top:0px; margin-bottom:0px; width: 180%;"> {{ session('message') }} </div>
				@endif			
			<br><br>

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
											<!--<th class="text-center">Docente</th>-->
											<th class="text-center">I</th>
											<th class="text-center">II</th>
											<th class="text-center">III</th>
											<th class="text-center">IV</th>
										
											<th class="text-center">Acción</th>
										</tr>
									</thead>
									@php
										$i=0;
									@endphp
									<tbody>	
										{{-- $pendientes --}}
									@foreach($pendientes as $pendiente)
									@php								
    								$edad = Carbon::parse($pendiente->fecha_nacimiento)->age;	
									
									@endphp									

										<tr>	
											<td>{{ $pendiente->id }}</td> 									
											<td style="font-size:90%;">{{ $pendiente->cedula }}</td> 
											<td style="font-size:90%;">{{ $pendiente->apellidos }}</td>
											<td style="font-size:90%;">{{ $pendiente->nombres }}</td>
											
												<td class="text-center text-body">          
												@if ($pendiente->genero=='M')
												  <span class="badge rounded-pill" style="background-color: #91c9f2; font-size:75%;">M</span>   
												@else
												  <span class="badge rounded-pill" style="background-color: #ddb5eb; font-size:75%;">F</span>
												@endif        
											 </td>
										
											<td class="text-center text-danger" style="font-size:90%;">{{ $edad }}</td>										
																
											
											<td>{{ $pendiente->grado_id }} {{ $pendiente->nombre_seccion }}</td>
										
											<td class="text-center">{{ $pendiente->materia }}</td>
											 	
											<!--<td class="text-center">-->
												{{-- $pendientes --}}

											@if (1/*!empty($pendientes[0])*/)
												@if (1/*($pendientes[1]->id==$pendiente->id) && (!empty($nombre_doc[0]))*/)
													 {{-- $nombre_doc[0] --}}
												@endif												
											@endif

											@if (1/*!empty($pendientes[1])*/)
												@if (1/*($pendientes[0]->id==$pendiente->id) && (!empty($nombre_doc[1]))*/)
													 {{-- $nombre_doc[1] --}}
												@endif												
											@endif																
											<!--</td>-->

											@php											
											$formato1="text-primary";
											$formato2="text-primary";
											$formato3="text-primary";
											$formato4="text-primary";

											if(($pendiente->nota1)<9.5){
												$formato1="text-danger";
											}
											if(($pendiente->nota2)<9.5){
												$formato2="text-danger";
											}
											if(($pendiente->nota3)<9.5){
												$formato3="text-danger";
											}
											if(($pendiente->nota4)<9.5){
												$formato4="text-danger";
											}
											@endphp																	  	    							
								
											<td class="text-center {{ $formato1 }}">{{ $pendiente->nota1 }} </td> 
											<td class="text-center {{ $formato2 }}">{{ $pendiente->nota2 }} </td>
											<td class="text-center {{ $formato3 }}">{{ $pendiente->nota3 }} </td>
											<td class="text-center {{ $formato4 }}">{{ $pendiente->nota4 }} </td>
										
											<td width="90" class="text-center"> 
											<div>
												@if ($fuera_fecha==0)
												@hasrole('Admin|Docente')																		
												<a class="btn btn-outline-primary btn-sm" title="Editar Pendiente" href="{{ route('pendientes.edit',$pendiente->id)}}">
												<i class="fa fa-edit fa-sm" aria-hidden="true"></i> Cargar</a>  
												@endhasrole
												@endif	
															
											</div>
											</td>
										</tr>
										@php
											$i=$i+1;
										@endphp
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
			$('#notas').DataTable();
		});
		</script>
		@endsection

@endsection 


