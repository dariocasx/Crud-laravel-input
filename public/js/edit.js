jQuery(document).ready(function($)  {
	//Ajax muestra edicion para el cliente
	$(".table-container").on("click touchstart", ".edit-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "clientes/" + $(this).attr("value") + "/edit",//obtiene el id para el controlador
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();//elimina mensaje
			},
		    success: function (data) {//muestra  por json los valores del cliente
				$("#update-id").val(data['id']);
				$("#update-nombre").val(data['nombre']);
				$("#update-apellido").val(data['apellido']);
				$('#update-form').show();
			},
		    error: function(data) {
				$.notify({
					// Opciones
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos.'
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
				$('#update-form').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#update-form');
				})();
	    	}, complete() {
	    		$('#edit-loading-bar').hide();
	    	}
		});
	});
	//Ajax muestra edicion para el cliente
	$(".table-container2").on("click touchstart", ".edit-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "grupos/" + $(this).attr("value") + "/edit",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();//elimina mensaje
			},
		    success: function (data) {//muestra  por json los valores del cliente
				$("#update-id2").val(data['id']);
				$("#update-nombre_grupo").val(data['nombre']);
				$('#update-form2').show();
			},
		    error: function(data) {
				$.notify({
					// opciones
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos.'
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
				$('#update-form2').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#update-form');
				})();
	    	}, complete() {
	    		$('#edit-loading-bar2').hide();
	    	}
		});
	});
});