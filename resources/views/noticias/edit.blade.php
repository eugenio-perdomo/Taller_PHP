@include('layouts/app')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('noticias.index') }}">Regresar</a>
			</div>
		</div>
	</div>
		<br>
		<br>
	@if ($errors->any())
	<div class="alert alert-danger">
		Hubo un problema con la edición.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form action="{{ route('noticias.edit',$noticia->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Id de la noticia: {{$noticia->id}}</strong>
				</div>
			</div>
			<label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Titulo</p>
				<input type="text" name="tituloNoticia" placeholder="Titulo" class="form-control mb-2" value="{{old('tituloNoticia')}}">
			</label>
      <br>
      <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Copete</p>
				<input type="text" name="copeteNoticia" placeholder="Copete" class="form-control mb-2" value="{{old('copeteNoticia')}}">
			</label>
      <br>
      <label for=""><p class="text-center p-1 text-light" style="background-color: #002766;">Cuerpo</p>
				<input type="text" name="cuerpoNoticia" placeholder="Cuerpo" class="form-control mb-2" id="{{old('cuerpoNoticia')}}">
			</label>
			<br>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Tipo de la noticia:</strong>
					<select name="tipoNoticia">
						<option value="Analisis">Analisis</option>
						<option value="DatoColor">Dato Color</option>
						<option value="Fichaje">Fichaje</option>
						<option value="Información">Información</option>
					</select>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Aceptar</button>
			</div>
		</div>
	</form>
</div>