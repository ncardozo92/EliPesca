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
		<div class="container-fluid">
			<div class="row" id="linea-principal">
				<div class="col-xs-12">
					<h1 id="slogan">EL SITIO QUE NECESITABAS</H1>
				</div>
			</div>
		</div>
	</section>
	<?php
		$this ->load ->view("templates/footer.php");
	?>
</body>
</html>
