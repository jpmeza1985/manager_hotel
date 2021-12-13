<?php

//Conexion Simphony
$conexion = oci_connect("sys", "Or4cl3#123", "200.73.112.57/Simphony", null, OCI_SYSDBA);
if (!$conexion) {
 $m = oci_error();
 echo $m['message'], "n";
 exit;
} else {
 echo ""; }

//conexion mysql
class Database {
	public static $db;
	public static $con;
	function Database(){
                $this->user="c2050276_gestion";
		              $this->pass="goREwise06";
		                $this->host="localhost";
		                  $this->ddbb="c2050276_gestion";
        }
	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->query("set sql_mode=''");
		return $con;
	}

	public static function getCon(){

		if(self::$con==null && self::$db==null){

			self::$db = new Database();

			self::$con = self::$db->connect();

		}

		return self::$con;

	}



}

?>
