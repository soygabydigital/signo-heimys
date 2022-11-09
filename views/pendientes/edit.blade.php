@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
          <h3 class="page__heading">Notas &#160; {{ session('activo') }} (Ingresar-Editar)</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">


                  <div style="display: inline-block; width: 35rem; ">
                    @if (session()->has('message'))
                    <div class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
                    @endif
                  </div>

                    <div class="card">
                      <div class="card-header">
                          <h4>
                            {{ $matricula[0]->cedula }} &nbsp; | &nbsp; 
                            {{ $matricula[0]->apellidos }}
                            {{ $matricula[0]->nombres }} &nbsp; | &nbsp;
                            {{ $matricula[0]->nombre_grado }}
                            {{ $matricula[0]->nombre_seccion }}
                          </h4>
                      </div>

                        <div class="card-body">
                            <h4 class="text-primary">
                              {{-- $nota->anioasignatura->asignatura->abreviado --}} 
                              @if ($matricula[0]->materia)
                                                               
                              @endif
                            </h4>
                    {!! Form::model($pendiente,['method'=>'PUT','route'=>['pendientes.update',$pendiente->id]]) !!}

                        {!! Form::hidden('matricula_id',$pendiente->matricula_id)  !!} 
                        {!! Form::hidden('materia',$pendiente->materia)  !!} 
                              <table>
                                <thead>
                                  <tr class="text-center">
                                    <td> <b>Docente</b> </td>
                                    <td style="padding-left: 2em;"> <b>Momento I</b> </td>
                                    <td style="padding-left: 2em;"> <b>Momento II</b> </td>
                                    <td style="padding-left: 2em;"> <b>Momento III</b> </td>
                                    <td style="padding-left: 2em;"> <b>Momento IV</b> </td>
                                  </tr>
                                </thead>
                            
                                <tbody>

                                 
                                   <tr>
                                    <td>
                                      @if ($usuario->id==1)
                                      
                                            {!! Form::select('docente',$docentes,null,array('class'=>'form-control','placeholder'=>'Seleccione docente...'))  !!}
                                      </td> 
                                    @else
                                        @if (!empty($pendiente->docente))
                                        {!! Form::hidden('docente',$pendiente->docente)  !!}  
                                        <td>{{-- $pendiente->docente --}}</td>												
                                        @else
                                        
                                        @endif        
                                    @endif      
                                    </td>

                                    <td style="padding-left: 2em;"> 
                                      @if ($corte[0]->estado==1)
                                          {!! Form::text('nota1',old('nota1'),['class'=>'form-control'])  !!}           
                                          {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}  
                                       @else
                                          {!! Form::hidden('nota1',$pendiente->nota1)  !!}            
                                          {{ $pendiente->nota1 }} 
                                        @endif
                                    </td> 
                            
                                    <td style="padding-left: 2em;">
                                      @if ($corte[1]->estado==1)
                                          {!! Form::text('nota2',old('nota2'),['class'=>'form-control'])  !!}       
                                          {!!$errors->first('nota2','<small style="color:red;">:message</small><br>')!!}  
                                      @else
                                          {!! Form::hidden('nota2',$pendiente->nota2)  !!} 
                                          {{ $pendiente->nota2 }} 
                                      @endif  
                                    </td>
                            
                                    <td style="padding-left: 2em;">
                                      @if ($corte[2]->estado==1)
                                          {!! Form::text('nota3',old('nota3'),['class'=>'form-control'])  !!}       
                                          {!!$errors->first('nota3','<small style="color:red;">:message</small><br>')!!}
                                      @else
                                          {!! Form::hidden('nota3',$pendiente->nota3)  !!} 
                                          {{ $pendiente->nota3 }} 
                                      @endif
                                    </td>

                                    <td style="padding-left: 2em;">
                                      @if ($corte[3]->estado==1)
                                          {!! Form::text('nota4',old('nota4'),['class'=>'form-control'])  !!}       
                                          {!!$errors->first('nota4','<small style="color:red;">:message</small><br>')!!}
                                      @else
                                          {!! Form::hidden('nota4',$pendiente->nota4)  !!}   
                                          {{ $pendiente->nota4 }}  
                                      @endif
                                    </td>

                                    </tr>
                                    {!! Form::close() !!}  
                                </tbody>
                          </table> <br><br>

                          <button type="submit" class="btn btn-primary" id="botones">Aceptar</button>
                                
      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection












