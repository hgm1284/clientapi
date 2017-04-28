<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!--<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}"-->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="/assets/js/voucher.js"></script>
</head>
<body>

<h1>Consulta de Boleta</h1>
<h2>Boleta</h2>

<div class ="container col-xs-8">
@if($data)
<table class="table table-striped">
    <thead>
      <tr>
        <td>Número de Boleta</td>
        <td>Articulo</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Color</td>
        <td>Serie</td>
        <td>Adelanto</td>
        <td>Accesorios</td>
        <td>Estado</td>
        <td>Reporte</td>
        <td>ID_Usuario</td>
      </tr>
    </thead>
    <tbody>
@foreach ($data as $row)
<tr>
  <td>{{$row->id}}</td>
  <td>{{$row->articulo}}</td>
  <td>{{$row->marca}}</td>
  <td>{{$row->modelo}}</td>
  <td>{{$row->color}}</td>
  <td>{{$row->serie}}</td>
  <td>{{$row->adelanto}}</td>
  <td>{{$row->accesorios}}</td>
  <td>{{$row->estado}}</td>
  <td>{{$row->reporte}}</td>
  <td>{{$row->user_id}}</td>
</tr>

@endforeach

    </tbody>
  </table>
  @endif
</div>
<hr>

<div class ="container col-xs-8">
<H1>Consulta de Comentarios</H1>

@if($data2)
 <table class="table table-striped">
    <thead>
      <tr>
        <td>Número de Boleta</td>
        <td>Título del Comentario</td>
        <td>Comentario</td>
        <td>id_Comentario</td>
      </tr>
    </thead>
    <tbody>
@foreach ($data2 as $row)
<tr>
  <td>{{$row->id}}</td>
  <td>{{$row->commenter}}</td>
  <td>{{$row->body}}</td>
  <td>{{$row->voucher_id}}</td>
</tr>

@endforeach

    </tbody>
  </table>
  @endif
</div>
</div>


<div class ="container col-xs-8">
<hr>
<h3>Escribanos su Consulta</h3>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Título de la Consulta</span>
  <input type="text" class="form-control" placeholder="Título" aria-describedby="basic-addon1">
</div>

<div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Consulta</span>
  <input type="text" class="form-control" placeholder="Consulta" aria-describedby="sizing-addon1">
</div>
<input class="btn btn-default" type="button" value="Enviar">
</div>

</body>
</html>