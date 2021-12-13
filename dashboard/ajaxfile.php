<?php
	include '../bd/config.php';
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();
	# Read value
	$draw = $_POST['draw'];
	$row = $_POST['start'];
	$rowperpage = $_POST['length']; // Rows display per page
	$columnIndex = $_POST['order'][0]['column']; // Column index
	$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
	$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
	$searchValue = $_POST['search']['value']; // Search value
	
	$searchArray = array();
	## Search 
	$searchQuery = " ";
	if($searchValue != ''){
		$searchQuery = " AND (
        codigo LIKE :codigo or 
        apellidos LIKE :apellidos OR 
        nombres LIKE :nombres OR 
        genero LIKE :genero ) ";
		$searchArray = array( 
        'codigo'=>"%$searchValue%", 
        'apellidos'=>"%$searchValue%",
        'nombres'=>"%$searchValue%",
        'genero'=>"%$searchValue%"
		);
	}
	
	## Total number of records without filtering
	$stmt = $conexion->prepare("SELECT COUNT(*) AS allcount FROM usuarios ");
	$stmt->execute();
	$records = $stmt->fetch();
	$totalRecords = $records['allcount'];
	
	## Total number of records with filtering
	$stmt = $conexion->prepare("SELECT COUNT(*) AS allcount FROM usuarios WHERE 1 ".$searchQuery);
	$stmt->execute($searchArray);
	$records = $stmt->fetch();
	$totalRecordwithFilter = $records['allcount'];
	
	## Fetch records
	$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");
	
	// Bind values
	foreach($searchArray as $key=>$search){
		$stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
	}
	
	$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
	$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
	$stmt->execute();
	$empRecords = $stmt->fetchAll();
	
	$data = array();
	
	foreach($empRecords as $row){
		if($row['estado']==NULL or $row['estado']==0){
			$estado = '<div class="badge badge-warning badge-pill">Pendiente</div>';
			}elseif($row['estado']==-1){
			$estado = '<div class="badge badge-secondary badge-pill">Inactivo</div>';	
			}elseif($row['estado']==1){
			$estado = '<div class="badge badge-success badge-pill">Activo</div>';	
		}
		$originalDate = $row['fecha'];
		$fecha = date("d-m-Y", strtotime($originalDate));
		
		$op =' <button class="btn btn-datatable btn-icon btn-transparent-dark mr-2" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		
        <a class="dropdown-item view" href="#!" id="'.$row['id'].'"><svg class="feather" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg> Ver detalles</a>
		
        <a class="dropdown-item update" href="#!" id="'.$row['id'].'"><svg class="feather" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Editar</a>
		
        <a class="dropdown-item btnBorrar" href="#!" id="'.$row['id'].'"><svg class="feather" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Eliminar</a>
		</div>
		
		<button class="btn btn-datatable btn-icon btn-transparent-dark btnBorrar" id="'.$row['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>';
		$data[] = array(
		"id"=>$row['id'],
		"codigo"=>$row['codigo'],
		"apellidos"=>$row['apellidos'],
		"nombres"=>$row['nombres'],
		"genero"=>$row['genero'],
		"fecha"=>$fecha,
		"estado"=>$estado,
		"accion"=>$op
		);
	}
	
	## Response
	$response = array(
	"draw" => intval($draw),
	"iTotalRecords" => $totalRecords,
	"iTotalDisplayRecords" => $totalRecordwithFilter,
	"aaData" => $data
	);
	
	echo json_encode($response);