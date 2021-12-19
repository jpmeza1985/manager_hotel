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

$mysqli->query("UPDATE usuarios SET activo = ". $_POST['status'] ." WHERE id_usuarios = '". $_POST['user_id'] ."'");

echo json_encode(array('response' => true, 'query' => "UPDATE usuarios SET activo = ". $_POST['status'] ." WHERE id_usuarios = '". $_POST['user_id'] ."'"));

?>