<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['userid'])){
	header('Location: ../login.php');
	exit;
}
include '../bd/database.php';

$database =  new Database();
$mysqli = $database->connect();

// Verify email registered
$emails = $mysqli->query("SELECT * FROM usuarios WHERE email = '". $_POST['email'] ."' AND id_usuarios !=".$_POST['usuario_id']);
$emails->fetch_all(MYSQLI_ASSOC);
$cantidad = mysqli_num_rows($emails);
if ($cantidad > 0) {
  $user_id = $_POST['usuario_id'];
  $_POST = "";
  header('Location: ./editar_usuario.php?uid='.$user_id.'&e=1');
  die();
}

$query_sql = "UPDATE usuarios
		SET id_hotel=".$_POST['hotel'].", nom_hotel='".$_POST['nombre_hotel']."',
		nombre='".$_POST['name']."', email='".$_POST['email']."',
		password='".$_POST['password']."'
		WHERE id_usuarios=". $_POST['usuario_id'];
$mysqli->query($query_sql);

header('Location: ./editar_usuario.php?uid='.$_POST['usuario_id']);
die();

?>