<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
	<!--@include('layouts/app')-->
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200 pb-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="card mt-4 shadow-lg">
									<div class="card-header d-flex justify-content-between align-items-center">
										<h3>Lista de Noticias</h3>
										<a href="/noticias/create" class="btn btn-primary btn-sm">Nueva Noticia</a>
									</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Titulo</th>
													<th scope="col">Copete</th>
													<th scope="col">Cuerpo</th>
													<th scope="col">Cantidad Visualizaciones</th>
													<th scope="col">Tipo de la noticia</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($noticias as $noticia)
												<tr>
													<th scope="row">{{ $noticia->tituloNoticia }}</th>
													<td>{{ $noticia->copeteNoticia }}</td>
													<td>{{ $noticia->cuerpoNoticia }}</td>
													<td>{{ $noticia->cantVisual }}</td>
													<td>{{ $noticia->tipoNoticia }}</td>
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