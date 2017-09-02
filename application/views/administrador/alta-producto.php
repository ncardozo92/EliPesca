<!DOCTYPE html>
<html lang="es">

<head>
	<?php
		$this->load->view("templates/metadata");
	?>
	<title>Modulo Administrador</title>
</head>

<body>
	<?php
		$this->load->view("templates/header");
		$this->load->view("templates/navbar-admin");
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-push-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Crear producto</h4>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url('producto/agregar_producto'); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>ingrese nombre:</label>
								<input type="text" name="nombre" value="" class="form-control" autocomplete="off"/>
								<span class="text-danger">Debe ingresar un nombre</span>
							</div>
							<div class="form-group">
								<label>ingrese breve descripción:</label>
								<input type="text" name="descripcion" value="" class="form-control" autocomplete="off"/>
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
									<option value="">Seleccione</option>
									<?php foreach($categorias as $categoria): ?>
										<option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre; ?></option>
									<?php endforeach; ?>
								</select>
								<span class="text-danger">Debe seleccionar una categoría</span>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Asigne un precio:</label>
								<input type="text" name="precio" class="form-control" value="" autocomplete="off" placeholder="400.00"/>
								<span class="text-danger">Debe ingresar un precio respetando el ejemplo</span>
							</div>
							<div class="btn-group col-xs-12">
								<button name="crear" id="crear" class="btn btn-success">Crear</button>
								<a href="productos" class="btn btn-danger">Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <?php
		$this->load->view("templates/footer");
	?>
	<script src="<?php echo base_url(); ?>js/validaciones/validar-producto.js"></script>
</body>
</html>