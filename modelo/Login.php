<?php 
	require "../config/conexion.php";


Class Login
{
	public function __construct(){}

	public function verificar($login,$clave){
		$sql="SELECT login FROM administrador WHERE login='$login'  AND password='$clave'"; 
		return ejecutarConsulta($sql);
	}
	

}

?>