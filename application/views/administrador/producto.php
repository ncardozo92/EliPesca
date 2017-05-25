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
				<!--aca comienza el panel que contiene el form-->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Modificar producto</h4>
					</div>
					<div class="panel-body">
						<form action="modificar-producto.php" method="POST"  enctype="multipart/form-data">
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
						
								<label>ingrese descripción completa:</label>
								<div id="textoCompleto" class="form-group">
									<div id="wysihtml5-toolbar" style="display: none;">
										<a data-wysihtml5-command="bold" class="btn btn-default btn-sm">Negrita</a>
										<a data-wysihtml5-command="italic" class="btn btn-default btn-sm">italica</a>

										<!-- Some wysihtml5 commands like 'createLink' require extra paramaters specified by the user (eg. href) -->
										<a data-wysihtml5-command="createLink" class="btn btn-default btn-sm">insertar link</a>
										
										<a data-wysihtml5-command="undo" class="btn btn-default btn-sm">deshacer</a>
   										<a data-wysihtml5-command="redo" class="btn btn-default btn-sm">rehacer</a>
									</div>
									<textarea name="texto" id="wysihtml5-textarea" class="form-control"></textarea>
									<span class="text-danger">No puede dejar este campo vacío</span>
								</div>
							
							<div class="form-group col-xs-12 col-md-6">
								<input type="file" name="imagen" class="form-control"/>
								
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Seleccione categoría:</label>
								<select name="categoria" class="form-control">
									
									<?php
									$BD->conectar();

									$BD->consultar("SELECT * FROM categoria");
									while($opcion = mysqli_fetch_array($BD->respuesta)){
										$tag = "<option value=$opcion[0] ";
										if($opcion[0] == $fila[3])
											$tag .='selected="selected"';

										$tag .= ">$opcion[1]</option>";

										echo"$tag";
									}

									$BD->cerrarConexion();
									?>

								</select>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Asigne un precio:</label>
								<input type="text" name="precio" class="form-control" autocomplete="off" placeholder="400.00" value=<?php echo"'$fila[5]'"; ?>/>
								<span class="text-danger">Debe ingresar un precio respetando el ejemplo</span>
							</div>
							<div class="btn-group col-xs-12">
								<button name="modificar" id="modificar" value=<?php echo $ID; ?> class="btn btn-success">Modificar</button>
								<a href="productos.php" class="btn btn-danger">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		include("../php/footer.php");
	?>
	<script src="../js/configuracion-wysihtml5.js"></script>
	<script src="validaciones/validar-producto.js"></script>
	<script src="validaciones/mostrar-alertas.js"></script>
</body>
</html>