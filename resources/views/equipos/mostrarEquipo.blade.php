<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información {{$equipo->nombre}} - Diario Deportivo</title>
</head>

<body>
    @include('layouts/app')
    <div class="container mt-3 bg-light shadow-lg rounded pb-5">
        <h1 class="ms-2 mt-2">{{$equipo->nombre}}</h1>
        <div class="card mt-4 mb-3 shadow-lg w-75 mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Lista de Jugadores</h3>
                @can('jugadores.create')
                <h2>Hola: {{$equipo->id}}</h2>
                <a href="{{ route('equipos.agregar', $equipo->id) }}" class="btn btn-primary text-light fw-bolder">Agregar Jugadores</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Nacionalidad</th>
                            @can('jugadores.create')<th width="280px"></th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $jugador)
                        <tr>
                            <th scope="row">{{ $jugador->nombre }}</th>
                            <td>{{ $jugador->apellido }}</td>
                            <td>{{ $jugador->fnacimiento }}</td>
                            <td>{{ $jugador->nacionalidad }}</td>
                            @can('jugadores.create')
                            <td>
                                <form action="{{ route('jugadors.destroy',$jugador->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('jugadors.show',$jugador->id) }}">Perfil</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Quitar</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>