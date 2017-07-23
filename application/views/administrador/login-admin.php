<!DOCTYPE html>
<html lang="es">

<head>
	<?php
		$this->load->view("templates/metadata");
	?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilo-admin.css"/>
	<title>Modulo Administrador</title>
</head>

<body>
	<?php
		$this->load->view("templates/header");
	?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-push-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title text-center">Inicio de sesión</h2>
						</div>
						<div class="panel-body">
							<form action="admin/autentificar_admin" method="POST" class="login-user-form">
								<div class="form-group">
									<input type="text" id="usuario" name="usuario" class="form-control" placeholder="ingrese usuario" autocomplete="off" maxlength="12"/>
									<span class="text-danger">Ingrese usuario</span>
								</div>

								<div class="form-group">
									<input type="password" id="password" name="password" class="form-control" placeholder="ingrese contraseña" maxlength="10"/>
									<span class="text-danger">Ingrese contraseña</span>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-success" id="confirmacion" name="confirmacion" value="ingresar"/>
								</div>
								<?php if($this->session->has_userdata("authError")): ?>

									<div class="alert alert-danger text-danger">usuario o clave incorrectos</div>
								<?php endif; ?>
							</form>
						</div>		
					</div>	
				</div>
			</div>
		</div>
	</section>
	<?php
		$this->load->view("templates/footer");
	?>
<script src="<?php echo base_url(); ?>js/validaciones/validar-usuario.js"></script>
</body>
</html>