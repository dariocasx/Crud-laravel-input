function refreshTable() {
	$('div.table-container').hide();
	$('#table-loader').hide();
	$('#table-loader').fadeIn();
	$('div.table-container').load('table', function() {
		$('#table-loader').hide();
		$('div.table-container').fadeIn();
	});
}
function refreshTable2() {
	$('div.table-container2').hide();
	$('#table-loader2').hide();
	$('#table-loader2').fadeIn();
	$('div.table-container2').load('table2', function() {
		$('#table-loader2').hide();
		$('div.table-container2').fadeIn();
	});
}

jQuery(document).ready(function($)  {
	$('#update-form').hide();
	$('#view-data').hide();
	$('#table-loader').hide();
	$('#destroy-loading-bar').hide();

	$('#update-form2').hide();
	$('#view-data2').hide();
	$('#table-loader2').hide();
	$('#destroy-loading-bar2').hide();
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	// actualiza por medio del boton
	$("#refresh").bind("click touchstart", function () {
		refreshTable();
	});
	// actualiza por medio del boton
	$("#refresh2").bind("click touchstart", function () {
		refreshTable2();
	});
});