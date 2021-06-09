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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card mt-4 shadow-lg">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Lista de Jugadores Libres</h3>
                                        <h1>Hola: {{ $equipo->id }}</h1>
                                        <a href="/jugadors/create" class="btn btn-primary btn-sm">Nuevo Jugador</a>
                                    </div>
                                    <div class="card-body text-center">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Apellido</th>
                                                    <th scope="col">Nacimiento</th>
                                                    <th scope="col">Nacionalidad</th>
                                                    <th width="280px text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jugadoresLibres as $jugadorLibre)
                                                <tr>
                                                    <th scope="row">{{ $jugadorLibre->nombre }}</th>
                                                    <td>{{ $jugadorLibre->apellido }}</td>
                                                    <td>{{ $jugadorLibre->fnacimiento }}</td>
                                                    <td>{{ $jugadorLibre->nacionalidad }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('equipo.vincular', ["idEquipo"=>$equipo->id, "idJugador"=>$jugadorLibre->id]) }}" class="btn btn-primary">Agregar</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card mt-4 shadow-lg">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Lista de Jugadores con Equipo</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <table class="table">
                                            <thead class="">
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Apellido</th>
                                                    <th scope="col">Nacimiento</th>
                                                    <th scope="col">Nacionalidad</th>
                                                    <th scope="col">Equipo</th>
                                                    <th width="280px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jugadores as $jugador)
                                                <tr>
                                                    <th scope="row">{{ $jugador->nombre }}</th>
                                                    <td>{{ $jugador->apellido }}</td>
                                                    <td>{{ $jugador->fnacimiento }}</td>
                                                    <td>{{ $jugador->nacionalidad }}</td>
                                                    <td>{{ $jugador->teamName}}</td>
                                                    <td class="text-center">
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-warning">Agregar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>