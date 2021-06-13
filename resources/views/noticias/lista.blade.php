@include('layouts/app')
<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-7 lg:px-8">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 bg-white border-b border-gray-200 pb-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="card mt-4 shadow-lg">
								<div class="card-header d-flex justify-content-between align-items-center">
									<h3>Lista de Noticias</h3>
									@can('noticias.create')
									<a href="/noticia/create" class="btn btn-primary btn-sm">Nueva Noticia</a>
									@endcan
								</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Titulo</th>
												<th scope="col">Copete</th>
												<th scope="col">Tipo</th>
												<th width="280px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($noticias as $noticia)
											<tr>
												<th scope="row">{{ $noticia->tituloNoticia }}</th>
												<td>{{ $noticia->copeteNoticia }}</td>
												<td>{{ $noticia->tipoNoticia }}</td>
												<td>
													<form action="{{ route('noticias.destroy',$noticia->id) }}" method="POST">
														<a class="btn btn-info" href="{{ route('noticias.show',$noticia->id) }}">Mostrar</a>
														<a class="btn btn-primary" href="{{ route('noticias.edit',$noticia) }}">Editar</a>
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger"
															onclick="return confirm('¿Desea eliminar la noticia?')">Eliminar</button>
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