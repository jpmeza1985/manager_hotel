<?php
	include_once '../../bd/config.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	// Recepción de los datos enviados mediante POST desde el JS

	$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
	$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
	$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
	$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
	$genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
	$estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
	$imagen = '';
	if($_FILES["user_image"]["name"] != '')
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../images/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		$imagen = $new_name;
	}else
	{
		$imagen = $_POST["hidden_user_image"];
	}

	$action = (isset($_POST['action'])) ? $_POST['action'] : '';
	$id = (isset($_POST['id'])) ? $_POST['id'] : '';

	switch($action){
		case "create": //alta
        $consulta = $conexion->prepare("INSERT INTO usuarios (codigo, fecha, apellidos, nombres, genero, imagen, estado) VALUES(:codigo, :fecha, :apellidos, :nombres, :genero, :imagen, :estado) ");
		$consulta->execute(
		array(
		':codigo'	=>	$codigo,
		':fecha'	=>	$fecha,
		':apellidos'	=>	$apellidos,
		':nombres'	=>	$nombres,
		':genero'	=>	$genero,
		':imagen'	=>	$imagen,
		':estado'		=>	$estado
		)
		);
		if ($consulta->rowCount() > 0){
			$data = 1;
			}else{
			$data = 0;
		}
        break;
		case "editar": //modificación
        $consulta = $conexion->prepare("UPDATE usuarios SET codigo=:codigo, fecha=:fecha, apellidos=:apellidos, nombres=:nombres, genero=:genero, imagen=:imagen, estado=:estado WHERE id=:id");

		$consulta->execute(
		array(
		':codigo'	=>	$codigo,
		':fecha'	=>	$fecha,
		':apellidos'	=>	$apellidos,
		':nombres'	=>	$nombres,
		':genero'	=>	$genero,
		':imagen'	=>	$imagen,
		':estado'		=>	$estado,
		':id'		=>	$id
		)
		);
		if ($consulta->rowCount()){
			$data = 1;
			}else{
			$data = 0;
		}

		break;

	}

	print json_encode($data, JSON_UNESCAPED_UNICODE);
	$conexion = NULL;
