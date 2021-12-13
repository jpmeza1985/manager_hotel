<?php
	
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if ($_POST['action']) {
		
		include_once '../../bd/config.php';
		$objeto = new Conexion();
		$conexion = $objeto->Conectar();
		
		$pid = intval($_POST['id']);
		$query = "DELETE FROM usuarios WHERE id=:pid";
		$stmt = $conexion->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			$response['status']  = 'success';
			$response['message'] = 'Producto eliminado correctamente...';
			} else {
			$response['status']  = 'error';
			$response['message'] = 'No se puede eliminar el producto ...';
		}
		echo json_encode($response);
	}	