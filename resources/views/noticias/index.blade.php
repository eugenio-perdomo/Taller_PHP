@include('layouts/app')
<div class="container py-5">
	<div class="row flex flex-row justify-content-center">
		@foreach ($noticias as $noticia)
		<div class="card col-3 m-2 text-center">
			<div class="card-header">
				<h1><a class="text-reset text-decoration-none" href="{{ route('noticias.show',$noticia->id) }}">
						{{ $noticia->tituloNoticia }}
					</a>
				</h1>
			</div><a class="text-reset text-decoration-none mt-1" href="{{ route('noticias.show',$noticia->id) }}">
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