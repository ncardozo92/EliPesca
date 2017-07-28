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
	<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-4 col-md-offset-4">
				

				<div class="panel panel-default">
					<div class="panel panel-body">
						<form method="POST">

							<div class="form-group">
							<label class="text-center">Ingrese categoría</label>
								<input type="text" id="nombre-categoria" class="form-control"/>
							</div>

							<div class="form-group col-xs-8 col-xs-offset-2">
								<input type="submit" class="btn btn-success"/>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-push-4">
					<table class="table table-striped table-bordered" id="grilla-categorias">
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Acción</th>
						</tr>
						<?php foreach($categorias as $categoria): ?>
							<tr>
								<td><?php echo $categoria->id_categoria; ?></td>
								<td><?php echo $categoria->nombre; ?></td>
								<td>
									<label class="label label-danger eliminar" data-categoria="<?php echo $categoria->id_categoria; ?>">
										<span class="glyphicon glyphicon-remove"></span>
									</label>
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
	<script src="<?php echo base_url(); ?>js/grilla-categorias.js"></script>
</body>
</html>