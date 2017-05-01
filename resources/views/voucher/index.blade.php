@extends('layouts.app1')
@section('content')
<div class="card col-md-8 col-md-offset-2">
<div class="card">
    <div class="header">
        <a href="/vouchers/create">
            <button class="btn btn-info btn-fill pull-right">Nueva</button>
        </a>
        <h4 class="title">Boletas</h4>
        <p class="category">Boleta</p>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
        @if($data)
            <thead>
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
                <th>Actions</th>
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
  <td>{{$row->accesorio}}</td>
  <td>{{$row->estado}}</td>
  <td>{{$row->reporte}}</td>
  <td>{{$row->user_id}}</td>

                <td class="fixed col-sm-2">
                  <a href="/vouchers/{{$row->id}}"> <button type="button" class="btn btn-primary btn-xs">Show</button> </a>
                </td>
                  <td class="fixed col-sm-2">
                  <a href="/vouchers/{{$row->id}}/edit"> <button type="button" class="btn btn-primary btn-xs">Edit</button> </a>

                     <form action="/vouchers/{{$row->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     @endif
</div>
</div>
</div>

@endsection