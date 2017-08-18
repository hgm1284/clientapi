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
                    <label>Nombre del Artículo:</label>
                    <input type="text" class="form-control" name="articulo" placeholder="articulo" value="{{$voucher->articulo}}" required="required">
                </div>
                
                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" class="form-control" name="marca" placeholder="marca" value="{{$voucher->marca }}" required="required">
                </div>
                  <div class="form-group">
                    <label>modelo:</label>
                    <input type="text" class="form-control" name="modelo" placeholder="modelo" value="{{$voucher->modelo }}" required="required">
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
                    <input type="text" class="form-control" name="adelanto" placeholder="adelanto" value="{{$voucher->adelanto }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Accesorios:</label>
                    <input type="text" class="form-control" name="accesorio" placeholder="accesorios" value="{{$voucher->accesorio }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Estado:</label>
                    <input type="text" class="form-control" name="estado" placeholder="estado" value="{{$voucher->estado }}" required="required">
                </div>
                  <div class="form-group">
                    <label>Reporte:</label>
                    <input type="text" class="form-control" name="reporte" placeholder="reporte" value="{{$voucher->reporte }}" required="required">
                </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                <div class="clearfix"></div> 
            </div>
        </div>
    </form>
</div>
</div>
@endsection