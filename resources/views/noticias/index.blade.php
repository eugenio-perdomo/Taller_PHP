<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<title>Diario Deportivo - Inicio</title>
	</head>

	<body>
		@include('layouts/app')
		<div class="container py-5">
			<div class="row flex flex-row justify-content-center">
				@foreach ($noticias as $noticia)
				<div class="card col-3 m-2 text-center">
					<div class="card-header">
						<h1><a class="text-reset text-decoration-none" href="">
								{{ $noticia->tituloNoticia }}
							</a>
						</h1>
					</div><a class="text-reset text-decoration-none mt-1" href="">
						<div class="card-body w-full h-80">
							<h1>
								{{ $noticia->copeteNoticia }}
							</h1>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</body>
</html>