<!DOCTYPE html>
<html>
<head>
	<?php
		$this ->load ->view('templates/metadata');
	?>
</head>
<body>
	<?php
		$this ->load ->view("templates/header.php");
		$this ->load ->view("templates/navbar.php");
	?>
	<section id="info-excursiones">
		<div class="container">
			<div class="row">
				<h1 class="text-center">Excursiones de pesca</h1>
				<div class="col-xs-12">
					<ul class="list-group">
						<h4 class="text-center">Próximas excursiones</h4>
						<li class="list-group-item">
							<?php foreach($excursiones as $excursion): ?>
								<h5><?php echo $excursion->fecha . " " . $excursion->destino; ?></h5>
								<?php echo $excursion->descripcion; ?>
							<?php endforeach; ?>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<h4 class="text-center">Acerca de las excursiones</h4>
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<p>
								Elipesca realiza excursiones de pesca a diferentes lugares turísticos del país, 
								llevando a pescadores a distintas lagunas, arroyos y rios del país.
							</p>
						</div>
						<div class="col-xs-12 col-sm-4">
							<img src="<?php echo base_url('css/recursos/excursion-2.JPG'); ?>" alt="excursion" title="excursion"/>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<p>
								Las excursiones son realizadas a través de viajes en micros de larga distancia, y dependiendo del destino
								también a bordo de barcos.
							</p>
						</div>
						<div class="col-xs-12 col-sm-4">
							<img src="<?php echo base_url('css/recursos/excursion-1.JPG'); ?>" alt="excursion" title="excursion"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<?php
			$this ->load ->view("templates/footer.php");
		?>
</body>
</html>