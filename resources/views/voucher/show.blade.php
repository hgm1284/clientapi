@extends('layouts.app1')

@section('content')


<h1>Consulta de Boleta</h1>
<h2>Boleta</h2>

<div class ="container col-xs-8">

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

<tr>
  <td>{{$voucher->id}}</td>
  <td>{{$voucher->articulo}}</td>
  <td>{{$voucher->marca}}</td>
  <td>{{$voucher->modelo}}</td>
  <td>{{$voucher->color}}</td>
  <td>{{$voucher->serie}}</td>
  <td>{{$voucher->adelanto}}</td>
  <td>{{$voucher->accesorio}}</td>
  <td>{{$voucher->estado}}</td>
  <td>{{$voucher->reporte}}</td>
  <td>{{$voucher->user_id}}</td>
</tr>



    </tbody>
  </table>

</div>
<hr>

<div class ="container col-xs-8">

<H1>Consulta de Comentarios</H1>


@if($comments)
 <table class="table table-striped">
    <thead>
      <tr>
        <td>Número de Boleta</td>
        <td>Comentario</td>
        <td>Status</td>
      </tr>
    </thead>
    <tbody>
@foreach ($comments as $row)
@if ($row->status)

@endif
<tr>
  <td>{{$row->voucher_id}}</td>
  <td>{{$row->body}}</td>
  <td>{{$row->status}}</td>
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
      <form action="/comments" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="voucher_id" value="{{$voucher->id}}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <label>Comentario:</label>
                  
                 <textarea rows="2" name="body" required="true" class="form-control" >
                  </textarea>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
                <div class="clearfix"></div> 
            </div>
        </div>
    </form>
</div>
@endsection
