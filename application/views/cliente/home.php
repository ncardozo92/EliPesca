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
	<section>
		<div class="container-fluid" id="wallpaper">
			<div class="row" id="linea-principal">
				<div class="col-xs-12" id="about">
					<h1 class="text-center">VENTA DE ARTíCULOS DE PESCA</H1>
					<p>
						Elipesca es una empresa joven que se encuentra en plena expansión, 
						ofreciendo los mejores productos para pesca deportiva.
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
