<?php
session_start();
if(!isset($_SESSION['userid'])){
	header('Location: ../login.php');
	exit;
} else {
	// Show users the page!
}
//Includes
include '../bd/database.php';
$location = $_SESSION['userhotel'];

//Definicion de variables
$fecha = new DateTime("now", new DateTimeZone('America/Santiago'));
$dia = $fecha->format('d-m-Y');
$hora = $fecha->format('H:i');
$hoy = $fecha->format('Y-m-d');
$mysqli = new mysqli('localhost', 'c2050276_gestion', 'goREwise06', 'c2050276_gestion');
//debito
$deb_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Debito';");
while ($debito = mysqli_fetch_array($deb_query)) {
	$loc_debito= $debito['id_tender'];
}
//efectivo
$cash_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Efectivo';");
while ($cash = mysqli_fetch_array($cash_query)) {
	$loc_cash= $cash['id_tender'];
}
//room
$room_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Room';");
while ($room = mysqli_fetch_array($room_query)) {
	$loc_room= $room['id_tender'];
}
//Visa
$visa_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Visa';");
while ($visa = mysqli_fetch_array($visa_query)) {
	$loc_visa= $visa['id_tender'];
}
//MasterCard
$master_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Master';");
while ($master = mysqli_fetch_array($master_query)) {
	$loc_master= $master['id_tender'];
}
//amex
$amex_query = $mysqli -> query ("SELECT id_tender FROM tender WHERE id_hotel= $location and nom_tender= 'Amex';");
while ($amex = mysqli_fetch_array($amex_query)) {
	$loc_amex= $amex['id_tender'];
}

//$id_rvc = array();
//while ($fila=mysqli_fetch_row($rvc_query)) {
  //          $id_rvc[] = $fila; // Añade el array $fila al final de $filas
    //    }

//$row = mysqli_fetch_row($rvc_query);
//for ($x = 1; $x <= $mysqli->affected_rows; $x++) {
//$rows[] = $rvc_query->fetch_assoc();
//}
//$id_rvc=$rows[0];
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Manager By ITH SISTEMAS</title>

		<!-- Custom fonts for this template-->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


		<!--datables CSS básico-->
		<link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css"/>
		<!--datables estilo bootstrap 4 CSS-->
		<link rel="stylesheet"  type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="assets/swal2/sweetalert2.min.css" type="text/css" />

		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">

	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
					<div class="sidebar-brand-icon rotate-n-0">
						<i class="fas fa-hotel fa-2x"></i>
					</div>
					<div class="sidebar-brand-text mx-3">
						<?php echo   $_SESSION['nom_hotel'];?>
<sup></sup></div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="index-v2.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard SIMPHONY</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="indexopera-v2.php">
						<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard OPERA</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Reportes
				</div>

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Simphony</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Reportes</h6>
							<a class="collapse-item" href="getventaempleado.php">Venta Empleado</a>
                    <a class="collapse-item" href="getventafpxd.php">Venta por Forma de Pago</a>
                    <a class="collapse-item" href="gettopmi.php">Venta Menu Items</a>
                    <a class="collapse-item" href="getopenchks.php">Detalle Checks Abiertos</a>
                    <a class="collapse-item" href="getclosedchks.php">Detalle Checks Cerrados</a>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
						<i class="fas fa-fw fa-cog"></i>
						<span>Opera</span>
					</a>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<h6 class="collapse-header">Reportes</h6>
							<a class="collapse-item" href="getmanagerflash.php">Manager Flash</a>

						</div>
					</div>
				</li>


				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="modal" id="btnSalir2">
						<i class="fas fa-sign-out-alt"></i>
						<span>Cerrar sesión</span>
					</a>
				</li>



				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->


			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
				<div id="content">

					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<!-- Sidebar Toggle (Topbar) -->




						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">

							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							<li class="nav-item dropdown no-arrow d-sm-none">
								<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search fa-fw"></i>
								</a>
								<!-- Dropdown - Messages -->
								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
													<i class="fas fa-search fa-sm"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</li>



							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["usernombre"];?></span>
									<img class="img-profile rounded-circle" src="img/user.png">
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="#">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
										Settings
									</a>
									<a class="dropdown-item" href="#">
										<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
										Activity Log
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" id="btnSalir">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Cerrar Sesión
									</a>
								</div>
							</li>

						</ul>

					</nav>
					<!-- End of Topbar -->
