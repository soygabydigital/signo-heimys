@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
          <h3 class="page__heading">Notas &#160; {{ session('activo') }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                          <h4>
                            {{ $nota->matricula->alumno->cedula }} &nbsp; | &nbsp; 
                            {{ $nota->matricula->alumno->apellidos }}
                            {{ $nota->matricula->alumno->nombres }} &nbsp; | &nbsp;
                            {{ $nota->matricula->grado->nombre_grado }}
                            {{ $nota->matricula->seccion->nombre_seccion }}
                          </h4>
                      </div>
                        <div class="card-body">
                            <h4 class="text-primary">
                              {{ $nota->anioasignatura->asignatura->abreviado }} 
                              @if ($nota->anioasignatura->docente_id)
                              &nbsp; | &nbsp;
                              {{ $nota->anioasignatura->docente->nombre_docente }}                                
                              @else
                                                                
                              @endif
                            </h4>


                            <form action="/notas/{{$nota->id}}" method="POST">         
                              @method('PUT')
                              @csrf  
                              <table>
                                <thead>
                                  <tr class="text-center">
                                    <td style="padding-left: 7.5em;"> <b>Momento I</b> </td>
                                    <td style="padding-left: 7.5em;"> <b>Momento II</b> </td>
                                    <td style="padding-left: 7.5em;"> <b>Momento III</b> </td>
                                  </tr>
                                </thead>
                            
                                <tbody>
                                   <tr>
                                    <td style="padding-left: 7.5em;"> 
                                    @if ($corte[0]->estado==1)
                                      <input name="nota1" class="form-control" style="font-size:95%;" value="{{old('nota1',$nota->nota1)}}">
                                        {!!$errors->first('nota1','<small style="color:red;">:message</small><br>')!!}        
                                    @else
                                      <input type="hidden" name="nota1" value="{{ $nota->nota1 }}">
                                      {{ $nota->nota1 }}           
                                    @endif
                                    </td> 
                            
                                    <td style="padding-left: 7.5em;">
                                    @if ($corte[1]->estado==1)
                                      <input name="nota2" class="form-control" style="font-size:95%;" value="{{old('nota2',$nota->nota2)}}">
                                      {!!$errors->first('nota2','<small style="color:red;">:message</small><br>')!!} 
                                    @else
                                    <input type="hidden" name="nota2" value="{{ $nota->nota2 }}">
                                    {{ $nota->nota2 }}    
                                    @endif
                                    </td>
                            
                                    <td style="padding-left: 7.5em;">
                                    @if ($corte[2]->estado==1)
                                      <input name="nota3" class="form-control" style="font-size:95%;" value="{{old('nota3',$nota->nota3)}}">
                                      {!!$errors->first('nota3','<small style="color:red;">:message</small><br>')!!}
                                    @else
                                    <input type="hidden" name="nota3" value="{{ $nota->nota3 }}">
                                      {{ $nota->nota3 }}    
                                    @endif
                                  </td>
                                    </tr>
                                </tbody>
                          </table> <br><br>

                                <button type="submit" class="btn btn-primary" id="botones">Aceptar</button>

                          </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection