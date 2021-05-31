@include("layouts/master")
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 pb-3 bg-white border-b border-gray-200">
                <div class="container mt-5 bg-light rounded">
                    <h2 class="text-center pt-4">Agregar nuevo partido</h2>
                    <form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST" action="/partido">
                        @error('estadoPartido')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            El estado del partido es requerido
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @enderror

                        <!-- No olvidarse de cambiar las rutas en el formulario y el boton del final -->

                        <label for="estadoPartido">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" style="background-color: #002766;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Estado Del Partido
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#" value="Programado">Programado</a>
                                    <a class="dropdown-item" href="#" value="En_disputa">En Disputa</a>
                                    <a class="dropdown-item" href="#" value="Finalizado">Finalizado</a>
                                    <a class="dropdown-item" href="#" value="Aplazado">Aplazado</a>
                                </div>
                            </div>
                        </label>

                        <button type="submit" href="/partido/create" class="btn btn-primary ms-3"> Agregar Partido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>