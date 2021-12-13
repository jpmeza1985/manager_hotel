$(document).ready(function() {
    $('#Consulta').DataTable({
        language: {

                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "",
                "infoEmpty": "",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones
        responsive: "true",
        dom: 'Bfrtilp',
        buttons:[
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
      {
				extend:    'csv',
				text:      '<i class="fa fa-file"></i> ',
				titleAttr: 'csv',
				className: 'btn btn-success'
			},
		]
    });
});


$("#btnSalir, #btnSalir2").click(function(){
		$("#formPersonas").trigger("reset");
		$(".modal-header").css("background-color", "#1cc88a");
		$(".modal-header").css("color", "white");
		$(".modal-title").text("Cerrar Sesión");
		$("#logoutModal").modal("show");
});
