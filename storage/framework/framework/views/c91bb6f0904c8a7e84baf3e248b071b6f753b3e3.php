

	<div class="row">
		<h1 class="text-center">Grupos</h1>
	</div>

	<div class="row">

		<div class="btn-group">
			<button type="button" class="btn btn-success new-cliente" data-toggle="modal" data-target="#create-item">
			Agregar nuevo grupo
			</button>
			<button type="submit" class="btn btn-default new-cliente" id="refresh">
			<i class="fa fa-refresh" aria-hidden="true"></i>
			</button>
		</div><br>

		<div id="table-loader" style="display: none">
			<div class="col-md-12">
		    	<div class="no-apellidos loader-height">
					<div class="no-apellidos-wrapper">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>
				</div>
			</div>
		</div>
		<div class="table-container">
			
		</div>

		<!-- Create apellido modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Crear Grupo</h4>
					</div>
					<form action="clientes" method="post" id="store-form">
						<div class="modal-body">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="store-nombre">

							<label for="apellido">Apellido</label>
							<textarea name="apellido" class="form-control" id="store-apellido" rows="6"></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="store-submit">Crear Cliente</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Update apellido modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Actualizar Grupo</h4>
					</div>
					<div class="modal-body" id="edit-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<form method="post" id="update-form">
					<?php echo e(method_field('PATCH')); ?>

					<input type="hidden" name="id" id="update-id">
						<div class="modal-body">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="update-nombre">

							<label for="apellido">Apellido</label>
							<textarea name="apellido" class="form-control" id="update-apellido" rows="6"></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"  id="update-submit">Actualizar Grupo</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Show apellido modal -->
		<div class="modal fade" id="show-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Visualizar</h4>
					</div>
					<div class="modal-body" id="show-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<div class="modal-body" id="view-data">
						<strong id="view-nombre">Nombre</strong>
						<p id="nombre-display"></p>
						<br><strong id="view-apellido">Apellido</strong>
						<p id="apellido-display"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Destroy apellido modal -->
		<div class="modal fade" id="destroy-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Eliminar Cliente</h4>
					</div>
					<div class="modal-body" id="destroy-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<div class="modal-body" id="remove-data">
						<h3 class="text-center">☣ ¿Esta seguro que desea eliminar este cliente? ☣</h3>
					</div>
					<div class="modal-footer">
						<form method="post" id="remove-form">
							<?php echo e(method_field('DELETE')); ?>

							<input type="hidden" name="id" id="remove-id">
							<button type="submit" class="btn btn-danger">Eliminar Cliente</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>


<?php /**PATH C:\laravel\clientes\resources\views/grupos/index.blade.php ENDPATH**/ ?>