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
	<section id="presentacion">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">Acerca del sitio</h1>
					<p>
						Este sitio web ha sido desarrollado por Nicolás Cardozo con el fin de mostrar sus habilidades como programador web.
						Empresa S.R.L. no es una empresa real y el programador web no se dedica al rubro de seguridad electrónica.
						<br>
						<br>
						Si desea contactarse con el programador de este sitio web por favor vea la sección <strong>CONTACTO</strong>.
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