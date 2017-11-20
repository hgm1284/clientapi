@extends('layouts.app1')

@section('content')
<div class="card col-md-8 col-md-offset-2">
 <a href="/vouchers" class="btn btn-info btn-fill pull-right"></i>Regresar</a>
    <div class="header">
        <h4 class="title">Boleta</h4>
        <p class="category">Editar Boleta</p>
    </div>
    <div class="content">
        <form action="/vouchers/{{$voucher->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" class="form-control" name="brand" placeholder="marca" value="{{$voucher->brand }}" required="required">
                </div>
                  <div class="form-group">
                    <label>modelo:</label>
                    <input type="text" class="form-control" name="model" placeholder="modelo" value="{{$voucher->model }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Serie:</label>
                    <input type="text" class="form-control" name="serie" placeholder="Serie" value="{{$voucher->serie }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Color:</label>
                    <input type="text" class="form-control" name="color" placeholder="color" value="{{$voucher->color }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Adelanto:</label>
                    <input type="text" class="form-control" name="money" placeholder="adelanto" value="{{$voucher->money }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Accesorios:</label>
                    <input type="text" class="form-control" name="accesories" placeholder="accesorios" value="{{$voucher->accesories }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Estado:</label>
                    <input type="text" class="form-control" name="status" placeholder="estado" value="{{$voucher->status }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Reporte:</label>
                    <input type="text" class="form-control" name="report" placeholder="reporte" value="{{$voucher->report }}" required="required">
                </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
