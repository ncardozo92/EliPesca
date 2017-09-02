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
				<div class="col-xs-8 col-xs-offset-2">
					<img src="<?php echo base_url('css/recursos/excursion-2.JPG'); ?>" alt="excursion" title="excursion"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p>
						Elipesca realiza excursiones de pesca a diferentes lugares turísticos del país, 
						llevando a pescadores a distintas lagunas, arroyos y rios del país.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<img src="<?php echo base_url('css/recursos/excursion-1.JPG'); ?>" alt="excursion" title="excursion"/>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<p>
						Las excursiones son realizadas a través de viajes en micros de larga distancia, y dependiendo del destino
						también a bordo de barcos.<br>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<h3 class="text-center">Próximas excursiones</h3>
					<p class="fecha-excursion text-center">
						15/9/2017 salida 21hs avenida Rivadavia y Cachimayo, 22hs Colón y Juan Manuel de Rosas.<br>
						Destino: Laguna La Barranca Guaminí, donde se realizará pesca de pejerrey de costa.
					</p>
				</div>
			</div>
		</div>
	</section>
		<?php
			$this ->load ->view("templates/footer.php");
		?>
</body>
</html>