@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Materia Pendiente &#160; {{ session('activo') }}</h3>
        </div>
        <div class="section-body">

<div class=" justify-content-end">

  <div style="display: inline-block; width: 35rem; ">
    @if (session()->has('message'))
    <div class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
    @endif
  </div>

<div class="table-responsive">
<table id="editar_notas"  class="table-sm table-striped mt-2" style="width:100%">
  <thead class="thead text-light bg-primary"> 
    <tr>
      <th scope="col" class="text-center">Cédula</th>
      <th scope="col" class="text-center">Apellidos</th>     
      <th scope="col" class="text-center">Nombres</th>      
      <th scope="col" class="text-center">Gen</th>
      <th scope="col" class="text-center">Grupo</th> 
      <th scope="col" class="text-center">Asignatura</th> 
      <th scope="col" class="text-center">Docente</th> 
      <th scope="col" class="text-center">Mom 1</th>
      <th scope="col" class="text-center">Mom 2</th>
      <th scope="col" class="text-center">Mom 3</th> 
      <th scope="col" class="text-center">Mom 4</th> 
              
      <th scope="col" class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody> 
  
    <tr>  
        <td class="text-center" >{{ $matricula[0]->cedula }}</td> 
        <td class="text-center" >{{ $matricula[0]->apellidos }}</td>
        <td class="text-center" >{{ $matricula[0]->nombres }}</td>
        <td class="text-center" >{{ $matricula[0]->genero }}</td>
        <td class="text-center" >{{ $matricula[0]->grado_id }} {{ $matricula[0]->nombre_seccion }}</td>
     
        <td>{{ $matricula[0]->materia }} </td>

        {!! Form::model($pendiente,['method'=>'PUT','route'=>['pendientes.update',$pendiente->id]]) !!}
      

        {!! Form::hidden('matricula_id',$pendiente->matricula_id)  !!} 
        {!! Form::hidden('materia',$pendiente->materia)  !!} 
        
        @if ($usuario->id==1)
          <td class="text-center">
            {!! Form::select('docente',$docentes,null,array('class'=>'form-control','placeholder'=>'Seleccione docente...'))  !!}
            {{-- $docente_bd --}}
        </td> 
        @else
            @if (!empty($pendiente->docente))
            {!! Form::hidden('docente',$pendiente->docente)  !!}  
            <td>{{-- $pendiente->docente --}}</td>												
            @else
            <td></td>	
            @endif        
        @endif        
      
        <td class="text-center"> 
          @if ($corte[0]->estado==1)
            {!! Form::text('nota1',old('nota1'),['class'=>'form-control'])  !!}           
            {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}  
          @else
              {!! Form::hidden('nota1',$pendiente->nota1)  !!}            
              {{ $pendiente->nota1 }} 
          @endif
        </td>

        <td class="text-center">
        @if ($corte[1]->estado==1)
          {!! Form::text('nota2',old('nota2'),['class'=>'form-control'])  !!}       
          {!!$errors->first('nota2','<small style="color:red;">:message</small><br>')!!}  
        @else
          {!! Form::hidden('nota2',$pendiente->nota2)  !!} 
          {{ $pendiente->nota2 }} 
        @endif        
        </td>

        <td class="text-center">
          @if ($corte[2]->estado==1)
            {!! Form::text('nota3',old('nota3'),['class'=>'form-control'])  !!}       
            {!!$errors->first('nota3','<small style="color:red;">:message</small><br>')!!}
          @else
            {!! Form::hidden('nota3',$pendiente->nota3)  !!} 
            {{ $pendiente->nota3 }} 
          @endif
        </td>

        <td class="text-center">
          @if ($corte[3]->estado==1)
            {!! Form::text('nota4',old('nota4'),['class'=>'form-control'])  !!}       
            {!!$errors->first('nota4','<small style="color:red;">:message</small><br>')!!}
          @else
            {!! Form::hidden('nota4',$pendiente->nota4)  !!}   
            {{ $pendiente->nota4 }}  
          @endif
          </td>

        <td class="text-center">
            <button type="submit" class="btn btn-primary" id="botones">Aceptar</button>
        </td>  

        {!! Form::close() !!}  

    </tr>
   
  </tbody>
  
</table>
</div>
@stop


  
