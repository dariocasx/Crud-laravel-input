@include('clientes.layout')
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/refresh.js') }}"></script>
<script src="{{ asset('js/store.js') }}"></script>
<!--<script src="{{ asset('js/edit.js') }}"></script>-->
<script src="{{ asset('js/update.js') }}"></script>
<!--<script src="{{ asset('js/show.js') }}"></script>-->
<script src="{{ asset('js/destroy.js') }}"></script>
<!-- Aca vemos los script de jquery para realizar las busquedas en el input y en el select-->
<script type="text/javascript">
	function buscar(){
		var query = $(search).val();
		fetch_customer_data(query);
		$(search).val("");//devuelvo vacio al input
	}

	var select="";	
	$('#selgrupos').on('change', function (){//select para la busqueda
         select="select";//a medida que va cambiando va ingresando en el controlador
         var query = $(this).val();//capturo el valor del input
         fetch_customer_data(query);//ingreso a la funcion la busqueda
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
		   }
		  })
	 }
	 $(document).on('keyup', '#search', function(){//input para la busqueda
		  	$("#search").keypress(function(e) {
				if(e.which == 13) {//comprueba si se ingreso enter
				select="";
				var query="";
				query = $(this).val();
				buscar();
				//setTimeout(function() {
                  //fetch_customer_data(query);
                //}, 500);
				
				}
			});

	 });


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
	//Ajax Show Edit
	$(".table-container").on("click touchstart", ".edit-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "clientes/" + $(this).attr("value") + "/edit",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();
			},
		    success: function (data) {
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
	$(".table-container2").on("click touchstart", ".edit-btn", function () {
		$.ajax({
		    type: "GET",
		    url: "grupos/" + $(this).attr("value") + "/edit",
		    dataType: 'json',
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			beforeSend: function() {
			$('#item-not-found').remove();
			},
		    success: function (data) {
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

</script>



	