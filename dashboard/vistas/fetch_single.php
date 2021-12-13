<?php
	include_once '../../bd/config.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	
	if($_POST["action"]=="update"){
		$output = array();
		$statement = $conexion->prepare(
		"SELECT * FROM usuarios 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output["codigo"] = $row["codigo"];
			$output["apellidos"] = $row["apellidos"];
			$output["nombres"] = $row["nombres"];
			$output["genero"] = $row["genero"];
			$output["estado"] = $row["estado"];
			$output["fecha"] = $row["fecha"];
			$output["id"] = $row["id"];
			if($row["imagen"] != '')
			{
				$output['user_image'] = '<img src="images/'.$row["imagen"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["imagen"].'" />';
			}
			else
			{
				$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
			}
		}
		echo json_encode($output);
		}elseif($_POST["action"]=="detalles"){
		$output = array();
		$statement = $conexion->prepare(
		"SELECT * FROM usuarios 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
		);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['estado']==NULL or $row['estado']==0){
				$estado = '<div class="badge badge-warning badge-pill">Pendiente</div>';
				}elseif($row['estado']==-1){
				$estado = '<div class="badge badge-secondary badge-pill">Inactivo</div>';	
				}elseif($row['estado']==1){
				$estado = '<div class="badge badge-success badge-pill">Activo</div>';	
			}
			
			$output["codigo"] = $row["codigo"];
			$output["apellidos"] = $row["apellidos"];
			$output["nombres"] = $row["nombres"];
			$output["genero"] = $row["genero"];
			$output["estado"] = $estado;
			$output["fecha"] = $row["fecha"];
			$output["imagen"] = $row["imagen"];
			$output["id"] = $row["id"];
		}
		echo json_encode($output);
	}
?>