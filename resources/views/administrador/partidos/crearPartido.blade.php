@include("layouts/app")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar nuevo partido</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/ligas">
                        @csrf
                        @error('nombre')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre de la liga es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror @if ($errors->has('estadoPartido'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Los estado de partido es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @error('fecha')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Fecha es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <label for="estadoPartido">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Estado de Partido</p><input type="text" name="estadoPartido" placeholder="Estado del partido" class="form-control mb-2" value="{{old('estadoPartido')}}">
                        </label>

                        <label for="fecha">
                            <p class="text-center p-1 text-light" style="background-color: #002766;">Fecha</p><input type="date" name="fecha" placeholder="fecha" class="form-control mb-2" value="{{old('fecha')}}">
                        </label>

                        <button type="submit" href="/partido/create" class="btn btn-primary ms-3"> Agregar Partido </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>