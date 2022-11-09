@php
use Carbon\Carbon;								
$edad = Carbon::parse($notas[0]->matricula->alumno->fecha_nacimiento)->age;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historial de Notas</title>
</head>

<style> 

* {
    line-height: 2em;
}
    
body {
    margin-top: 1.5em;
    margin-left: 2.5em;
    margin-right: 2.5em;
    margin-bottom: 1.5em;

}

p {
    text-align: justify;
}

table {
  border-collapse: collapse;
}

thead {
  font-style: bold;
}

td{
  border: 0.5px solid #000;
  margin-left: 10px;
  padding-left: 10px;
  padding-right: 10px;
  padding-top: 2px; 
  padding-bottom: 2px; 

}

</style>

<body>

  <b>
    <div style="text-align: center"> COMPLEJO EDUCATIVO "TRINIDAD FIGUEIRA"</div>
    <div style="text-align: center"> HISTORIAL DE NOTAS </div>
</b>
<hr>
<p>
 <b>DATOS PERSONALES</b> <br>
  <b>Nombre:</b> {{$notas[0]->matricula->alumno->apellidos}} {{$notas[0]->matricula->alumno->nombres}}. 
  <b style="margin-left: 1em;">Cédula:</b> {{$notas[0]->matricula->alumno->cedula}}. <br>
  <b>F. Nac.:</b> {{$notas[0]->matricula->alumno->fecha_nacimiento}}.
  <b style="margin-left: 1em;">Edad:</b>{{$edad}}.
  <b style="margin-left: 1em;">L. Nac.:</b>{{$notas[0]->matricula->alumno->lugar_nacimiento}}. <br>
  <b>Dirección:</b> {{$notas[0]->matricula->alumno->direccion}}. <br>
  <b>Representante:</b> {{$notas[0]->matricula->alumno->representante}}.
  <b style="margin-left: 1em;">Teléfono:</b> {{ $notas[0]->matricula->alumno->telefono_rep }}.
</p>

@if (!empty($contar_notas))
    <b>Notas Regulares</b>
<table style="width: 100%; text-align: center;">
    <thead>
        <tr>
            <td>Asignatura</td>
            <td>Año</td>
            <td>Sección</td>
            <td>I</td>
            <td>II</td>
            <td>II</td>
            <td>Def.</td>
            <td>Periodo Escolar</td>
        </tr>
    </thead>

    <tbody>
        @foreach ($notas as $nota)
          <tr>
            <td><b>{{$nota->anioasignatura->asignatura->abreviado}}</b></td>
            <td>{{$nota->matricula->grado->nombre_grado}}</td>
            <td>{{$nota->matricula->seccion->nombre_seccion}}</td>



            @if ($nota->nota1==0)
            <td style="font-size: 10px;">S/N</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                    ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                    (($nota->nota1>=17.5)&&($nota->nota1<=20)))
                <td>A</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                  ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                  (($nota->nota1>=14.5)&&($nota->nota1<=17.4)))
               <td>B</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                (($nota->nota1>=11.5)&&($nota->nota1<=14.4)))
               <td>C</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                 ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
               ($nota->nota1<=11.4))
              <td>D</td>
            @elseif ($nota->nota1>0)
            <td>{{round($nota->nota1)}}</td>
            @endif
    
            @if ($nota->nota2==0)
            <td style="font-size: 10px;">S/N</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                    ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                    (($nota->nota2>=17.5)&&($nota->nota2<=20)))
                <td>A</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                 ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                 (($nota->nota2>=14.5)&&($nota->nota2<=17.4)))
               <td>B</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                   ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                   (($nota->nota2>=11.5)&&($nota->nota2<=14.4)))
               <td>C</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                  ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
               ($nota->nota2<=11.4))
              <td>D</td>
            @elseif ($nota->nota2>0)
            <td>{{round($nota->nota2)}}</td>
            @endif
    
            @if ($nota->nota3==0)
            <td style="font-size: 10px;">S/N</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                    ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                    (($nota->nota3>=17.5)&&($nota->nota3<=20)))
                <td>A</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                 ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
                 (($nota->nota3>=14.5)&&($nota->nota3<=17.4)))
               <td>B</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                  ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
                  (($nota->nota3>=11.5)&&($nota->nota3<=14.4)))
               <td>C</td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                    ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.')&&
               ($nota->nota3<=11.4))
              <td>D</td>
            @elseif ($nota->nota3>0)
            <td>{{round($nota->nota3)}}</td>
            @endif
    
            @if ($nota->nota_def==0)
            <td style="font-size: 10px;"> <b>S/N</b> </td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                   ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
                   (($nota->nota_def>=17.5)&&($nota->nota_def<=20)))
                <td> <b>A</b> </td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                    ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
                    (($nota->nota_def>=14.5)&&($nota->nota_def<=17.4)))
              <td> <b>B</b> </td>
            @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                  ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
                  (($nota->nota_def>=11.5)&&($nota->nota_def<=14.4)))
              <td> <b>C</b> </td>
              @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                      ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
               ($nota->nota_def<=11.4))
              <td> <b>D</b> </td>
            @elseif ($nota->nota_def>0)
            <td> <b>{{round($nota->nota_def)}}</b> </td>
            @endif


            
            <td><i>{{$nota->matricula->anio->numero}}</i></td>
          </tr>  
        @endforeach
    </tbody>
