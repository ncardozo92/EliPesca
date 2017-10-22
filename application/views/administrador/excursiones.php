<!DOCTYPE html>
<html lang="es">

<head>
	<?php
		$this->load->view("templates/metadata");
	?>
	<title>Modulo Administrador</title>
</head>

<body>
	<?php
		$this->load->view("templates/header");
		$this->load->view("templates/navbar-admin");
	?>
	<div class="container">
		<div class="row">
            <h1 class="text-center">Excursiones</h1>
			<div class="col-xs-12">
                <div class="row">
                    <div class=" col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php if($this->session->has_userdata("validacion_excursion") && $this->session->flashdata("validacion_excursion") == false): ?>
                                    <div class="alert alert-danger">
                                        Ha ocurrido un error al enviar los datos, por favor vuelva a intentarlo.
                                    </div>
                                <?php endif; ?>
                                <form action="<?php echo base_url('excursiones/nueva_excursion'); ?>" method="POST">
                                    <div class="form-group col-xs-12 col-sm-4">
                                        <label>Ingrese fecha</label>
                                        <input type="date" name="fecha" id="fecha" class="form-control" />
                                        <span class="text-danger">fecha es necesaria</span>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-8">
                                        <label>Ingrese destino</label>
                                        <input type="text" name="destino" id="destino" class="form-control" placeholder="Rio de La Plata" maxlength="25" />
                                        <span class="text-danger">Destino obligatorio</span>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label>Ingrese descripción de la excursión</label>
                                        <!--<label class="text-info"><span id="caracteres-restantes"></span><span>/425</span>-->
                                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="máximo 250 caracteres"></textarea>
                                        <span class="text-danger">No se puede exceder la capacidad máxima de caracteres</span>
                                    </div>
                                    <div class="btn-group col-xs-12">
                                        <button class="btn btn-success">Publicar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Fecha</th>
                        <th>Destino</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach($excursiones as $excursion): ?>
                        <tr>
                            <td><?php echo $excursion->fecha; ?></td>
                            <td><?php echo $excursion->destino; ?></td>
                            <td><?php echo $excursion->descripcion; ?></td>
                            <td>
                                <a href="<?php echo base_url('excursiones/eliminar/' . $excursion->fecha); ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
    <?php
        $this->load->view("templates/footer");
    ?>
    <script src="<?php echo base_url('js/validaciones/validar-excursion.js'); ?>"></script>
</body>
</html>