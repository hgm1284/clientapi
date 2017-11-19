@extends('layouts.app1')

@section('content')


<h1>Consulta de Boleta</h1>
<h2>Boleta</h2>

<div class ="container col-xs-8">
<a href="/vouchers" class="btn btn-info btn-fill pull-right"></i>Regresar</a>


<table class="table table-striped">
    <thead>
      <tr>
        <td>Número de Boleta</td>
        <td>Marca</td>
        <td>Modelo</td>
        <td>Color</td>
        <td>Serie</td>
        <td>Adelanto</td>
        <td>Accesorios</td>
        <td>Estado</td>
        <td>Reporte</td>
        <td>ID_Cliente</td>
      </tr>
    </thead>
    <tbody>

<tr>
  <td>{{$voucher->id}}</td>
  <td>{{$voucher->brand}}</td>
  <td>{{$voucher->model}}</td>
  <td>{{$voucher->color}}</td>
  <td>{{$voucher->serie}}</td>
  <td>{{$voucher->money}}</td>
  <td>{{$voucher->accesories}}</td>
  <td>{{$voucher->status}}</td>
  <td>{{$voucher->report}}</td>
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

        <td>Comentario</td>
         <td>Número de Boleta</td>
        <td>Usuario</td>
      </tr>
    </thead>
    <tbody>
@foreach ($comments as $row)
@if ($row->status)

@endif
<tr>

  <td>{{$row->body}}</td>
  <td>{{$row->voucher_id}}</td>
  <td>{{$row->user_id}}</td>

  @if($row->status==='True')
 <td>Público</td>
  @ else
  <td>Privado</td>
  @endif

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

                 <textarea rows="4" name="body" required="true" class="form-control" >
                  </textarea>
                </div>
                <button type="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
</div>
@endsection
