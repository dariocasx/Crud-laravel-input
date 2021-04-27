		<div class="row">
			<h1 class="text-center">Clientes</h1>
		</div>
		<br/>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
					<div style="position: relative;top: -13px">
						<button type="button" class="btn btn-success new-cliente" data-toggle="modal" data-target="#create-item">
						Agregar nuevo cliente
						</button>
						<button type="submit" style="position: relative;top: 10px" id="refresh">
							<svg xmlns="http://www.w3.org/2000/svg" width="22" height="28" viewBox="0 0 22 22"><path d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z"/></svg>
						</button>
					</div>	
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
					<div class="input-group">
				      	<input type="text" name="search" id="search" class="form-control" placeholder="Buscar clientes" />
				      	<span class="input-group-btn">
				      	<button type="button" class="btn btn-danger" href="javascript:void(0)" onclick="buscar()">Buscar</button>
				  	 	 </span>
			   		</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
					<select class="form-control form-control-lg" name="grupo" id="selgrupos">
							<option>Seleccione un grupo de cliente</option>
							@foreach($grupo as $list)
							<option value="{{ substr($list->id, 0, 60) }}">{{ substr($list->nombre_grupo, 0, 60) }}</option>
							@endforeach
					</select>
				</div>
			</div>
		</div>
		<hr>
		<div id="table-loader" style="display: none">
			<div class="col-md-12">
		    	<div class="no-items loader-height">
					<div class="no-items-wrapper">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>
				</div>
			</div>
		</div>
		<div class="table-container">
			@include('clientes.table')
		</div>
		<!-- Modal del cliente para para uno nuevo -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Crear Cliente</h4>
					</div>
					<form action="clientes" method="post" id="store-form">
						<div class="modal-body">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="store-nombre">

							<label for="apellido">Apellido</label>
							<input type="text" class="form-control" name="apellido" id="store-apellido" >

							<label for="email">Email</label>
							<input type="text" class="form-control" name="email" id="store-email" >

							<label for="observaciones">Observaciones</label>
							<textarea name="observaciones" class="form-control" id="store-observaciones" rows="6"></textarea>
						</div>
						<div class="modal-body">
							<select class="form-control form-control-lg" name="grupo" id="store-grupo">
								<option>Seleccione un grupo de cliente</option>
								@foreach($grupo as $list)
								  	<option value="{{ substr($list->id, 0, 60) }}">{{ substr($list->nombre_grupo, 0, 60) }}</option>
								@endforeach
							</select>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="store-submit">Crear Cliente</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Mostrar clientes modal -->
		<div class="modal fade" id="show-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Mostrar Cliente</h4>
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
						<strong id="view-apellido">Apellido</strong>
						<p id="apellido-display"></p>
						<strong id="view-email">Email</strong>
						<p id="email-display"></p>
						<strong id="view-observaciones">Observaciones</strong>
						<p id="observaciones-display"></p>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal de actualización -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Actualizar Cliente</h4>
					</div>
					<div class="modal-body" id="edit-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<form method="post" id="update-form">
					{{ method_field('PATCH') }}
					<input type="hidden" name="id" id="update-id">
						<div class="modal-body">
		
							<div align="center">
								<label for="nombre">Nombre Del Grupo actual:</label>
								<input style="text-align: center" id="update-nombre" disabled>
							</div>	
							<hr/>
							<select class="form-control form-control-lg" name="nombre" id="update-nombre">
								<option>Seleccione un grupo nuevo</option>
								@foreach($grupo as $list)
								  	<option value="{{ substr($list->id, 0, 60) }}">{{ substr($list->nombre_grupo, 0, 60) }}</option>
								@endforeach
							</select>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"  id="update-submit">Actualizar Cliente</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		<!-- Modal para eliminar -->
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
							{{ method_field('DELETE') }}
							<input type="hidden" name="id" id="remove-id">
							<button type="submit" class="btn btn-danger">Eliminar Cliente</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>


