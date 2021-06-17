<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
@include('layouts/app')
<section class="d-flex flex-column align-items-start">
    <div class="p-3 mt-3">
        <h1>  {{ $liga->nombreLiga }}</h1>
    </div>
    
    <div class="p-4 mb-3">
        <div class="">
            <div class="">
                <strong>Nombre:</strong>
                {{ $liga->nombreLiga  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad de participantes:</strong>
                {{ $liga->participantes  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sistema de juego:</strong>
                {{ $liga->sistemaDeJuego  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="container">
                   <div class="row col-12 d-flex justify-content-start p-2">
                        Equipos Participantes:
                   </div>
                   <div class="row">
                        <div class="col-6 bg-dark text-white">Nombre</div>
                        <div class="col-6 bg-dark text-white">Nombre Corto</div>
                    </div>
                   @foreach($ligas as $equipo)
                        <div class="row">
                            <div class=" border border-dark p-1 col-6 d-flex justify-content-center">
                                <a href="/equipos/{{$equipo->equipo_id}}" >{{$equipo->nombre}}</a>
                            </div>
                            <div class=" border border-dark p-1 col-6 d-flex justify-content-center">
                                <a href="/equipos/{{$equipo->equipo_id}}" >{{$equipo->nomCorto}}</a>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="p-3">
        <a class="btn btn-primary" href="{{ route('ligas.index') }}" title="Go back"> Regresar </a>
    </div>
</section>

</body>
</html>