
<head>
<meta name="_token" content="{{ csrf_token() }}">
<title>Busqueda Dinamica</title>
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
</head>


<body>
<section class="section">
<div class="section-body"> 
<div class="row">
<div class="col-lg-12">
<div class="card">

<h3>Buscar Alumnos</h3>
</div>
<div class="panel-body">
<div class="form-group">

{!! Form::open(array('route'=>'inscribir')) !!}
@method('HEAD')
<label for="">Buscar:</label>
<input type="text" class="form-controller" id="search" name="search" placeholder="Cedula nombres o apellidos..."/>

<label for="">Cedula:</label>
<input type="text" class="form-controller" id="search" name="cedula"/>
<label for="">Grado:</label>
<input type="text" name="grado" id="grado">
<label for="">Repite:</label>
<input type="text" name="repite" id="repite">
</div>

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Cedula</th>
<th>Apellidos</th>
<th>Nombres</th>
</tr>
</thead>

<tbody>
</tbody>

</table>
</div>
</div>
</div>
</div>

{{-- $output[0]->cedula --}}
<div class="col-xs-12 col-sm-12 col-md-12">
{!! Form::submit('Continuar', $attributes = ['class'=>'button btn btn-primary']) !!}
</div>
{!! Form::close() !!}

</body>

<script type="text/javascript">
$('#search').on('keyup',function(){
$value=$(this).val();
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':$value},
success:function(data){
$('tbody').html(data);
}
});
})
</script>

<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>     





