<!DOCTYPE html>
<html lang="es">

<head>
	@include("templates/metadata")
	<title>Modulo Administrador</title>
</head>

<body>
	@include("templates/header")
	@include("templates/navbar-admin")
	<section>
        <div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-push-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title text-center">Cambio de información</h2>
						</div>
						<div class="panel-body">
							<div class="alert alert-warning">
								Una vez guardado los cambios, por cuestion de seguridad deberá volver a iniciar sesión con sus nuevos datos.
							</div>
							<form action="modificar-admin" method="POST" class="user-form">
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								<div class="form-group">
									<label>nombre</label>
									<input type="text" id="usuario" name="usuario" class="form-control" value={{$nombreAdmin}} autocomplete="off" />
									<span class="text-danger">este campo no puede estar vacío y el nombre de usuario debe tener entre 5 y 12 caracteres alfanuméricos</label>
								</div>
								<div class="form-group">
									<label>ingrese contraseña</label>
									<input type="password" id="password1" name="password1" class="form-control"/>
								</div>

								<div class="form-group">
									<label>reingrese contraseña</label>
									<input type="password" id="password2" name="password2" class="form-control"/>
									<span class="text-danger">debe completar ambos campos con la misma clave y debe tener entre  4 y 10 caracteres alfanuméricos</label>
								</div>

								@if(isset($flagError))
								<div class="panel panel-danger">Hubo un error al actualizar los datos. Intentelo de nuevo</div>
								@endif
								<div class="form-group">
									<div class="btn-group">
										<input type="submit" class="btn btn-success" id="confirmacion" name="confirmacion" value="cambiar"/>
										<a href="productos-admin" class="btn btn-danger">Cancelar</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
	
	@include("templates/footer")
	
	<script src="js/validaciones/validar-usuario.js"></script>
	</body>
	</html>