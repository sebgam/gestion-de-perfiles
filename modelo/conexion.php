<?php 

		try{
		$conexion= new PDO("mysql:host=localhost; dbname=pruebas", "root" ,"clave.123");
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conexion->exec("SET CHARACTER  SET utf8");



}catch(exception $e){
	die("error: " . $e->getMessage());
	echo "linea " . $e->getLine();
}









 ?>