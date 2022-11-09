@php
    use Carbon\Carbon;
    $fecha_actual = Carbon::now(); 
    ob_start();

    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
    "Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    $mes = $meses[($fecha_actual->format('n')) - 1];

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia de Estudios</title>
</head>

<style> 

* {
    line-height: 2em;
}
    
body {
    margin-top: 2.5em;
    margin-left: 2.5em;
    margin-right: 2.5em;
    margin-bottom: 2.5em;

}

p {
    text-align: justify;
}

</style>

<body>
<b>
    <div style="text-align: center">REPÚBLICA BOLIVARIANA DE VENEZUELA</div> 
    <div style="text-align: center"> MINISTERIO DEL POPDER POPULAR PARA LA EDUCACIÓN</div>
    <div style="text-align: center"> COMPLEJO EDUCATIVO "TRINIDAD FIGUEIRA"</div>
    <div style="text-align: center"> SAN FELIPE - ESTADO YARACUY</div>

   <br>
    <div style="text-align: center"> CONSTANCIA DE ESTUDIO </div>
</b>

    <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        Quien suscribe Prof. Gilbert Andrés Peña. Titular de la cédula de identidad Nº V-12082633. 
        Director del Complejo Educativo “Trinidad Figueira”, ubicado al final de la calle 20 al lado 
        del C.I.C.P.C, San Felipe, Estado Yaracuy. Hace constar por medio de la presente que el(la) 
        estudiante: {{$matricula->alumno->apellidos}} {{$matricula->alumno->nombres}}, titular de 
        la cédula de identidad Nº {{$matricula->alumno->cedula}} cursa el {{$matricula->grado->nombre_grado}} 
        año sección "{{$matricula->seccion->nombre_seccion}}" de Educación Media General.
    </p>
    <br>

    <div style="text-align: center"> Año Escolar {{ $anio_activo->numero }}. </div>

    <br>

    <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        Constancia que se expide a petición de la parte interesada en San Felipe, a los 
        {{ $fecha_actual->format('d') }} dias del mes de {{$mes}} del año 
        {{$fecha_actual->format('Y')}}.
    </p>
<br> <br>

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
$nombre_constancia=$matricula->alumno->cedula.' '.$matricula->alumno->apellidos.' '.$matricula->alumno->nombres;
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
$dompdf->stream('Constancia de Estudio_'.$nombre_constancia.'.pdf',array('Attachment'=>false));
@endphp