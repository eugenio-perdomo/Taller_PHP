@include('layouts/app')
<div class="container d-flex bg-light mt-4 rounded shadow-lg border border-dark mb-4">
	<section class="d-flex flex-column align-items-start">
		<div class="col-xs-12 col-sm-12 col-md-12 mt-3 pb-3">
			<div class="form-group">
				@if($noticia->tipoNoticia == 'DatoColor')
				<span class="bg-primary fw-bolder rounded-pill p-2 text-dark">Dato Color</span>
				@endif
				@if($noticia->tipoNoticia == 'Información')
				<span class="bg-secondary fw-bolder rounded-pill p-2 text-dark">Información</span>
				@endif
				@if($noticia->tipoNoticia == 'Analisis')
				<span class="bg-warning fw-bolder rounded-pill p-2 text-dark">Analisis</span>
				@endif
				@if($noticia->tipoNoticia == 'Fichaje')
				<span class="bg-danger fw-bolder rounded-pill p-2 text-dark">Fichajes</span>
				@endif
				<p class="lead mt-2">Última edición: {{$noticia->updated_at->format('d/m/Y')}}</p>
			</div>
		</div>
		<div class="p-3 mt-2">
			<h1>{{ $noticia->tituloNoticia }}</h1>
		</div>

		<div class="p-4 mb-2">
			{{ $noticia->copeteNoticia }}
			<div class="col-xs-12 col-sm-12 col-md-12 mt-4">
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
		<div class="d-flex flex-column align-items-stretch flex-shrink-0 pe-5" style="width: 380px;">
			<br>
			<span class="fs-5 fw-semibold">Noticias relacionadas de tipo {{ $noticia->tipoNoticia }}</span>
			<br>
			<div class="d-flex justify-content-between">
				<button onclick="masRecientes()" class="btn rounded border-3 border-primary fw-bolder col-5">Más recientes</button>
				<button onclick="masVistas()" class="btn rounded border-3 border-primary fw-bolder col-5">Más vistas</button>
			</div>
			<div id="masRecientes" class="mt-3">
				@foreach ($listaRelacionada as $nota)
				<div class="list-group list-group-flush border-bottom scrollarea">
					<a href="{{ route('noticias.show',$nota->id) }}"
						class="list-group-item list-group-item-action active py-3 lh-tight rounded shadow border border-dark"
						aria-current="true">
						<div class="d-flex w-100 align-items-center justify-content-between">
							<strong class="mb-1">{{ $nota->tituloNoticia }}</strong>
							{{$nota->updated_at->format('d/m/Y')}}
						</div>
						<div class="col-10 mb-1 small">{{ $nota->copeteNoticia }}</div>
						<i class="fa fa-eye" aria-hidden="true"> {{ $nota->cantVisual }}</i>
					</a>
				</div>
				</br>
				@endforeach
			</div>
			<div id="masVistas" class="mt-3" style="display: none">
				@foreach ($listaRelacionadaVistas as $nota)
				<div class="list-group list-group-flush border-bottom scrollarea">
					<a href="{{ route('noticias.show',$nota->id) }}"
						class="list-group-item list-group-item-action active py-3 lh-tight rounded shadow border border-dark"
						aria-current="true">
						<div class="d-flex w-100 align-items-center justify-content-between">
							<strong class="mb-1">{{ $nota->tituloNoticia }}</strong>
							{{$nota->updated_at->format('d/m/Y')}}
						</div>
						<div class="col-10 mb-1 small">{{ $nota->copeteNoticia }}</div>
						<i class="fa fa-eye" aria-hidden="true"> {{ $nota->cantVisual }}</i>
					</a>
				</div>
				</br>
				@endforeach
			</div>
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

<script>
function masRecientes() {
  var r = document.getElementById("masRecientes");
  var v = document.getElementById("masVistas");
  if (r.style.display === "none") {
    r.style.display = "block";
    v.style.display = "none";
  }
}
function masVistas() {
  var r = document.getElementById("masRecientes");
  var v = document.getElementById("masVistas");
  if (v.style.display === "none") {
    v.style.display = "block";
    r.style.display = "none";
  }
}
</script>