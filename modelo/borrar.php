<?php 

 

include("conexion.php");

$id = $_GET['id'];

$conexion->query("DELETE FROM base_de_datos WHERE ID_empleado='$id'");

header("location:../index.php");

 



 ?>