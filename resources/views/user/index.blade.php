@extends('layouts.app1')
@section('content')
 

          <?php $perfil = Auth::user(); ?>
        @if ($perfil->role === 'Admin')
      <a href="/register">
          <button class="btn btn-info btn-fill pull-right">Nuevo Usuario</button>
      </a>
      @endif
      <h4 class="title">Usuarios</h4>
    
  </div>
  <div class="content table-responsive table-full-width">
      <table class="table table-hover table-striped">
      @if($data)
          <thead>
          
      <td>Nombre</td>
      <td>Correo</td>
      <td>Rol</td>
              <th>Acciones</th>
          </thead>
              <tbody>
            @foreach ($data as $row)
             <tr>
            
<td>{{$row->name}}</td>
<td>{{$row->email}}</td>
<td>{{$row->role}}</td>

              <td class="fixed col-sm-2">
                <a href="/users/{{$row->id}}"> <button type="button" class="btn btn-primary btn-xs">Ver</button> </a>
              </td>                 
                 @if ($perfil->role === 'Admin')
                  <td class="fixed col-sm-2">
                  <a href="/users/{{$row->id}}/edit"> <button type="button" class="btn btn-primary btn-xs">Modificar</button> </a>
                   </td>
                  <td class="fixed col-sm-2">
                   <form action="/users/{{$row->id}}" method="POST">
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

@endsection