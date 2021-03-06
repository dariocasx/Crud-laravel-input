jQuery(document).ready(function($)  {
	//Ajax para almacenar variables del cliente
	$("#store-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "clientes",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data:  $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list').remove();
		    	$("#store-submit").prop("disabled", true);
		    	$("#store-submit").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Loading...</span>');
		    }, statusCode: {
				500: function() {
					$.notify({
					// opciones
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Error al guardar.'
					},{
					// Parametros
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
		    		data.responseJSON;
					$.notify({
					// opciones
					icon: 'fa fa-check',
					nombre: '<strong>Completado</strong>: <br>',
					message: data['msg']
					},{
					// Parametros
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
					$( "#store-nombre" ).val('');
					$( "#store-apellido" ).val('');
					$( "#store-email" ).val('');
					$( "#store-grupo" ).val('');
					$( "#store-observaciones" ).val('');
					$('#create-item').modal('toggle');
					// refrescar datos
					refreshTable();//Devuelve la tabla cliente
		    }, error :function(data) {
		        $errors = data.responseJSON.errors;
		        console.log($errors);
				var id = '';
				for (var i in $errors) {
				id += "store-" + i;
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
				$("#store-submit").text('Crear cliente');
				$("#store-submit").prop("disabled", false);
	    	}
		});
	});
	//Ajax para almacenar variables del grupo
	$("#store-form2").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "grupos",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data:  $(this).serialize(),
		    beforeSend: function() {
		    	$('.error-list2').remove();
		    	$("#store-submit2").prop("disabled", true);
		    	$("#store-submit2").html('<i class="loading fa fa-refresh fa-spin fa-3x fa-fw"></i><span class="sr-only loading-fallback">Loading...</span>');
		    }, statusCode: {
				500: function() {
					$.notify({
					// opciones
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error/strong>: <br>',
					message: 'Error al guardar.'
					},{
					// Parametros
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
		    		data.responseJSON;
					$.notify({
					// opciones
					icon: 'fa fa-check',
					nombre: '<strong>Completado</strong>: <br>',
					message: data['msg']
					},{
					// Parametros
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
					$( "#store-nombre_grupo" ).val('');
					$('#create-item2').modal('toggle');
					// refrescar datos
					refreshTable2();//devuelve la tabla grupo
		    }, error :function(data) {
		        $errors = data.responseJSON.errors;
		        console.log($errors);
				var id = '';
				for (var i in $errors) {
				id += "store-" + i;
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
				$("#store-submit2").text('Crear grupo');
				$("#store-submit2").prop("disabled", false);
	    	}
		});
	});
});