@include('clientes.layout')
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/refresh.js') }}"></script>
<script src="{{ asset('js/store.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/show.js') }}"></script>
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
				if(e.which == 13) {//compruba si se ingreso enter
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




</script>



	