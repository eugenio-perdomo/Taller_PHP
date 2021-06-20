@include('layouts/app')
<div class="container d-flex">
	<section class="d-flex flex-column align-items-start" style="margin-left: -6em;">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<span >Categoria: {{ $noticia->tipoNoticia }} <br> Fecha: {{$noticia->created_at->format('d/m/Y')}}</span>
			</div>
		</div>
		<div class="p-3 mt-2">
			<h1>{{ $noticia->tituloNoticia }}</h1>
		</div>

		<div class="p-4 mb-2">
			{{ $noticia->copeteNoticia }}
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					@if ($noticia->direccion)
					<img id="imagen" src="{{URL::asset('storage/'.$noticia->direccion)}}">
					@else
					<img id="imagen"
						src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg">
					@endif
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<br>
					{{ $noticia->cuerpoNoticia }}
				</div>
			</div>
		</div>
	</section>
	<div class="b-example-divider"></div>
	<section style="margin-left: 15em;">
		<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
			<br>
			<span class="fs-5 fw-semibold">Noticias relacionadas de tipo {{ $noticia->tipoNoticia }}</span>
			<br>
			@foreach ($listaRelacionada as $nota)
			<div class="list-group list-group-flush border-bottom scrollarea">
				<a href="{{ route('noticias.show',$nota->id) }}"
					class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
					<div class="d-flex w-100 align-items-center justify-content-between">
						<strong class="mb-1">{{ $nota->tituloNoticia }}</strong>
						{{$nota->created_at->format('d/m/Y')}}
					</div>
					<div class="col-10 mb-1 small">{{ $nota->copeteNoticia }}</div>
				</a>
			</div>
			</br>
			@endforeach
		</div>
	</section>
</div>

<style>
	#imagen {
		width: 40em;
		height: auto;
		border: solid black 1px;
	}
</style>