@extends('app')

@section('body')

	<div class="row">
		<h1 class="text-center">Grupos</h1>
	</div>

	<div class="row">
		<!--header de la vista -->
		<div class="btn-group">
			<button type="button" class="btn btn-success new-cliente" data-toggle="modal" data-target="#create-item2">
			Agregar nuevo grupo
			</button>
			<button type="submit" class="btn btn-default new-cliente" id="refresh2">
			<i class="fa fa-refresh" aria-hidden="true"></i>
			</button>
		</div><br>

			<div class="form-group">
		      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar grupos" />
		     </div>
			</div><br>
			

		<div id="table-loader2" style="display: none">
			<div class="col-md-12">
		    	<div class="no-apellidos loader-height">
					<div class="no-apellidos-wrapper">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Cargando...</span>
					</div>
				</div>
			</div>
		</div>
		<div class="table-container2">
			@include('grupos.table')
		</div>

		<!-- Crear nuevo -->
		<div class="modal fade" id="create-item2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Crear Grupo</h4>
					</div>
					<form action="grupos" method="post" id="store-form2">
						<div class="modal-body">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="store-nombre2">

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="store-submit2">Crear Grupo</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal para actualizar -->
		<div class="modal fade" id="edit-item2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Actualizar Grupo</h4>
					</div>
					<div class="modal-body" id="edit-loading-bar2">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<form method="post" id="update-form2">
					{{ method_field('PATCH') }}
					<input type="hidden" name="id" id="update-id2">
						<div class="modal-body">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" id="update-nombre2">

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"  id="update-submit2">Actualizar Grupo</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--Modal del cliente para para uno nuevo-->
		<div class="modal fade" id="destroy-item2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-nombre" id="myModalLabel">Eliminar Grupo</h4>
					</div>
					<div class="modal-body" id="destroy-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<div class="modal-body" id="remove-data2">
						<h3 class="text-center">☣ ¿Esta seguro que desea eliminar este grupo? ☣</h3>
					</div>
					<div class="modal-footer">
						<form method="post" id="remove-form2">
							{{ method_field('DELETE') }}
							<input type="hidden" name="id" id="remove-id2">
							<button type="submit" class="btn btn-danger">Eliminar Grupo</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
<!--Realizamos los mismos script que en cliente para la tabla grupo-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){

	var select="grupos";	
	var query = "";



	 fetch_customer_data();

	 function fetch_customer_data(query = '')
	 {
	  

      var dataString = 'query=' + query + '&select=' + select;	
	  $.ajax({
	   url:"customsearch",
	   method:'GET',
	   data:dataString,
	   dataType:'json',
	   success:function(data)
	   {
	    $('tbody').html(data.table_data);
	    $('#total_records').text(data.total_data);
	   }
	  })
	 }

	 $(document).on('keyup', '#search', function(){

	  var query = $(this).val();
	  fetch_customer_data(query);
	 });
	});



</script>
@endsection
