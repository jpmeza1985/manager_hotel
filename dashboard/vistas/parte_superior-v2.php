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
$URL_GET = $_SERVER['REQUEST_URI'];
$end_path_explode = end(explode('/', $URL_GET));
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
<html class="loading" lang="en" data-textdirection="ltr" id="html-id">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ITH Sistemas</title>
    <link href="assets/font/font-style.css" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="assets/css/font/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/plugins/charts/chart-apex.css">

    <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
    <script>
        miStorage = window.localStorage;
        const current_mode = miStorage.getItem('light-layout-current-skin');
        if (!!current_mode) {
            let htmlTag = document.getElementById('html-id')
            htmlTag.classList.add(current_mode);
        }
    </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"><?php echo $_SESSION["usernombre"];?></span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="page-profile.html">
                            <i class="mr-50" data-feather="user"></i> Cuenta
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../login.php"><i class="mr-50" data-feather="power"></i> Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="#">
                        <span class="brand-logo">
                            <img src="assets/images/logo.png" alt="ITH" width="56px">
                        </span>
                        <h2 class="brand-text">Sistemas</h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Menu</span><i data-feather="more-horizontal"></i></li>
                <li class=" nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather="credit-card"></i>
						<span class="menu-title text-truncate" data-i18n="Card">Dashboards</span>
					</a>
                    <ul class="menu-content">
                        <li <?php if ($end_path_explode == 'index-v2.php') { echo 'class="active"'; } ?>>
                            <a class="d-flex align-items-center" href="index-v2.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Simphony</span>
                            </a>
                        </li>
                        <li <?php if ($end_path_explode == 'indexopera-v2.php') { echo 'class="active"'; } ?>>
                            <a class="d-flex align-items-center" href="indexopera-v2.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Opera</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="index.html"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span><span class="badge badge-light-warning badge-pill ml-auto mr-1">2</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
                        </li>
                    </ul>
                </li> -->
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Reportes</span><i data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i class="file-text"></i>
                        <span class="menu-title text-truncate" data-i18n="Email">Simphony</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a class="d-flex align-items-center" href="getventaempleado.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Venta Empleado</span>
                            </a>
                        </li>
						<li>
                            <a class="d-flex align-items-center" href="getventafpxd.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Venta por Forma de Pago</span>
                            </a>
                        </li>
						<li>
                            <a class="d-flex align-items-center" href="gettopmi.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Venta Menu Items</span>
                            </a>
                        </li>
						<li>
                            <a class="d-flex align-items-center" href="getopenchks.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Detalle Checks Abiertos</span>
                            </a>
                        </li>
						<li>
                            <a class="d-flex align-items-center" href="getclosedchks.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Detalle Checks Cerrados</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="#">
                        <i class="file-text"></i>
                        <span class="menu-title text-truncate" data-i18n="Email">Opera</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a class="d-flex align-items-center" href="getmanagerflash.php">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Statistics">Manager Flash</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item">
                    <a class="d-flex align-items-center" href="../login.php">
                        <i data-feather="power"></i>
                        <span class="menu-title text-truncate" data-i18n="Todo">Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
