@php
use Carbon\Carbon;    
@endphp

@section('title', __('Grupos Estables'))

<section class="section">
	<div class="section-header">
		<h4 class="page__heading">Grupos Estables {{ session('activo') }}</h4>
	</div>
@stop

@section('content') 

<table id="grupos"  class="table table-striped shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
      <tr> 
        <th scope="col" class="text-center" style="font-size:70%;">No</th>
        <th scope="col" class="text-center" style="font-size:70%;">Cédula</th>
        <th scope="col" class="text-center" style="font-size:70%;">Apellido</th>
        <th scope="col" class="text-center" style="font-size:70%;">Nombre</th>
        <th scope="col" class="text-center" style="font-size:70%;">Gen</th>     
        <th scope="col" class="text-center" style="font-size:70%;">Edad</th>
  
        <th scope="col" class="text-center" style="font-size:70%;">Grado</th>
        <th scope="col" class="text-center" style="font-size:70%;">Seccion</th>
  
      
      </tr>
    </thead>
    <tbody> 
  
      @forelse ($matriculas as $matricula)  
  
     @php
      $edad = Carbon::parse($matricula->alumno->fecha_nacimiento)->age;
     @endphp
  
      <tr>      
        <td class="text-center" style="font-size:70%;">{{$matricula->alumno_id}}</td>  
          <td class="text-center" style="font-size:70%;">{{$matricula->alumno->cedula}}</td>
          <td style="font-size:70%;">{{$matricula->alumno->apellido1}} {{$matricula->alumno->apellido2}}</td>
          <td style="font-size:70%;">{{$matricula->alumno->nombre1}} {{$matricula->alumno->nombre2}}</td>
          <td class="text-center" style="font-size:70%;">{{$matricula->alumno->genero}}</td>        
          <td class="text-center" style="font-size:70%;">{{$edad}}</td>  
          
          <td class="text-center" style="font-size:70%;">{{$matricula->grado->nombre}}</td>  
          <td class="text-center" style="font-size:70%;">{{$matricula->seccion->nombre}}</td>  

      </tr>
      @empty
      <h4 style="text-align: center; font-size:100%;" class="alert-info">
        No Matricula para grupo estble activo<h4>  
      @endforelse

    </tbody>
</table>
 
</div><!-- container -->

@stop

  



@stop


 