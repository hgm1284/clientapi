<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<h1>Consulta de sus Boletas</h1>
<table class="table table-striped">
@if($data)
  <table class="table">
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
</div>

</body>
</html>
