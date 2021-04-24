jQuery(document).ready(function($)  {
	$('#destroy-item').on('hidden.bs.modal', function () {
		$('#item-not-found').remove();
		$('#remove-data').show();
	});
		$('#destroy-item2').on('hidden.bs.modal', function () {
		$('#item-not-found2').remove();
		$('#remove-data2').show();
	});
	$(".table-container").on("click touchstart", ".remove-btn", function () {
		$("#remove-id").val($(this).attr("value"));
	});
	$(".table-container2").on("click touchstart", ".remove-btn", function () {
		$("#remove-id2").val($(this).attr("value"));
	});
	
	$("#remove-form").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "clientes/" + $('#remove-id').attr("value"),
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data:  $(this).serialize(),
			beforeSend: function() {
			$('#item-not-found').remove();
			$('#destroy-loading-bar').show();
			},
		    success: function (data) {
	    	$success = data.responseJSON;
				$.notify({
				// options
				icon: 'fa fa-check',
				title: '<strong>Completado</strong>: <br>',
				message: data['msg']
				},{
				// settings
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
				$('#destroy-item').modal('toggle');
				// refresh data
				refreshTable();
			},
		    error: function(data) {
				$.notify({
					// options
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos.'
					},{
					// settings
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
				$('#remove-data').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#remove-data');
				})();
	    	}, complete() {
	    		$('#destroy-loading-bar').hide();
	    	}
	    });
	});
	$("#remove-form2").submit(function (e) {
		e.preventDefault();
		$.ajax({
		    type: "POST",
		    url: "grupos/" + $('#remove-id2').attr("value"),
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			data:  $(this).serialize(),
			beforeSend: function() {
			$('#item-not-found').remove();
			$('#destroy-loading-bar').show();
			},
		    success: function (data) {
	    	$success = data.responseJSON;
				$.notify({
				// options
				icon: 'fa fa-check',
				title: '<strong>Completado</strong>: <br>',
				message: data['msg']
				},{
				// settings
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
				$('#destroy-item2').modal('toggle');
				// refresh data
				refreshTable();
			},
		    error: function(data) {
				$.notify({
					// options
					icon: 'fa fa-exclamation-triangle',
					title: '<strong>Error</strong>: <br>',
					message: 'Ocurrio un error obteniendo los datos.'
					},{
					// settings
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
				$('#remove-data2').hide();
				(function(){
				var notFound = $('<div class="modal-body fade-text" id="item-not-found"><h1 class="text-center danger">☠</h1><h2 class="text-center">Item not found</h2></div>');
				notFound.insertAfter('#remove-data');
				})();
	    	}, complete() {
	    		$('#destroy-loading-bar2').hide();
	    	}
	    });
	});
});