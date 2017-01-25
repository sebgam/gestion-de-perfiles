<?php 

echo "hola putosa";
include("conexion.php");

$nombre= "sebas";
$suma = 5;

 $sql="SELECT * FROM base_de_datos WHERE  Nombre=:nom ";

$resultado = $conexion->prepare($sql);

$resultado->execute(array(":nom"=>$nombre));

 while ($fila= $resultado->fetch(PDO::FETCH_ASSOC)) {

echo $fila['ID_empleado'] + $suma;
 	
 }





 ?>
