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
				<div class="col-xs-6">
					<a href="alta_producto" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span>Agregar producto</a>
				</div>
				<div class="col-xs-6">
					<form class="form form-vertical">
						<div class="form-group">
							<input type="text" id="buscar" class="form-control" placeholder="Buscar por nombre"/>
						</div>
					</form>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12">
						<table id="lista-productos" class="productos table table-responsive table-striped">
							
						</table>
					</div>
				</div>
		</div>
	</section>
	<?php
		$this->load->view("templates/footer");
	?>
	<script src="<?php echo base_url(); ?>js/lista-productos.js"></script>
</body>
</html>