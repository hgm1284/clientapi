@extends('layouts.app1')

@section('content')

<div class="row">
  <div class="col-md-2">
    
  </div>
  <div class="col-md-8">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Perfíl</div>
  <div class="panel-body">
  <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Nombre :</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" value={{$data->name}} readonly=true>
  </div>
<br>
    <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Email :</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" value={{$data->email}} readonly=true>
  </div>
  <br>

    <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Rol :</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" value={{$data->role}} readonly=true>
  </div>
  <br>

    <div class="input-group input-group-lg">
  <span class="input-group-addon" id="sizing-addon1">Registrado desde :</span>
  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1" value="" readonly=true>
  </div>


</div>

  </div>
  <button type="button" class="btn btn-primary">Regresar</button>
</div>
<div class="col-md-2">
  
</div>

@endsection
