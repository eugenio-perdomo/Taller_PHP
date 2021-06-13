@include("layouts/app")
<div class="py-12">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 pb-3 bg-white border-b border-gray-200">
				<div class="container mt-5 bg-light rounded">
					<h2 class="text-center pt-4">Agregar nueva noticia</h2>
					<form class="container pb-4 text-uppercase font-monospace fs-6 fst-italic fw-bolder mt-5" method="POST"
						action="/noticia">
						@csrf
						@error('tituloNoticia')
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							El Titulo es requerido
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@enderror
						@error('copeteNoticia')
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							El Copete es requerido
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						@enderror
						<label for="">
							<p class="text-center p-1 text-light" style="background-color: #002766;">Titulo</p>
							<input type="text" name="tituloNoticia" placeholder="Titulo" class="form-control mb-2"
								value="{{old('tituloNoticia')}}">
						</label>
						<br>
						<label for="">
							<p class="text-center p-1 text-light" style="background-color: #002766;">Copete</p>
							<input type="text" name="copeteNoticia" placeholder="Copete" class="form-control mb-2"
								value="{{old('copeteNoticia')}}">
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
						<br>
						<!-- <div class="form-group">
							!! Form::label('cuerpoNoticia', 'Cuerpo:')!!}
							!! Form::textarea('cuerpoNoticia', null, ['class' => 'form-control'])!!}
							@error('cuerpoNoticia')
								<small class="text-danger">Porfavor complete el cuerpo</small>
							@enderror
						</div> -->
						<label for="">
							<p class="text-center p-1 text-light" style="background-color: #002766;">Cuerpo</p>
							<input type="text" name="cuerpoNoticia" placeholder="Cuerpo" class="form-control mb-2"
								id="{{old('cuerpoNoticia')}}">
						</label>
						
						<br>
						<button type="submit" href="/noticias/create" class="btn btn-primary ms-3"> Agregar Noticia </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>