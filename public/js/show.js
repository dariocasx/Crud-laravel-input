jQuery(document).ready(function($)  {
	$('#show-item').on('hidden.bs.modal', function () {
		$('#title-nombre').text('');
		$('#item-apellido').text('');
		$('#item-email').text('');
		$('#item-nombre_grupo').text('');
		$('#item-observaciones').text('');
		$('#item-not-found').remove();
		$('#show-loading-bar').show();
	});

	$(".table-container").on("click touchstart", ".show-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "clientes/" + $(this).attr("value"),
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();
			$('#nombre-display').text('');
			$('#apellido-display').text('');
			$('#email-display').text('');
			$('#nombre_grupo-display').text('');
			$('#observaciones-display').text('');
			$('#view-data').hide();
			},
		    success: function (data) {
		    	(function(){
					var nombre = data['nombre'];
					$('#nombre-display').text(nombre);
				})();
		    	(function(){
					var apellido = data['apellido'];
					$('#apellido-display').text(apellido);
				})();
				(function(){
					var email = data['email'];
					$('#email-display').text(email);
				})();
				(function(){
					var observaciones = data['observaciones'];
					$('#observaciones-display').text(observaciones);
				})();
				(function(){
					var nombre_grupo = data['nombre_grupo'];
					$('#nombre_grupo-display').text(nombre_grupo);
				})();
				$('#view-data').show();
			},
		    error: function(data) {
				$.notify({
					// options
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos.'
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
				$('#view-data').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#view-data');
				})();
	    	}, complete() {
	    		$('#show-loading-bar').hide();
	    	}
		});
	});
	
});