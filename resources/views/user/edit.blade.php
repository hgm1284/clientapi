@extends('layouts.app1')

@section('content')
<div class="card col-md-8 col-md-offset-2">
 <a href="/users" class="btn btn-info btn-fill pull-right"></i>Regresar</a>
    <div class="header">
        <h4 class="title">Usuario</h4>
        <p class="category">Editar Usuario</p>
    </div>
    <div class="content">
        <form action="/users/{{$data->id}}" method="POST">
           <input type="hidden" name="_method" value="PUT">
        
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="form-group">
                    <label>Nombre de Usuario:</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre de Usuario" value="{{$data->name}}" required="required">
                </div>
                
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="email" value="{{$data->email}}" required="required">
                </div>

                <div class="form-group">
                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password:</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                <div class="clearfix"></div> 
            </div>
        </div>
    </form>
</div>
</div>
@endsection