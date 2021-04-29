<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=500">
	<title>Clientes</title>
	<link rel="stylesheet" href="{{ asset('css/app2.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				families: ['Open Sans:800', 'Nunito:600']
			}
		});
	</script>
	
</head>
<body>
	@include('navbar')
	<main class="container">
		<div id="spa"> <!--Ajax para el Single Page Application-->
		 	@yield('body')<!--Aca visualizamos el menu cliente o grupo -->
		</div>
		
	</main>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<script type="text/javascript">
    //Nos permite simular un Single Page Application
    $("#spaGrupo").click(function() {
		$('.active')//Buscamos la clase activada en el menu
		.removeClass('active')//Removemos la clase activada
		$('#btnGrupo')//Buscamos la clase del boton grupo
		.addClass('active')//Asignamos la clase active a grupo
        $(spa).load("/grupos");//Cargamos el controlador con la vista de grupo
    });
    $("#spaCliente").click(function() {
    	$('.active')//Buscamos la clase activada en el menu
		.removeClass('active')//removemos la clase activada
		$('#btnCliente')//Buscamos la clase del boton cliente
		.addClass('active')//Asignamos la clase active a cliente
        $(spa).load("/clientes");//Cargamos el controlador con la vista de cliente
    });
    $("#spaHome").click(function() {
    	$('.active')//Buscamos la clase activada en el menu
		.removeClass('active')//Removemos la clase activada
		$('#btnHome')//Buscamos la clase del boton home
		.addClass('active')//Asignamos la clase active a home
        $(spa).load("home");//Cargamos una vista estatica del home
    });
    //Hasta que no cargue la interfaz no carga los elementos
    $(window).on("load",function(){//Preloader para la carga de elementos
    	setTimeout(function() {//Despues de que haya pasado 5 milisegundos
    		$('.spa').show();//Cargamos el spa una vez que cargo todos los elementos
        }, 500);
	});

</script>
