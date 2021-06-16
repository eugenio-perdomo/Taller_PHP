@include('layouts/app')
<section class="d-flex flex-column align-items-start">
	<div class="p-3 mt-3">
		<h1>{{ $noticia->tituloNoticia }}</h1>
	</div>

	<div class="p-4 mb-3">
		<div class="">
			<div class="">
				{{ $noticia->copeteNoticia }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				{{ $noticia->cuerpoNoticia }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				{{ $noticia->tipoNoticia }}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				@if ($noticia->direccion)
					<img id="imagen" src="{{URL::asset('storage/'.$noticia->direccion)}}">
				@else
					<img id="imagen" src="https://3.bp.blogspot.com/-q11rITGRRag/WMDnW8qFiSI/AAAAAAAAD90/9fvxhkfRHNMAK6cjmFf3yqvnj6M8BpgQQCK4B/s1600/canchas-de-futbol-14.jpg">
				@endif
			</div>
		</div>
	</div>
</section>
<style>
	#imagen{
		width:40em;
		height:auto;
		border: solid black 1px;
	}
</style>