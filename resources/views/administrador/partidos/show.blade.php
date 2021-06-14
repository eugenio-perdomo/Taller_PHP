<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts/app')
    <section class="d-flex flex-column align-items-start">
        <div class="p-4 mb-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                @if(session()->has('estadistica'))
                <div class="alert alert-success alert-dismissible fade show shadow-lg rounded" role="alert">
                    <strong>{{ session()->get('estadistica') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="form-group">
                    <strong>Id del Partido:</strong>
                    {{ $partido->id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado del Partido:</strong>
                    {{ $partido->estadoPartido  }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha:</strong>
                    {{ $partido->fecha  }}
                </div>
            </div>
            <div class="p-3">
                <a class="btn btn-info" href="{{ route('crearEstadistica', $partido->id) }}"> Cargar Estadisticas </a>
                <a class="btn btn-primary" href="{{ route('partidos.index') }}" title="Go back"> Regresar </a>
            </div>
        </div>
    </section>

</body>

</html>