</table>
<br>
@endif

@if (!empty($contar_pendientes))
<b>Materia Pendiente</b>
<table style="width: 100%; text-align: center;">
    <thead>
        <tr>
            <td>Asignatura</td>
            <td>Año. Asig.</td>
            <td>Año</td>
            <td>Sección</td>
            <td>I</td>
            <td>II</td>
            <td>III</td>
            <td>IV</td>
            <td>Periodo Escolar</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pendientes as $pendiente)
            <tr>
                <td><b>{{$pendiente->materia}}</b></td>
                <td>{{$pendiente->grado_id-1}}°</td>
                <td>{{$pendiente->nombre_grado}}</td>
                <td>{{$pendiente->nombre_seccion}}</td>

                  @if ($pendiente->nota1==0)
                      <td></td>
                  @elseif($pendiente->nota1>=10)
                      <td> <b>{{round($pendiente->nota1)}}</b> </td>
                  @else
                  <td>{{round($pendiente->nota1)}}</td>
                  @endif

                  @if ($pendiente->nota2==0)
                      <td></td>
                  @elseif($pendiente->nota2>=10)
                      <td> <b>{{round($pendiente->nota2)}}</b> </td>
                  @else
                      <td>{{round($pendiente->nota2)}}</td>
                  @endif

                  @if ($pendiente->nota3==0)
                      <td></td>
                  @elseif($pendiente->nota3>=10)
                      <td> <b>{{round($pendiente->nota3)}}</b> </td>
                  @else
                      <td>{{round($pendiente->nota3)}}</td>
                  @endif

                  @if ($pendiente->nota4==0)
                      <td></td>
                  @elseif($pendiente->nota4>=10)
                      <td> <b>{{round($pendiente->nota4)}}</b> </td>
                  @else
                      <td>{{round($pendiente->nota4)}}</td>
                  @endif

                <td><i>{{$pendiente->numero}}</i></td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
@endif

<b style="margin-left: 1em">Descripción de Literales</b>
<table>
    
  <tr>
    <td style="width: 20px; text-align: center;"> <b>A</b> </td>
    <td>
      Evidencia el logro de losaprendizajes y en algunos casos superando las expectativas del curso.
    </td>
  </tr>
  <tr>
    <td style="width: 20px; text-align: center;"> <b>B</b> </td>
    <td>
      Evidencia el logro de los aprendizajes previstos, cumpliendo con todas las asignaciones propuestas.
    </td>
  </tr>
  <tr>
    <td style="width: 20px; text-align: center;"> <b>C</b> </td>
    <td>
      Logró los aprendizajes previstos, requiere de acompañamiento durante un tiempo razonable.
    </td>
  </tr>
  <tr>
    <td style="width: 20px; text-align: center;"> <b>D</b> </td>
    <td>
      Está iniciando a desarrollar los aprendizajes previstos, necesitando de mayor tiempo de acompañamiento.
    </td>
  </tr>

</table>

<br><br>


    <div style="text-align: center"> __________________________</div>
    <div style="text-align: center">Prof. Gilbert Andrés Peña</div>
    <div style="text-align: center">Director</div>









</body>
</html>

@php
//************************
//* * *  Generar PDF * * * 
//************************
    $html=ob_get_clean();
    //echo $html;

    // reference the Dompdf namespace
$nombre_boletin=$notas[0]->matricula->alumno->cedula.' '.$notas[0]->matricula->alumno->apellidos.' '.$notas[0]->matricula->alumno->nombre.' '.$notas[0]->matricula->grado->nombre_grado.' '.$notas[0]->matricula->grado->nombre_seccion;
require_once '../libreria/dompdf/autoload.inc.php';   
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options=$dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');//(letter,A4,legal)-(landscape,portrait)

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Boletín Informativo_'.$nombre_boletin.'.pdf',array('Attachment'=>false));
@endphp
