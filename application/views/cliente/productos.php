<!DOCTYPE html>
<html>
<head>
	<?php
		$this->load->view('templates/metadata');
	?>
	<title>Empresa S.R.L.</title>
	</head>
<body>
	<?php
		$this->load->view("templates/header");
		$this->load->view("templates/navbar");
	?>
	<section id="productos">
		<div class="modal fade" id="info-producto" tabindex="-1" role="dialog" aria-labelledby="">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title nombre text-center"></h4>
						</div>
						<div class="modal-body">
							<img src="<?php echo base_url(); ?>/img_productos/" alt="producto" title="producto"/>
							<div class="informacion">
								<p></p>
								<label class="label label-info"></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<h1 class='text-center'>Productos</h1>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<label><span class="glyphicon glyphicon-filter"></span>Filtrar por categoría:</label>
					<form class="form-inline" action="<?php echo base_url(); ?>productos" method="POST">
						<div class="form-group col-xs-6">
							<select id="selector-categorias" name="categoria-seleccionada" class="form-control">
								<option value="">todos</option>
								<?php foreach($categorias as $categoria): ?>
									<?php if($categoria->id_categoria == $categoriaSeleccionada): ?>
										<option value="<?php echo $categoria->id_categoria; ?>" selected="true"><?php echo $categoria->nombre; ?></option>
									<?php else: ?>
										<option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre; ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group col-xs-6">
							<button class="btn form-control">filtrar</button>
						</div>
					</form>
					
				</div>
			</div>
			<div class="row" id="grilla-productos">
				<?php foreach($productos as $producto): ?>
					<div class="col-xs-12 col-sm-6 col-md-4 producto" data-toggle="modal" data-target="#info-producto" data-producto="<?php echo $producto->id; ?>">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1 ilustracion">
								<img  class="" src="<?php echo base_url() . $path_img . $producto->img; ?>" alt="<?php echo $producto->nombre; ?>" title="<?php echo $producto->nombre; ?>"/>
							</div>
							<div class="col-xs-10 col-xs-offset-1 informacion">
								<h6 class="nombre"><?php echo $producto->nombre; ?></h6>
								<label class="precio label"><?php echo '$' . $producto->precio; ?></label>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
	</section>
		<?php
			$this->load->view("templates/footer");
		?>
	<script src="<?php echo base_url(); ?>js/modal-change.js"></script>
</body>
</html>