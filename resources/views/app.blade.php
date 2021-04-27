<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=500">
	<title>Clientes</title>
	<link rel="stylesheet" href="{{ asset('css/app2.css') }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
		<div id="spa"> <!--Ajax para el single page -->
		 	@yield('body')<!--Aca visualizamos los menus cliente y grupo -->
		</div>
	</main>
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<script type="text/javascript">//nos permite simular una aplicacion Single Page
    $("#spaGrupo").click(function() {
        $(spa).load("/grupos");//cargamos el controlador con la vista de grupo
    });
    $("#spaCliente").click(function() {
        $(spa).load("/clientes");//cargamos el controlador con la vista de cliente
    });
</script>
