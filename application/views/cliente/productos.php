<!DOCTYPE html>
<html>
<head>
	@include('templates/metadata')
	
	<title>Empresa S.R.L.</title>
	</head>
<body>
	@include("templates/header")
	@include("templates/navbar")

	<section id="productos">
		<div class="container">
			<h1 class='text-center'>Productos</h1>
			<div class="row">
				<div class="col-xs-10 col-ms-6 col-md-4">
					<form class="form-horizontal">
						<div class="form-group col-xs-12">
							<label>seleccione una categoría:</label>
							<select id="selector-categorias" class="form-control">
								<option value="">todos</option>
								@foreach($categorias as $categoria)
									@if( $categoria ->id == $categoriaRecibida)
										<option value="{{ $categoria ->id }}" selected>{{ $categoria ->nombre }}</option>
									@else
										<option value="{{ $categoria ->id }}">{{ $categoria ->nombre }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</form>
				</div>
			</div>
			<div class="row" id="grilla-productos">
				@foreach($productos as $producto)
				<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-1 col-md-2 col-md-offset-1" style="background-color: 'red'">
					<div class="row">
						<div class="col-xs-12">

							<img  src="{{ asset('storage/img_productos/' . $producto->imagen) }}" alt="{{ $producto->nombre}}" title="{{ $producto->nombre}}"/>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
						</div>
					</div>
				</div>
				@endforeach()
	
			</div>
		</div>
	</section>
		@include("templates/footer")
		<script src="js/grilla-productos.js"></script>
</body>
</html>