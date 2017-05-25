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
						Para contactarse con el programador de este sitio web por favor hagalo a través de los siguientes medios:<br>
						E-mail: <a href="mailto:ncardozo19@gmail.com">ncardozo19@gmail.com</a><br>
						Teléfono:<a href="tel:1153289129"> 1153289129</a><br>
						
				</div>
			</div>
		</div>
	</section>
	<?php
		$this ->load ->view("templates/footer.php");
	?>
</body>
</html>