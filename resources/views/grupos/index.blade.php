@include('grupos.layout')
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<!-- Todos los js para los request de los controladores-->
<script src="{{ asset('js/refresh.js') }}"></script>
<script src="{{ asset('js/store.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
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

</script>