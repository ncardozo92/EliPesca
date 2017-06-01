<!DOCTYPE html>
<html lang="es">

<head>
	<?php
		$this->load->view("templates/metadata");
	?>
	<title>Modulo Administrador</title>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js"></script>
	<script>

		angular.module("gestorCategorias",[])
			.controller("gestorCategoriasCtrl",function($scope,$http){

				$scope.listado = [];

				$scope.traerTodas = function(){

					$http.get('get_categorias').then(function(respose){

						$scope.listado = respose.data;
						
					});
				}

				$scope.guardarCategoria = function(){

					var categoria = {nombre : $scope.nombreCategoria};
					$http.post("guardar_categoria",categoria)
					.then(function(response){

					$scope.nombreCategoria = '';
					$scope.traerTodas();
					});
				}

				$scope.eliminarCategoria = function(id){

					$http.post('eliminar_categoria',{'id' : id})
					.then(function(response){
						$scope.traerTodas();
					},
					function(){

						alert("hubo un inconveniente, por favor intentelo más tarde");
					});
				}
			});

	</script>
</head>

<body>
	<?php
		$this->load->view("templates/header");
		$this->load->view("templates/navbar-admin");
	?>
	<section ng-app="gestorCategorias" ng-controller="gestorCategoriasCtrl" ng-init="traerTodas()">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-4 col-md-offset-4">
				

				<div class="panel panel-default">
					<div class="panel panel-body">
						<form method="POST" ng-submit="guardarCategoria()">

							<div class="form-group">
							<label class="text-center">Ingrese categoría</label>
								<input type="text" class="form-control" ng-model="nombreCategoria"/>
							</div>

							<div class="form-group col-xs-4 col-xs-offset-4">
								<input type="submit" class="btn btn-default"/>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-push-4">
					<table class="table table-responsive table-striped">
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Acción</th>
						</tr>
						<tr ng-repeat="categoria in listado">
							<td>{{categoria.id}}</td>
							<td>{{categoria.nombre}}</td>
							<td>
								<label class="label label-danger" ng-click="eliminarCategoria(categoria.id)">
									<span class="glyphicon glyphicon-remove"></span>
								</label>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php
		$this->load->view("templates/footer");
	?>
</body>
</html>