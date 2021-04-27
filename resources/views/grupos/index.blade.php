@include('grupos.layout')
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<!-- Todos los js para los request de los controladores-->
<script src="{{ asset('js/refresh.js') }}"></script>
<script src="{{ asset('js/store.js') }}"></script>
<!--<script src="{{ asset('js/edit.js') }}"></script>-->
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/show.js') }}"></script>
<script src="{{ asset('js/destroy.js') }}"></script>
<!--Realizamos los mismos script que en cliente para la tabla grupo-->
<script type="text/javascript">
	function buscar(){
		var query = $(search2).val();
		fetch_customer_data(query);//ingreso a la funcion la busqueda
		$(search2).val("");//devuelvo vacio al input
	}

		var select="grupos";	
		var query = "";
		//fetch_customer_data();
		function fetch_customer_data(query = '')
		{
	      var dataString = 'query=' + query + '&select=' + select;	
		  $.ajax({
			   url:"customsearch",
			   method:'GET',//ajax para el controlador y para que devuelva la tabla con los filtros
			   data:dataString,
			   dataType:'json',
			   success:function(data)
			   {
			    $('tbody').html(data.table_data);
			   }
			  })
		 }
		 $(document).on('keyup', '#search2', function(){//input para la busqueda
			$("#search2").keypress(function(e) {
				if(e.which == 13) {//comprueba si se ingreso enter
				//select="";
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

