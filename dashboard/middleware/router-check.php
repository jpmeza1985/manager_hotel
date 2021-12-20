<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// session_start();
if(!isset($_SESSION['userid'])){
	header('Location: ../login.php');
	exit;
}

$is_admin = $_SESSION['admin'];
$URL_GET = $_SERVER['REQUEST_URI'];
$end_path_explode = explode('?', end(explode('/', $URL_GET)))[0];

$admin_permissions = ['usuarios.php', 'editar_usuario.php'];
$user_permissions = ['indexopera-v2.php', 'index-v2.php', 'getventaempleado.php', 'getventafpxd.php', 'gettopmi.php', 'getopenchks.php', 'getclosedchks.php', 'getmanagerflash.php'];

if ($is_admin == 1) {
    $check = in_array($end_path_explode, $admin_permissions);
    if (!$check) {
        print "<script>window.location='./usuarios.php';</script>";
        die();
    }
} else {
    $check = in_array($end_path_explode, $user_permissions);
    if (!$check) {
        print "<script>window.location='./index-v2.php';</script>";
        die();
    }
}
?>