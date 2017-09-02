<!DOCTYPE html>
<html lang="es">

<head>
	<?php
		$this->load->view("templates/metadata");
	?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilo-admin.css"/>
	<title>Modulo Administrador</title>
</head>

<body>
	<?php
		$this->load->view("templates/header");
		$this->load->view("templates/navbar-admin");
	?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<a href="alta_producto" class="btn"><span class="glyphicon glyphicon-plus"></span>Agregar producto</a>
				</div>
				<div class="col-xs-12 col-sm-6">
					<form class="form form-inline" method="POST" action="productos">
						<div class="form-group col-xs-6">
							<input type="text" name="filtro" class="form-control" placeholder="Buscar por nombre" value="<?php echo $filtro; ?>"/>
						</div>
						<div class="form-group col-xs-6">
							<button class="form-control btn">Filtrar</button>
						</div>
					</form>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12  table-responsive">
						<table id="lista-productos" class="productos table table-striped">
							<tr>
								<th>id</th>
								<th>nombre</th>
								<th>descripcion</th>
								<th>categoria</th>
								<th>imagen</th>
								<th>precio</th>
								<th>acciones</th>
							</tr>
							<?php foreach($productos as $producto): ?>
								<tr>
									<td><?php echo $producto->id; ?></td>
									<td><?php echo $producto->nombre; ?></td>
									<td><?php echo $producto->descripcion; ?></td>
									<td><?php echo $producto->categoria; ?></td>
									<td>
										<?php if($producto->imagen != null): ?>
										<img src="<?php echo base_url() . $path_img_productos . $producto->imagen; ?>" alt="imagen" title="<?php echo $producto->nombre; ?>"/>
										<?php endif; ?>
									</td>
									<td><?php echo $producto->precio; ?></td>
									<td>
										<a href="<?php echo base_url('admin/editar_producto/' . $producto->id);  ?>">
											<span class='glyphicon glyphicon-pencil'></span>
										</a>
										<a href="<?php echo base_url('producto/eliminar_producto/'. $producto->id); ?>">
											<span class='glyphicon glyphicon-remove'></span>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
		</div>
	</section>
	<?php
		$this->load->view("templates/footer");
	?>
</body>
</html>