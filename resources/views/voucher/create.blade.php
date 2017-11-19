@extends('layouts.app1')

@section('content')
<div class="card col-md-8 col-md-offset-2">


	<div class="header">
		<h4 class="title">Boleta</h4>
		<p class="category">Crear nueva Boleta:</p>
	</div>
	 <div class="content">
       <form action="/vouchers" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    <label>Nombre del Artículo:</label>
                    <input type="text" class="form-control" name="article" placeholder="articulo"  required="required">
                </div>

                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" class="form-control" name="brand" placeholder="marca" required="required">
                </div>
                  <div class="form-group">
                    <label>modelo:</label>
                    <input type="text" class="form-control" name="model" placeholder="modelo" required="required">
                </div>
                  <div class="form-group">
                    <label>Serie:</label>
                    <input type="text" class="form-control" name="serie" placeholder="Serie"  required="required">
                </div>
                  <div class="form-group">
                    <label>Color:</label>
                    <input type="text" class="form-control" name="color" placeholder="color"  required="required">
                </div>
                  <div class="form-group">
                    <label>Adelanto:</label>
                    <input type="text" class="form-control" name="money" placeholder="adelanto"  required="required">
                </div>
                  <div class="form-group">
                    <label>Accesorios:</label>
                    <input type="text" class="form-control" name="accesories" placeholder="accesorios"  required="required">
                </div>
                  <div class="form-group">
                    <label>Estado:</label>
                    <input type="text" class="form-control" name="status" placeholder="estado"  required="required">
                </div>
                  <div class="form-group">
                    <label>Reporte:</label>
                    <input type="text" class="form-control" name="report" placeholder="reporte"  required="required">
                </div>

                    <div class="form-group">
                    <label>Usuario:</label>
                  	<select name="user_id" class="form-control" required="required">
                  @foreach ($users as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                 <a href="/vouchers" class="btn btn-info btn-fill pull-right"></i>Regresar</a>
                <div class="clearfix"></div>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
