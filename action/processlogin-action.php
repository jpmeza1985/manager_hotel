<?php
include '../bd/database.php';
include 'Session.php';
// exit();
$user = $_POST['email'];
$pass = $_POST['pass'];
$base = new Database();
$con = $base->connect();
$sql = "select * from usuarios where email= \"" . $user . "\" and password= \"" . $pass . "\" ";
$query = $con->query($sql);
$found = false;

while ($r = $query->fetch_array()) {

    $userid = $r['id_usuarios'];
    $userhotel = $r['id_hotel'];
    $nom_hotel = $r['nom_hotel'];
    $usernombre = $r['nombre'];
    $useremail = $r['email'];
    $admin = $r['admin'];
    $found = true;
}

if ($found == true) {
    session_start();

    $_SESSION['userid'] = $userid;
    $_SESSION['userhotel'] = $userhotel;
    $_SESSION['nom_hotel'] = $nom_hotel;
    $_SESSION['usernombre'] = $usernombre;
    $_SESSION['useremail'] = $useremail;
    $_SESSION['fecha'] = " ";
    $_SESSION['admin'] = $admin;

    $fecha = new DateTime("now", new DateTimeZone('America/Santiago'));
    $dia = $fecha->format('Y-m-d');
    $hora = $fecha->format('H:i');
    $con = $base->connect();
    $sql2 = "insert into logs (id_usuarios, id_hotel, accion, fecha, hora, detalle) values ($userid, $userhotel, 'Login', '$dia', '$hora', 'El usuario $usernombre a ingresado al Sistema' )";
    $query = $con->query($sql2);

    print "Cargando Usuario ... $user ";

    print "<script>window.location='../dashboard/index-v2.php';</script>";
} else {
    print "<script>window.alert('Error de Credenciales');</script>";
    print "<script>window.location='../login-v2.php';</script>";
}
?>
