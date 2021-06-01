@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar estadisticas de un partido</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/equipos">
                        <!-- @csrf
                        @error('nombre')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror @if ($errors->has('apellido'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre corto es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif -->
                        - posesion : int
                        - tirosTotales : int
                        - tirosPuerta : int
                        - corner : int
                        - offside : int
                        - faltas : int
                        - amarillas : int
                        - rojas : int
                        <p class="text-center p-1 text-light" style="background-color: #002766;">Para cada entrada escriba un número</p>
                        <br>
                        <label for="posesion">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Posesion</p>
                            <input type="number" name="posesion" placeholder="Posesion" class="form-control mb-2" value="{{old('posesion')}}">
                        </label>
                        <br>

                        <label for="tirosTotales">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros Totales</p>
                            <input type="number" name="tirosTotales" placeholder="Tiros Totales" class="form-control mb-2" value="{{old('tirosTotales')}}">
                        </label>
                        <br>

                        <label for="tirosPuerta">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Tiros Puerta</p>
                            <input type="number" name="tirosPuerta" placeholder="Tiros Puerta" class="form-control mb-2" value="{{old('tirosPuerta')}}">
                        </label>
                        <br>

                        <label for="corner">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Corner</p>
                            <input type="number" name="corner" placeholder="Corner" class="form-control mb-2" value="{{old('corner')}}">
                        </label>
                        <br>

                        <label for="offside">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Offside</p>
                            <input type="number" name="offside" placeholder="Offside" class="form-control mb-2" value="{{old('offside')}}">
                        </label>
                        <br>

                        <label for="faltas">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Faltas</p>
                            <input type="number" name="faltas" placeholder="Faltas" class="form-control mb-2" value="{{old('faltas')}}">
                        </label>
                        <br>

                        <label for="amarillas">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Amarillas</p>
                            <input type="number" name="amarillas" placeholder="Amarillas" class="form-control mb-2" value="{{old('amarillas')}}">
                        </label>
                        <br>

                        <label for="rojas">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Rojas</p>
                            <input type="number" name="rojas" placeholder="Rojas" class="form-control mb-2" value="{{old('rojas')}}">
                        </label>
                        <br>

                        <button type="submit" href="/estadistica/create" class="btn btn-primary ms-3"> Agregar las estadisticas </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>