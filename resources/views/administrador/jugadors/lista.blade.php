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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 pb-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card mt-4 shadow-lg">
                                    @if(session()->has('destroy'))
                                    <div class="alert alert-danger alert-dismissible fade show shadow-lg rounded"
                                        role="alert">
                                        <strong>{{ session()->get('destroy') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Jugadores</h3>
                                        <a href="/jugadors/create" class="btn btn-primary btn-sm">Nuevo Jugador</a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
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
                                                    <td>{{ $jugador->fnacimiento->format('d-m-Y') }}</td>
                                                    <td>{{ $jugador->nacionalidad }}</td>
                                                    <td>{{ $jugador->teamName }}</td>
                                                    <td>
                                                        <form action="{{ route('jugadors.destroy',$jugador->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-info"
                                                                href="{{ route('jugadors.show',$jugador->id) }}">Mostrar</a>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('jugadors.edit',$jugador->id) }}">Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('¿Desea eliminar el jugador: {{$jugador->nombre}}?')">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $jugadores->links() }}
                                    </div>
                                </div>
                                <div class="card mt-4 shadow-lg">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3>Jugadores Libres</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Apellido</th>
                                                    <th scope="col">Nacimiento</th>
                                                    <th scope="col">Nacionalidad</th>
                                                    <th width="280px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($jugadoresLibres as $jugadorLibre)
                                                <tr>
                                                    <th scope="row">{{ $jugadorLibre->nombre }}</th>
                                                    <td>{{ $jugadorLibre->apellido }}</td>
                                                    <td>{{ $jugadorLibre->fnacimiento->format('d-m-Y') }}</td>
                                                    <td>{{ $jugadorLibre->nacionalidad }}</td>
                                                    <td>
                                                        <form action="{{ route('jugadors.destroy',$jugadorLibre->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-info"
                                                                href="{{ route('jugadors.show',$jugadorLibre->id) }}">Mostrar</a>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('jugadors.edit',$jugadorLibre->id) }}">Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('¿Desea eliminar el jugador: {{$jugadorLibre->nombre}}?')">Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $jugadoresLibres->links() }}
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