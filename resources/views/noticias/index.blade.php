@include('layouts/app')
<div class="container py-4">
	@if(session()->has('login'))
	<div class="alert alert-success alert-dismissible fade show shadow-lg rounded" role="alert">
		<strong>{{ session()->get('login') }}</strong>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<div class="row flex flex-row justify-content-center">
		@foreach ($noticias as $noticia)
		<div class="card col-md-5 m-2 text-center shadow-lg rounded border-dark">
			<div class="card-header text-light fw-bolder mt-2" style="background-color: #002766;">
				<span>
					<small style="float: left">{{$noticia->updated_at->diffForHumans()}}</small>
					<small style="float: right"><i class="fa fa-eye" aria-hidden="true">
							{{$noticia->cantVisual}}</i></small>
				</span>
				@if($noticia->tipoNoticia == 'DatoColor')
				<span class="bg-primary fw-bolder rounded-pill p-1 text-light">Dato Color</span>
				@endif
				@if($noticia->tipoNoticia == 'Información')
				<span class="bg-secondary fw-bolder rounded-pill p-1 text-light">Información</span>
				@endif
				@if($noticia->tipoNoticia == 'Analisis')
				<span class="bg-warning fw-bolder rounded-pill p-1 text-light">Analisis</span>
				@endif
				@if($noticia->tipoNoticia == 'Fichaje')
				<span class="bg-danger fw-bolder rounded-pill p-1 text-light">Fichajes</span>
				@endif
				<h3 class="mt-3"><a class="text-reset text-decoration-none" href="{{ route('noticias.show',$noticia->id) }}">
						{{ $noticia->tituloNoticia }}
					</a>
				</h3>
			</div><a class="text-reset text-decoration-none mt-1" href="{{ route('noticias.show',$noticia->id) }}">
				{{-- <div class="card-body w-full h-80">
					<h1>
						{{ $noticia->copeteNoticia }}
				</h1>
		</div> --}}
		<div class="card-body w-full h-80">
			@if ($noticia->direccion)
			<img id="imagen" src="{{URL::asset('storage/'.$noticia->direccion)}}">
			@else
			<img id="imagen"
				src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg">
			@endif
		</div>
		</a>
	</div>
	@endforeach
	{{ $noticias->links() }}
</div>
</div>

<style>
	#imagen {
		width: 12em;
		height: auto;
		border: solid black 1px;
	}
</style>