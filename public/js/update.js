jQuery(document).ready(function($)  {
	$('#edit-item').on('hidden.bs.modal', function () {
		//vacia todos los campos de cliente
		$("#update-id").val('');
		$("#update-title").val('');
		$("#update-item").val('');
		$('.error-list').remove();
		$('#item-not-found').remove();
		$('#update-form').hide();
		$('#edit-loading-bar').show();
	});
	$('#edit-item2').on('hidden.bs.modal', function () {
		//vacia todos los campos de grupo
		$("#update-id2").val('');
		$("#update-title2").val('');
		$("#update-item2").val('');
		$('.error-list2').remove();
		$('#item-not-found2').remove();
		$('#update-form2').hide();
		$('#edit-loading-bar2').show();
	});

	//Ajax actualización del cliente
	$("#update-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "clientes/" + $('#update-id').attr("value"),//obtiene el id para el controlador
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data : $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list').remove();
		    	$("#update-submit").prop("disabled", true);
		    	$("#update-submit").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Cargando...</span>');
		    }, statusCode: {
				500: function() {
					$.notify({
					// parametros
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error al guardar</strong>: <br>',
					message: 'Debe elegir un grupo.'
					},{
					// configuracion
					type: "danger",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
				}
	    	}, success: function (data) {
		    	$success = data.responseJSON;
					$.notify({
					// opciones
					icon: 'fa fa-check',
					title: '<strong>Completado</strong>: <br>',
					message: data['msg']
					},{
					// configuracion
					type: "success",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
					$( "#update-id" ).val('');
					$( "#update-nombre" ).val('');
					$( "#update-apellido" ).val('');
					$('#edit-item').modal('toggle');
					// devuelve la tabla cliente
					refreshTable();
		    }, error :function(data) {
		        $errors = data.responseJSON.errors;
				var id = '';
				for (var i in $errors) {
				id += "update-" + i;
				(function(){
				var error = $("<label for='" + id + "' class='error-list'>" + $errors[i] + "</label>");
				error.hide().fadeIn("slow");
				error.insertAfter('#' + id);
				})();
				id = '';
				}
	    	}, complete() {
				$( ".loading" ).remove();//elimina el preloader
				$( ".loading-fallback" ).remove();
				$("#update-submit").text('Actualizar cliente');
				$("#update-submit").prop("disabled", false);
	    	}
		});
	});
	//Ajax de actualizacion de grupos
	$("#update-form2").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "grupos/" + $('#update-id2').attr("value"),//obtiene el id para el controlador
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data : $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list').remove();
		    	$("#update-submit2").prop("disabled", true);
		    	$("#update-submit2").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Cargando...</span>');
		    }, statusCode: {
				500: function() {
					$.notify({
					// opciones
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error 500</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos..'
					},{
					// parametros
					type: "danger",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
				}
	    	}, success: function (data) {
		    	$success = data.responseJSON;
					$.notify({
					// opciones
					icon: 'fa fa-check',
					title: '<strong>Completado</strong>: <br>',
					message: data['msg']
					},{
					// parametros
					type: "success",
					allow_dismiss: true,
					newest_on_top: true,
					showProgressbar: false,
					placement: {
					from: "top",
					align: "right"
					},
					offset: 20,
					spacing: 10,
					z_index: 9999,
					delay: 5000,
					timer: 1000,
					mouse_over: "pause",
					animate: {
					enter: 'animated fadeInDown',
					exit: 'animated fadeOutUp'
					}
					});
					$( "#update-id2" ).val('');
					$( "#update-nombre_grupo" ).val('');
					$('#edit-item2').modal('toggle');
					// refrescar datos de grupo
					refreshTable2();
		    }, error :function(data) {
		        $errors = data.responseJSON.errors;
				var id = '';
				for (var i in $errors) {
				id += "update-" + i;
				(function(){
				var error = $("<label for='" + id + "' class='error-list'>" + $errors[i] + "</label>");
				error.hide().fadeIn("slow");
				error.insertAfter('#' + id);
				})();
				id = '';
				}
	    	}, complete() {
				$( ".loading2" ).remove();//elimina el preloader
				$( ".loading-fallback2" ).remove();
				$("#update-submit2").text('Actualizar grupo');
				$("#update-submit2").prop("disabled", false);
	    	}
		});
	});
});