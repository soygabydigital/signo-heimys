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
    <title>Boletín Informativo</title>
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
    <div style="text-align: center"> BOLETÍN INFORMATIVO </div>
</b>
<hr>
<div style="float: right; font-size: 13px;">
  {{$notas[0]->matricula->grado->nombre_grado}} año 
  sección "{{$notas[0]->matricula->seccion->nombre_seccion}}"
  &nbsp; <i>{{$anio_activo->numero}} </i>
</div>
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

<table style="float: left;">
  <br>
  <thead>
      <tr style="text-align: center;">
        <td>Área de Aprendizaje</td>
        <td>I</td>
        <td>II</td>
        <td>III</td>
        <td>Def.</td>
      </tr>
  </thead>
  
  <tbody>
    @foreach ($notas as $nota)    
      <tr>


        <td> {{ $nota->anioasignatura->asignatura->abreviado}}</td>

        @if ($nota->nota1==0)
        <td></td>
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
        <td></td>
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
        <td></td>
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
        <td></td>
        @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
               ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
               (($nota->nota_def>=17.5)&&($nota->nota_def<=20)))
            <td>A</td>
        @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
                (($nota->nota_def>=14.5)&&($nota->nota_def<=17.4)))
          <td>B</td>
        @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
              ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
              (($nota->nota_def>=11.5)&&($nota->nota_def<=14.4)))
          <td>C</td>
          @elseif (($nota->anioasignatura->asignatura->abreviado=='Orient y Conv') |
                  ($nota->anioasignatura->asignatura->abreviado=='P.G.C.R.C.') &&
           ($nota->nota_def<=11.4))
          <td>D</td>
        @elseif ($nota->nota_def>0)
        <td>{{round($nota->nota_def)}}</td>
        @endif
      </tr>
      @endforeach

      <tr>
          <td><i style="float: right; padding-right: 0.5em;">Promedio</i></td>

       
          @if ($mom1/$contar_notas==0)
          <td></td>
          @elseif ($mom1/$contar_notas>0)
          <td>{{round($mom1/$contar_notas)}}</td>
          @endif


          @if ($mom2/$contar_notas==0)
          <td></td>
          @elseif ($mom2/$contar_notas>0)
          <td>{{round($mom2/$contar_notas)}}</td>
          @endif

          @if ($mom3/$contar_notas==0)
          <td></td>
          @elseif ($mom3/$contar_notas>0)
          <td>{{round($mom3/$contar_notas)}}</td>
          @endif

          @if ($def_tt/$contar_notas==0)
          <td></td>
          @elseif ($def_tt/$contar_notas>0)
          <td>{{round($def_tt/$contar_notas)}}</td>
          @endif       
      </tr>
    </tbody>
       @if ($def_tt/$contar_notas>=10.5) 
          <i ><b>Estatus: </b>Aprobado</i>
      @elseif($def_tt/$contar_notas==0)<br>
          <i style="font-size: 11px; color: red;">Faltan notas por cargar</i>
      @elseif($def_tt/$contar_notas<10.5)
          <i><b>Estatus: </b>Reprobado</i>
      @endif
</table>

<b style="margin-left: 1em">Descripción de Literales</b>
<table style="float:right; width: 47.4%;">
  
  <tr>
    <td style="width: 15px; text-align: center;"> <b>A</b> </td>
    <td>
      Evidencia el logro de losaprendizajes y en algunos casos superando las expectativas del curso.
    </td>
  </tr>
  <tr>
    <td style="width: 15px; text-align: center;"> <b>B</b> </td>
    <td>
      Evidencia el logro de los aprendizajes previstos, cumpliendo con todas las asignaciones propuestas.
    </td> 
  </tr>
  <tr>
    <td style="width: 15px; text-align: center;"> <b>C</b> </td>
    <td>
      Logró los aprendizajes previstos, requiere de acompañamiento durante un tiempo razonable.
    </td>
  </tr>
  <tr>
    <td style="width: 15px; text-align: center;"> <b>D</b> </td>
    <td>
      Está iniciando a desarrollar los aprendizajes previstos, necesitando de mayor tiempo de acompañamiento.
    </td>
  </tr>

</table>

<br><br>
<div style="margin-top: 30em;">
  <div style="float: left;">
  <div style="text-align: center"> __________________________</div>
  <div style="text-align: center margin-right: 30em;">Prof.</div>
  <div style="text-align: center">Tutor</div>
</div>

<div style="float: right;">
    <div style="text-align: center"> __________________________</div>
    <div style="text-align: center">Prof. Gilbert Andrés Peña</div>
    <div style="text-align: center">Director</div>
</div>
</div>











</body>
</html>

@php
//************************
//* * *  Generar PDF * * * 
//************************
    $html=ob_get_clean();
    //echo $html;

    // reference the Dompdf namespace
$nombre_boletin=$anio_activo->numero.' '.$notas[0]->matricula->alumno->cedula.' '.$notas[0]->matricula->alumno->apellidos.' '.$notas[0]->matricula->alumno->nombre.' '.$notas[0]->matricula->grado->nombre_grado.' '.$notas[0]->matricula->grado->nombre_seccion;
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

