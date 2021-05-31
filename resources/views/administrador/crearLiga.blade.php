@include("layouts/master")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar nuevo liga</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/liga">
                        @csrf
                        @error('nombre')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El nombre  de la liga es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror @if ($errors->has('participantes'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Los participantes son requeridos
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        @error('sistemaDeJuego')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Sistema de juego es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror
                        <!-- Agregar un lista de participantes con un drop down list-->
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Nombre de la liga</p><input type="text" name="nombreLiga" placeholder="Nombre de la liga" class="form-control mb-2" value="{{old('nombre')}}"></label>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Participantes</p><input type="text" name="participantes" placeholder="Participantes" class="form-control mb-2" value="{{old('apellido')}}"></label>
                        <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Sistema de juego</p><input type="text" name="sistemaDeJuego" placeholder="Sistema de juego" class="form-control mb-2" value="{{old('fNacimiento')}}"></label>
                        <button type="submit" href="/liga/create" class="btn btn-primary ms-3"> Agregar Liga </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>