<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Maricells</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<!-- Bootstrap core CSS     -->
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="/assets/css/animate.min.css" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
@yield('css')
</head>
<body id="app-layout">
<div class="wrapper">
  <div class="sidebar" data-color="azure" data-image="/assets/img/sidebar.jpg">
    <div class="sidebar-wrapper">
      <div class="logo">
        <a href="{{ url('/home') }}" class="simple-text">Maricells</a>
      </div>
      <ul class="nav">
      

        <li>
          <?php $perfil = Auth::user(); ?>
        @if ($perfil->role === 'Admin')
        <a href="/users"><i class="pe-7s-users"></i><p>Usuarios</p></a>
        @endif
          <a href="/me"><i class="pe-7s-id"></i><p>Perfíl</p></a>
          <a href="/vouchers"><i class="pe-7s-note2"></i><p>Boletas</p></a>
          
        </li>
    
      </ul>

    </div>
  </div>
  <div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
                                      <a href="/logout"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Salir
                                      </a>

                                      <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                  </li>
           
          </ul>
        </div>
      </div>
    </nav>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

     <style>
    #map {
      height: 400px;
      width: 100%;
     }
  </style>
</head>
<body>
  <h3>Encuentra Talleres de Reparaciones</h3>
  <div id="map"></div>
  <script>
    function initMap() {
      var marycells = {lat: 10.324514, lng: -84.431971};
      var jaime = {lat: 10.327087, lng: -84.430203};
      var quincho = {lat: 10.329783, lng: -84.419337};
      var celfix = {lat: 10.324974, lng: -84.431485};

      var contentString = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">Celulares Mary Cells</h1>' +
'<div id="bodyContent">'+
'<p><b>Mary Cells</b>, es una tienda especializada en la venta y reparación de celulares. ' +
' La experiencia se ha logrado gracias a la calidad y la originalidad que se ofrece en cada producto que los clientes adquieren... '+
' Se realizan reparaciones de celulares y tablets de las marcas: Nokia, Samsung Galaxy, Sony Xperia, Alcatel, Blu, Apple, LG. ' +
' Servicio de reparaciones en 1 hora o 24 horas. ' +
' Repuestos Originales y de Calidad Original. ' +
' Lunes a Viernes de 8:30am a 6:00pm y sábados de 9am a 5pm. ' +
' Teléfonos: 2461-1452 y 2461-4130. ' +
'</p>' +
'</div>' +
'</div>';

  var contentString2 = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">Euro Taller Quincho San Carlos</h1>' +
'<div id="bodyContent">'+
'<p><b>Taller Quincho</b>, Taller especializado en multiservios. Miembro de la mayor red de talleres del mundo. ' +
' Ofrecemos los servicios de mécanica general, mantenimiento preventido, garantías y mantenimientos de agencia. '+
' Direccíón: 200 metros oeste de la Dos Pinos, Ciudad Quesada, San Carlos. ' +
' Teléfonos: 2461-0923. ' +
' Repuestos Originales y de Calidad Original. ' +
' Correo Eléctronica: eurotallerquinchocq@gmail.com. ' +
'</p>' +
'</div>' +
'</div>';

var infowindow = new google.maps.InfoWindow({
content: contentString
});

var infowindow2 = new google.maps.InfoWindow({
content: contentString2
});

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: marycells
      });

      var markerMary = new google.maps.Marker({
        position: marycells,
        map: map
      });

      markerMary.addListener('click', function() {
      infowindow.open(map, markerMary);
      });

      var markerJaime = new google.maps.Marker({
        position: jaime,
        map: map
      });

       var markerQuincho = new google.maps.Marker({
        position: quincho,
        map: map
      });

      markerQuincho.addListener('click', function() {
      infowindow2.open(map, markerQuincho);
      });

       var markerCelfix = new google.maps.Marker({
        position: celfix,
        map: map
      });
    }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbZEsqGYD3S-eUK1AYX6IZflmetF7AfiI&callback=initMap">
  </script>

    <footer class="footer">
      <div class="container-fluid">
        <p class="copyright pull-right">Maricells&copy; 2017</p>
      </div>
    </footer>
  </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--  Checkbox, Radio & Switch Plugins -->
<script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>
<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/assets/js/light-bootstrap-dashboard.js"></script>
@yield('scripts')
</html>