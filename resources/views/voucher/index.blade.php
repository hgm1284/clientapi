<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 <script type="text/javascript" src="/assets/js/voucher.js"></script>
</head>
<body>

<div class ="container col-xs-8">
@if($data)
  <table class="table">
    <thead>
      <tr>
        <td>Accesorios</td>
        <td>Asunto</td>
        <td>Fecha/Hora</td>
      </tr>
    </thead>
    <tbody>
@foreach ($data as $row)
<tr>
  <td>{{$row->accesorios}}</td>
  <td>{{$row->adelanto}}</td>
  <td>{{$row->estado}}</td>
</tr>

@endforeach

    </tbody>
  </table>
  @endif
</div>
</div>

</body>
</html>