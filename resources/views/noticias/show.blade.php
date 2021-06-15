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
	</div>
</section>