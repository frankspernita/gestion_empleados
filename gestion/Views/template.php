<?php

namespace Views;

$template = new Template();

class Template
{

	public function __construct()
	{
		?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<style type="text/css">
		ul.sidebar {
			background-color: #C33C00;
		}

		nav.navbar {
			background-color: #ffb800;
		}
	</style>
	<title>Havanna</title>

	<!-- Custom fonts for this template-->
	<link href="<?php echo URL; ?>Views/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
	<!-- Custom styles for this template-->
	<link href="<?php echo URL; ?>Views/template/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="<?php echo URL; ?>Views/template/colorlib/images/favicon.png" />

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo URL; ?>principal/inicio/">
				<div class="sidebar-brand-icon">
					<img class="img-fluid" style="color:white" src="<?php echo URL; ?>Views/template/colorlib/images/logo-sin-fondo.png">
				</div>
				<div class="sidebar-brand-text mx-3"></div>
			</a>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<?php if (strpos($_SERVER['REQUEST_URI'], '/auditoria/') === false) { ?>
			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?php if ($_SESSION['idperfil'] != 1) echo URL . 'auditoria/asplocal';
														else echo URL . 'auditoria/choose_local'; ?>">
					<i class="far fa-clipboard"></i>
					<span>Nueva auditoría</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
					<i class="fas fa-user-tie"></i>
					<span>Evaluación de personal</span>
				</a>
				<div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo URL; ?>personal/evaluaciones">Evaluaciones del día</a>
						<a class="collapse-item" href="<?php echo URL; ?>personal/ver">Evaluar un empleado</a>
					</div>
				</div>
			</li>
			<?php if ($_SESSION['idperfil'] == 1) { ?>
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-stopwatch"></i>
					<span>Control</span></a>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Control de auditorías:</h6>
						<a class="collapse-item" href="<?php echo URL; ?>control/auditorias">Tiempos de carga</a>
						<a class="collapse-item" href="<?php echo URL; ?>control/por_fechas">Calcular promedio</a>
						<a class="collapse-item" href="<?php echo URL; ?>control/agregar">Agregar item</a>
						<a class="collapse-item" href="<?php echo URL; ?>control/ver">Ver item</a>
						<!--<a class="collapse-item" href="< ?php echo URL; ?>control/agregar_local">Agregar local</a>-->
						<!--<a class="collapse-item" href="< ?php echo URL; ?>control/ver_locales">Ver locales</a>-->
						<a class="collapse-item" href="<?php echo URL; ?>control/ver_locales">Admin. Locales</a>
						<!--<a class="collapse-item" href="< ?php echo URL; ?>control/agregar_usuario">Agregar usuario</a>-->
						<!--<a class="collapse-item" href="< ?php echo URL; ?>control/ver_Usuario">Ver usuarios</a>-->
						<a class="collapse-item" href="<?php echo URL; ?>control/ver_Usuario">Admin. Usuarios</a>
						<h6 class="collapse-header">Control de personal:</h6>
						<a class="collapse-item" href="<?php echo URL; ?>control/por_fechas_personal">Calcular promedio</a>
						<a class="collapse-item" href="<?php echo URL; ?>control/agregar_empleado">Agregar empleado</a>
						<!-- <a class="collapse-item" href="< ?php echo URL; ?>control/agregar_pregunta">Agregar pregunta</a>
            <a class="collapse-item" href="< ?php echo URL; ?>control/ver_preguntas">Ver pregunta</a> -->
						<a class="collapse-item" href="<?php echo URL; ?>control/ver_preguntas">Admin. Preguntas</a>
					</div>
				</div>
			</li>
			<?php } ?>
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-dolly"></i>
					<span>Gestión de stock</span></a>
				</a>
				<div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Calcular stock:</h6>
						<a class="collapse-item" href="<?php echo URL; ?>stock/procesar_stock">Agregar excel</a>
						<h6 class="collapse-header">Proveedor:</h6>
						<a class="collapse-item" href="<?php echo URL; ?>stock/agregar_proveedor">Agregar proveedor</a>
						<a class="collapse-item" href="<?php echo URL; ?>stock/ver_proveedor">Ver proveedor</a>
						<h6 class="collapse-header">Producto:</h6>
						<a class="collapse-item" href="<?php echo URL; ?>stock/agregar_producto">Agregar producto</a>
						<a class="collapse-item" href="<?php echo URL; ?>stock/ver_producto">Ver producto</a>
					</div>
				</div>
			</li>
			<?php
					} else {
						if ($_SERVER['REQUEST_URI'] != '/auditoria/resultado') { ?>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/asplocal') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/asplocal">
					<i class="fas fa-store-alt"></i>
					<span>Aspectos del local</span></a>
			</li>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/deposito') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/deposito">
					<i class="fas fa-box-open"></i>
					<span>Depósito</span></a>
			</li>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/personal') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/personal">
					<i class="fas fa-users"></i>
					<span>Personal</span></a>
			</li>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/conequipamiento') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/conequipamiento">
					<i class="fas fa-blender"></i>
					<span>Condiciones del equipamiento</span></a>
			</li>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/vajilla') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/vajilla">
					<i class="fas fa-coffee"></i>
					<span>Vajilla</span></a>
			</li>
			<li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == '/auditoria/prodinsumos') echo 'active'; ?>">
				<a class="nav-link" href="<?php echo URL; ?>auditoria/prodinsumos">
					<i class="fas fa-cheese"></i>
					<span>Productos-Insumos</span></a>
			</li>
			<?php }
					} ?>
			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->
		<?php }

			public function __destruct()
			{
				?>
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Cerrar sesión</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">¿Estás seguro que deseas cerrar sesión?</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<a href="../../log/logout" class="btn btn-primary" href="login.html">Cerrar sesión</a>
					</div>
				</div>
			</div>
		</div>

		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo URL; ?>Views/template/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo URL; ?>Views/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="<?php echo URL; ?>Views/template/vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="<?php echo URL; ?>Views/template/js/sb-admin-2.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://code.highcharts.com/modules/export-data.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
		<script>
			$(document).ready(function() {
				var idlocal1 = $('#idlocal1').val();
				var localactual = <?php echo $_SESSION['localactual']; ?>;
				$.ajax({
					url: "<?php echo URL; ?>Views/auditoria/getLocales.php",
					type: "POST",
					dataType: 'html',
					data: {
						"idlocal1": idlocal1,
						"localactual": localactual
					},
					success: function(response) {
						$('.selector-local select').html(response).fadeIn();
					}
				});
			});

			/*$(document).ready(function() {
			var idempleado = $('#idempleado').val();
			                $.ajax({
			                        url: "<?php echo URL; ?>Views/control/getEmpleados.php",
			                        type: "POST",
			                        dataType: 'html',
			                        data: {"idempleado" : idempleado},
			                        success: function(response)
			                        {
			                            $('.selector-empleado select').html(response).fadeIn();
			                        }
			                });
			});*/
			$(document).ready(function() {
				$("#selUser").select2({
					ajax: {
						url: "<?php echo URL; ?>Views/control/getEmpleados.php",
						type: "post",
						dataType: 'json',
						delay: 250,
						data: function(params) {
							return {
								searchTerm: params.term // search term
							};
						},
						processResults: function(response) {
							return {
								results: response
							};
						},
						cache: true
					}
				});
			});
			$(document).ready(function() {
				var idcategoria1 = $('#idcategoria1').val();
				$.ajax({
					url: "<?php echo URL; ?>Views/control/getCategorias.php",
					type: "POST",
					dataType: 'html',
					data: {
						"idcategoria1": idcategoria1
					},
					success: function(response) {
						$('.selector-categoria select').html(response).fadeIn();
					}
				});
			});
			$(document).ready(function() {
				var iditem = $('#iditem').val();
				$.ajax({
					url: "<?php echo URL; ?>Views/control/getItem_locales.php",
					type: "POST",
					dataType: 'html',
					data: {
						"iditem": iditem
					},
					success: function(response) {
						$('.locales').html(response).fadeIn();
					}
				});
			});

			$(document).ready(function() {
				var idproveedor1 = $('#idproveedor1').val();
				$.ajax({
					url: "<?php echo URL; ?>Views/stock/getProveedores.php",
					type: "POST",
					dataType: 'html',
					data: {
						"idproveedor1": idproveedor1
					},
					success: function(response) {
						$('.selector-proveedor select').html(response).fadeIn();
					}
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#resultado_aud').DataTable({
					dom: 'Bfrtip',
					"bFilter": false,
					language: {
						"sProcessing": "Procesando...",
						"sLengthMenu": "Mostrar _MENU_ registros",
						"sZeroRecords": "No se encontraron resultados",
						"sEmptyTable": "Ningún dato disponible en esta tabla",
						"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
						"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix": "",
						"sSearch": "Buscar:",
						"sUrl": "",
						"sInfoThousands": ",",
						"sLoadingRecords": "Cargando...",
						"oPaginate": {
							"sFirst": " Primero ",
							"sLast": " Último ",
							"sNext": " Siguiente ",
							"sPrevious": " Anterior "
						},
						"oAria": {
							"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						},
						"decimal": ",",
						"thousands": "."
					},
					buttons: [{
							extend: 'excelHtml5',
							title: 'Detalle por categoría de evaluación',
							className: 'btn',
							text: "Excel"
						},
						{
							extend: 'csvHtml5',
							title: 'Detalle por categoría de evaluación',
							className: 'btn',
							text: "CSV"
						},
						{
							extend: 'pdfHtml5',
							title: 'Detalle por categoría de evaluación',
							className: 'btn',
							text: "PDF"
						},
						{
							extend: 'print',
							title: 'Detalle por categoría de evaluación',
							className: 'btn',
							text: "Imprimir"
						},
						{
							extend: 'copy',
							title: 'Detalle por categoría de evaluación',
							className: 'btn',
							text: "Copiar"
						}
					],
					"aoColumns": [
						null,
						null,
						null,
						null,
						null,
						null
					]
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#resultadogral_aud').DataTable({
					dom: 'Bfrtip',
					"bFilter": false,
					language: {
						"sProcessing": "Procesando...",
						"sLengthMenu": "Mostrar _MENU_ registros",
						"sZeroRecords": "No se encontraron resultados",
						"sEmptyTable": "Ningún dato disponible en esta tabla",
						"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
						"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix": "",
						"sSearch": "Buscar:",
						"sUrl": "",
						"sInfoThousands": ",",
						"sLoadingRecords": "Cargando...",
						"oPaginate": {
							"sFirst": " Primero ",
							"sLast": " Último ",
							"sNext": " Siguiente ",
							"sPrevious": " Anterior "
						},
						"oAria": {
							"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						},
						"decimal": ",",
						"thousands": "."
					},
					buttons: [{
							extend: 'excelHtml5',
							title: 'Detalle general de evaluación',
							className: 'btn',
							text: "Excel"
						},
						{
							extend: 'csvHtml5',
							title: 'Detalle general de evaluación',
							className: 'btn',
							text: "CSV"
						},
						{
							extend: 'pdfHtml5',
							title: 'Detalle general de evaluación',
							className: 'btn',
							text: "PDF"
						},
						{
							extend: 'print',
							title: 'Detalle general de evaluación',
							className: 'btn',
							text: "Imprimir"
						},
						{
							extend: 'copy',
							title: 'Detalle general de evaluación',
							className: 'btn',
							text: "Copiar"
						}
					],
					"aoColumns": [
						null,
						null,
						null,
						null,
						null
					]
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#promedioItem').DataTable({
					dom: 'Bfrtip',
					"bFilter": false,
					language: {
						"sProcessing": "Procesando...",
						"sLengthMenu": "Mostrar _MENU_ registros",
						"sZeroRecords": "No se encontraron resultados",
						"sEmptyTable": "Ningún dato disponible en esta tabla",
						"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
						"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
						"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
						"sInfoPostFix": "",
						"sSearch": "Buscar:",
						"sUrl": "",
						"sInfoThousands": ",",
						"sLoadingRecords": "Cargando...",
						"oPaginate": {
							"sFirst": " Primero ",
							"sLast": " Último ",
							"sNext": " Siguiente ",
							"sPrevious": " Anterior "
						},
						"oAria": {
							"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
						},
						"decimal": ",",
						"thousands": "."
					},
					buttons: [{
							extend: 'excelHtml5',
							title: 'Promedio por cada item evaluado',
							className: 'btn',
							text: "Excel"
						},
						{
							extend: 'csvHtml5',
							title: 'Promedio por cada item evaluado',
							className: 'btn',
							text: "CSV"
						},
						{
							extend: 'pdfHtml5',
							title: 'Promedio por cada item evaluado',
							className: 'btn',
							text: "PDF"
						},
						{
							extend: 'print',
							title: 'Promedio por cada item evaluado',
							className: 'btn',
							text: "Imprimir"
						},
						{
							extend: 'copy',
							title: 'Promedio por cada item evaluado',
							className: 'btn',
							text: "Copiar"
						}
					],
					"aoColumns": [
						null,
						null
					]
				});
			});
		</script>
</body>

</html>
<?php }
} ?>