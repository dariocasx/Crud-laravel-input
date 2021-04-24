<?php $__env->startSection('body'); ?>



	<div class="row">
		<h1 class="text-center">Clientes</h1>
	</div>

	<div class="row">
		<!-- Crear nuevo -->
		<div class="btn-group">
			<button type="button" class="btn btn-success new-cliente" data-toggle="modal" data-target="#create-item">
			Agregar nuevo cliente
			</button>
			<button type="submit" class="btn btn-default new-cliente" id="refresh">
			<i class="fa fa-refresh" aria-hidden="true"></i>
			</button>


			<div class="form-group">
		      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar clientes" />
		    </div>

			<select class="form-control form-control-lg" name="grupo" id="selgrupos">
						<option>Seleccione un grupo de cliente</option>
					<?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e(substr($list->id, 0, 60)); ?>"><?php echo e(substr($list->nombre_grupo, 0, 60)); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
	</div>	


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
			<?php echo $__env->make('clientes.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
								<?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  	<option value="<?php echo e(substr($list->id, 0, 60)); ?>"><?php echo e(substr($list->nombre_grupo, 0, 60)); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<?php echo e(method_field('PATCH')); ?>

					<input type="hidden" name="id" id="update-id">
						<div class="modal-body">
		
							<div align="center">
								<label for="nombre">Nombre Del Grupo actual:</label>
								<input style="text-align: center" id="update-nombre" disabled>
							</div>	
							<hr/>
							<select class="form-control form-control-lg" name="nombre" id="update-nombre">
								<option>Seleccione un grupo nuevo</option>
								<?php $__currentLoopData = $grupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  	<option value="<?php echo e(substr($list->id, 0, 60)); ?>"><?php echo e(substr($list->nombre_grupo, 0, 60)); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
</div>
<!-- Aca vemos los script de jquery para realizar las busquedas en el input y en el select-->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){

	var select="";	
	$('#selgrupos').on('change', function (){// select para la busqueda
         select="select";
         
         var query = $(this).val();
         fetch_customer_data(query);

  	});	



	 fetch_customer_data();

	 function fetch_customer_data(query = '')
	 {
	  

      var dataString = 'query=' + query + '&select=' + select;	
	  $.ajax({
	   url:"customsearch",
	   method:'GET', //ajax para el controlador y para que devuelva la tabla con los filtros
	   data:dataString,
	   dataType:'json',
	   success:function(data)
	   {
	    $('tbody').html(data.table_data);
	    $('#total_records').text(data.total_data);
	   }
	  })
	 }

	 $(document).on('keyup', '#search', function(){//input para la busqueda
	  select="";
	  var query = $(this).val();
	  fetch_customer_data(query);
	 });
	});



</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\clientes3\resources\views/clientes/index.blade.php ENDPATH**/ ?>