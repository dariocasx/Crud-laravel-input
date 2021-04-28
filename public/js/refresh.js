function refreshTable() {//Devuelve los valores de la tabla cliente
	$('div.table-container').hide();
	$('#table-loader').hide();
	$('#table-loader').fadeIn();
	$('div.table-container').load('table', function() {//Carga la tabla por el controlador
		$('#table-loader').hide();
		$('div.table-container').fadeIn();
	});
}
function refreshTable2() {//Devuelve los valores de la tabla grupo
	$('div.table-container2').hide();
	$('#table-loader2').hide();
	$('#table-loader2').fadeIn();
	$('div.table-container2').load('table2', function() {//Carga la tabla por el controlador
		$('#table-loader2').hide();
		$('div.table-container2').fadeIn();
	});
}

jQuery(document).ready(function($)  {
	//Elimina elementos anteriores del cliente
	$('#update-form').hide();
	$('#view-data').hide();
	$('#table-loader').hide();
	$('#destroy-loading-bar').hide();
	//Elimina elementos anteriores del grupo
	$('#update-form2').hide();
	$('#view-data2').hide();
	$('#table-loader2').hide();
	$('#destroy-loading-bar2').hide();
	
	$.ajaxSetup({//Token de seguridad para el ajax
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// actualiza por medio del boton en cliente
	$("#refresh").bind("click touchstart", function () {
		refreshTable();
	});
	// actualiza por medio del boton en grupo
	$("#refresh2").bind("click touchstart", function () {
		refreshTable2();
	});
});