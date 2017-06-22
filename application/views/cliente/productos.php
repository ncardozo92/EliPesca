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
		<div class="container">
			<h1 class='text-center'>Productos</h1>
			<div class="row">
				<div class="col-xs-12 col-ms-6 col-md-4">
					<label><span class="glyphicon glyphicon-filter"></span>Filtrar por categoría:</label>
					<form class="form-inline" action="<?php echo base_url(); ?>producto/catalogo" method="POST">
						<div class="form-group">
							<select id="selector-categorias" name="categoria-seleccionada" class="form-control">
								<option value="">todos</option>
								<?php foreach($categorias as $categoria): ?>
									<option value="<?php echo $categoria->id_categoria; ?>"><?php echo $categoria->nombre; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
							<button class="btn btn-info">filtrar</button>
					</form>
					
				</div>
			</div>
			<div class="row" id="grilla-productos">
				<?php foreach($productos as $producto): ?>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="row">
							<div class="col-xs-12">
								<img  class="ilustracion" src="<?php echo base_url() . $path_img . $producto->img; ?>" alt="<?php echo $producto->nombre; ?>" title="<?php echo $producto->nombre; ?>"/>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<span class="titulo"><?php echo $producto->nombre; ?></span>
								<label class="precio text-center"><?php echo '$' . $producto->precio; ?></label>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
		<?php
			$this->load->view("templates/footer");
		?>
</body>
</html>