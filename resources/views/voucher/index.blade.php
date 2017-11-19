@extends('layouts.app1')
@section('content')

<div class="row">
  <div class="col-md-8">
            <?php $perfil = Auth::user(); ?>
          @if ($perfil->role === 'Admin')
        <a href="/vouchers/create">
            <button class="btn btn-info btn-fill pull-right">Nueva</button>
        </a>
        @endif
        <h4 class="title">Boletas</h4>

    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
        @if($data)
            <thead>

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
                <td>Acciones</td>
            </thead>
                <tbody>
              @foreach ($data as $row)
               <tr>

  <td>{{$row->brand}}</td>
  <td>{{$row->model}}</td>
  <td>{{$row->color}}</td>
  <td>{{$row->serie}}</td>
  <td>{{$row->money}}</td>
  <td>{{$row->accesories}}</td>
  <td>{{$row->status}}</td>
  <td>{{$row->report}}</td>
  <td>{{$row->user_id}}</td>

                <td class="fixed col-sm-2">
                  <a href="/vouchers/{{$row->id}}"> <button type="button" class="btn btn-primary btn-xs">Ver</button> </a>
                </td>
                   @if ($perfil->role === 'Admin')
                  <td class="fixed col-sm-2">
                  <a href="/vouchers/{{$row->id}}/edit"> <button type="button" class="btn btn-primary btn-xs">Modificar</button> </a>
                   </td>
                    <td class="fixed col-sm-2">
                     <form action="/vouchers/{{$row->id}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-xs">Excluir</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
     @endif


<a href="/home">
            <button class="btn btn-info btn-fill pull-right">Regresar</button>
        </a>
        </div>
        </div>



@endsection
