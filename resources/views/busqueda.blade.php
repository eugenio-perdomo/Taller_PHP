@include('layouts/app')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="d-flex col-md-8">
                            <div class="container col-6">
                                <div class="card border border-dark w-100 mt-4 shadow-lg">
                                    <div class="card-header fw-bolder display-6">
                                        Equipos
                                    </div>
                                    @if($equipos->count() == 0)
                                    <div class="card-body fw-bolder text-center">No hay registros que coincidan con la busqueda</div>
                                    @endif
                                    <div class="card-body">
                                        @foreach($equipos as $equipo)
                                        <div class="border-bottom"><a class="text-decoration-none text-dark fw-bold"
                                                href="/equipos/{{$equipo->id}}">
                                                {{$equipo->nombre}}
                                                {{$equipo->nomCorto}}
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card border border-dark w-100 mt-4 shadow-lg">
                                    <div class="card-header fw-bolder display-6">
                                        Jugadores
                                    </div>
                                    @if($jugadores->count() == 0)
                                    <div class="card-body fw-bolder text-center">No hay registros que coincidan con la busqueda</div>
                                    @endif
                                    <div class="card-body">
                                        @foreach($jugadores as $jugador)
                                        <div><a class="text-decoration-none text-dark fw-bold"
                                                href="/jugadors/{{$jugador->id}}">{{$jugador->nombre}}
                                                {{$jugador->apellido}}
                                            </a></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="container col-6">
                                <div class="card border border-dark w-100 mt-4 shadow-lg">
                                    <div class="card-header fw-bolder display-6">
                                        Ligas
                                    </div>
                                    @if($ligas->count() == 0)
                                    <div class="card-body fw-bolder text-center">No hay registros que coincidan con la busqueda</div>
                                    @endif
                                    <div class="card-body">
                                        @foreach($ligas as $liga)
                                        <div><a class="text-decoration-none text-dark fw-bold"
                                                href="/ligas/{{$liga->id}}">{{$liga->nombreLiga}}</a></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card border border-dark w-100 mt-4 shadow-lg">
                                    <div class="card-header fw-bolder display-6">
                                        Noticias
                                    </div>
                                    @if($noticias->count() == 0)
                                    <div class="card-body fw-bolder text-center">No hay registros que coincidan con la busqueda</div>
                                    @endif
                                    <div class="card-body">
                                        @foreach($noticias as $noticia)
                                        <div>
                                            <a class="text-decoration-none text-dark fw-bold"
                                                href="/noticia/{{$noticia->id}}">{{$noticia->tituloNoticia}}</a>
                                        </div>
                                        @endforeach
                                    </div>
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