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
						<h4 class="panel-title">Editar producto</h4>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url('producto/actualizar_producto/' . $producto['id_producto']); ?>" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>ingrese nombre:</label>
								<input type="text" name="nombre" class="form-control" value="<?php echo $producto['nombre']; ?>" autocomplete="off"/>
								<span class="text-danger">Debe ingresar un nombre</span>
							</div>
							<div class="form-group">
								<label>ingrese breve descripción:</label>
								<input type="text" name="descripcion" class="form-control" value="<?php echo $producto['descripcion']; ?>" autocomplete="off"/>
								<span class="text-danger">Debe ingresar una descripción breve</span>
							</div>
							<div class="form-group col-xs-12 col-md-6">
								<label>Imagen ilustrativa:</label>
									<div id="img-actual">
										<img src="<?php echo $path . $producto['img']; ?>" title='ilustración' alt="<?php echo $producto['nombre']; ?>" />
									</div>
								<input type="file" name="imagen" class="form-control"/>
								<input type="hidden" name="img_actual" value="<?php echo $producto['img']; ?>"/>
								
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Seleccione categoría:</label>
								<select name="categoria" class="form-control">
									<option>Seleccione</option>
									<?php foreach($categorias as $categoria): ?>
									<?php if($producto['id_categoria'] == $categoria['id_categoria']): ?>
										<option value="<?php echo $categoria['id_categoria']; ?>" selected="tue"><?php echo $categoria['nombre']; ?></option>
									<?php else: ?>
										<option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<span class="text-danger">Debe seleccionar una categoría</span>
							</div>
							<div class="form-group col-xs-12 col-sm-4">
								<label>Asigne un precio:</label>
								<input type="text" name="precio" class="form-control" autocomplete="off" placeholder="400.00" value="<?php echo $producto['precio']; ?>"/>
								<span class="text-danger">Debe ingresar un precio respetando el ejemplo</span>
							</div>
							<div class="btn-group col-xs-12">
								<button name="actualizar" id="actualizar" class="btn btn-success">actualizar</button>
								<a href="<?php echo base_url() . 'admin/productos' ?>" class="btn btn-danger">Cancelar</a>
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