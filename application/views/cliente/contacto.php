<!DOCTYPE html>
<html>
<head>
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
	<section id="contacto">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-md-push-3">
					<h1>Contacto</h1>
					<p>
						Nuestro horario de atención es de Lunes a Viernes, de 9hs a 18hs
					</p>
					<p>
						Para comunicarse con nosotros puede realizarlo a través de los siguientes medios:<br>
						E-mail: <a href="mailto:elisorzuin@hotmail.com.ar">elisorzuin@hotmail.com.ar</a><br>
						Teléfono:<a href="tel:1144117368">1144117368</a><br>
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