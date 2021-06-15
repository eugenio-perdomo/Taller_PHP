@include("layouts/app")
<h2 class="text-center mt-3">Cargar acciones del partido</h2>
<hr>
@if(session()->has('accion'))
<div class="alert alert-success alert-dismissible fade show shadow-lg rounded" role="alert">
    <strong>{{ session()->get('accion') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container d-flex justify-content-between mx-auto mt-5">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <p class="fw-bolder, fs-3">Equipo Local</p>
            </div>
            <div class="card-body">
                <p>{{ $equipoLocal->nombre }}</p>
                <form method="POST"
                    action="{{ route('cargarAccion', ['idPartido' => $partido->id, 'estado' => 'Local']) }}">
                    <div class="container mt-4 mx-auto text-center">
                        @csrf
                        <label for="jugador">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Elegir jugador</p>
                            <select class="form-select" name="jugador">
                                @foreach ($jugadoresLocales as $jugadorLocal)
                                <option value="{{ $jugadorLocal->id }}"> {{ $jugadorLocal->apellido }},
                                    {{ $jugadorLocal->nombre }} </option>
                                @endforeach
                            </select>
                        </label>
                        <label for="minuto">
                            <p class="text-center p-1 text-light mt-2" style="background-color: #002766;">Minuto</p>
                            <select class="form-select" name="minuto">
                                @for ($i = 1; $i < 126; $i++) <option value="{{$i}}">
                                    {{ $i }} </option>
                                    @endfor
                            </select>
                        </label>
                        <label for="accion">
                            <p class="text-center p-1 text-light mt-2" style="background-color: #002766;">Accion</p>
                            <select class="form-select" name="accion">
                                <option value="Gol">Gol</option>
                                <option value="Asistencia">Asistencia</option>
                                <option value="Gol en contra">Gol en contra</option>
                                <option value="Amarilla">Tarjeta Amarilla</option>
                                <option value="Roja">Tarjeta Roja</option>
                            </select>
                        </label>
                    </div>
                    <div class="container text-center">
                        <button type="submit" class="btn btn-primary mt-4">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-5">
    <div class="card">
        <div class="card-header">
            <p class="fw-bolder, fs-3">Equipo Local</p>
        </div>
        <div class="card-body">
            <p>{{ $equipoLocal->nombre }}</p>
            <form method="POST"
                action="{{ route('cargarAccion', ['idPartido' => $partido->id, 'estado' => 'Visitante']) }}">
                <div class="container mt-4 mx-auto text-center">
                    @csrf
                    <label for="jugador">
                        <p class="text-center p-1 text-light" style="background-color: #002766;">Elegir jugador</p>
                        <select class="form-select" name="jugador">
                            @foreach ($jugadoresVisitantes as $jugadorVisitante)
                            <option value="{{ $jugadorVisitante->id }}"> {{ $jugadorVisitante->apellido }},
                                {{ $jugadorVisitante->nombre }} </option>
                            @endforeach
                        </select>
                    </label>
                    <label for="minuto">
                        <p class="text-center p-1 text-light mt-2" style="background-color: #002766;">Minuto</p>
                        <select class="form-select" name="minuto">
                            @for ($i = 1; $i < 126; $i++) <option value="{{$i}}">
                                {{ $i }} </option>
                                @endfor
                        </select>
                    </label>
                    <label for="accion">
                        <p class="text-center p-1 text-light mt-2" style="background-color: #002766;">Accion</p>
                        <select class="form-select" name="accion">
                            <option value="Gol">Gol</option>
                            <option value="Asistencia">Asistencia</option>
                            <option value="Gol en contra">Gol en contra</option>
                            <option value="Amarilla">Tarjeta Amarilla</option>
                            <option value="Roja">Tarjeta Roja</option>
                        </select>
                    </label>
                </div>
                <div class="container text-center">
                    <button type="submit" class="btn btn-primary mt-4">Agregar</button>
            </form>
        </div>
    </div>
</div>