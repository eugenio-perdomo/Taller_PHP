<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Diario Deportivo - Inicio</title>
</head>

<body>
	@include('layouts/app')
	<h1 class="text-center pt-3 pb-4 border-bottom text-uppercase shadow-sm p-3 mb-5 bg-body rounded">Sección de Noticias</h1>
	<div class="container py-2">
		<div class="row flex flex-row gx-5 gy-5 justify-content-center">
			@foreach ($noticias as $noticia)
			<div class="card col-sm-12 col-md-5	 col-lg-3 col-xl-3 m-2 text-center shadow-lg p-3 mb-5 bg-body rounded @if($loop->first) col-sm-12 col-md-6 col-lg-6 col-xl-6 @endif">
				<div class="card-header">
					<h1><a class="text-reset text-decoration-none" href="">
							{{$noticia->tituloNoticia}}
						</a>
					</h1>
				</div><a class="text-reset text-decoration-none mt-1" href="">
					<div class="card-body w-full h-80">
						<h1>
							{{$noticia->copeteNoticia}}
						</h1>
					</div>
				</a>
			</div>
			@endforeach
			<div class="card-footer d-flex justify-content-center mr-auto">
				{{ $noticias->links() }}
			</div>
		</div>
	</div>
</body>

</html>