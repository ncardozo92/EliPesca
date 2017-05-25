<!DOCTYPE html>
<html lang="es">

<head>
	@include("templates/metadata")
	<title>Modulo Administrador</title>
</head>

<body>
	@include("templates/header")
	@include("templates/navbar-admin")
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-push-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Crear producto</h4>
					</div>
					<div class="panel-body">
						<form action="crear-producto" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							@if(count($errors) >0)
							<div class="alert alert-danger text-center">
								Hubo un error al enviar los datos, por favor vuelva a intentarlo
							</div>
							@endif

							<div class="form-group">
								<label>ingrese nombre:</label>
								<input type="text" name="nombre" class="form-control"/>
								<span class="text-danger">Debe ingresar un nombre</span>
							</div>
							<div class="form-group">
								<label>ingrese breve descripción:</label>
								<input type="text" name="descripcion" class="form-control"/>
								<span class="text-danger">Debe ingresar una descripción breve</span>
							</div>
							<!--<div class="form-group">
								<label>ingrese descripción completa:</label>
								<div id="textoCompleto" class="form-group">
									<div id="wysihtml5-toolbar" style="display: none;">
										<a data-wysihtml5-command="bold" class="btn btn-default btn-sm">Negrita</a>
										<a data-wysihtml5-command="italic" class="btn btn-default btn-sm">italica</a>
										<a data-wysihtml5-command="undo" class="btn btn-default btn-sm">deshacer</a>
   										<a data-wysihtml5-command="redo" class="btn btn-default btn-sm">rehacer</a>
									</div>
									<textarea name="descripcionCompleta" id="wysihtml5-textarea" class="form-control"></textarea>
									<span class="text-danger">No puede dejar este campo vacío</span>
								</div>
							</div>-->
							<div class="form-group col-xs-12 col-md-6">
								<label>Seleccione una imagen:</label>
								<input type="file" name="imagen" class="form-control"/>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Seleccione categoría:</label>
								<select name="categoria" class="form-control">
									<option value="null">Seleccione</option>
									@foreach($categorias as $categoria)
										<option value="{{$categoria->id_categoria}}">{{$categoria->nombre}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Asigne un precio:</label>
								<input type="text" name="precio" class="form-control" autocomplete="off" placeholder="400.00"/>
								<span class="text-danger">Debe ingresar un precio respetando el ejemplo</span>
							</div>
							<div class="btn-group col-xs-12">
								<button name="crear" id="crear" class="btn btn-success">Crear</button>
								<a href="productos-admin" class="btn btn-danger">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    @include("templates/footer")
	<!--<script src="js/wysihtml5/parser_rules/simple.js"></script>
	<script src="js/wysihtml5/dist/wysihtml5-0.2.0.js"></script>
	<script src="js/configuracion-wysihtml5.js"></script>-->
	<script src="js/validaciones/validar-producto.js"></script>
	<script src="js/validaciones/mostrar-alertas.js"></script>
</body>
</html>