<?php
	class Conexion{
		public static function Conectar(){
			define('servidor','localhost');
			define('nombre_bd','db_manager');
			define('usuario','root');
			define('password','');         
			$opciones = array(
			PDO::ATTR_PERSISTENT => FALSE, 
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci',
            );	
			
			try{
				$conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
				return $conexion; 
				}catch (Exception $e){
				die("El error de Conexión es :".$e->getMessage());
			}         
		}
		
	}	