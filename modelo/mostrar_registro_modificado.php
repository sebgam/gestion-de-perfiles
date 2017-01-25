<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registro modificado</title>
	<style>
	h1{
		text-align: center;
		text-transform: uppercase;
	}

	table{
	
    margin-top: 25px;
    width: 100%;
    
}

table tr th,td {
    border: #34495E solid 1px;
}

.eliminar{
    border:none;
}
	</style>



</head>
<body>
	<h1>El registro fue modificado correctamente</h1>







	<?php 

    include("conexion.php");

    $id = $_GET['id'];

	$sql ="SELECT * FROM base_de_datos WHERE ID_empleado = :id";

    $resultado = $conexion->prepare($sql);

    $resultado->execute(array(":id"=>$id));

    $numero_registros = $resultado->rowCount();

    if($numero_registros==0){
        echo "<br> <br> No se encontraron registros con el id ingresado";
    }else{



    echo "<table>";
    echo "<tr><th>ID_EMPLEADO</th>";
    echo "<th>APELLIDO</th>";
    echo "<th>NOMBRE</th>";
    echo "<th>SECCIONAL</th>";
    echo "<th>FACULTAD</th>";
    echo "<th>CARGO</th>";
    echo "<th>SALARIO</th>";
    echo "<th>COMIENZO</th>";
    echo "<th>NACIMIENTO</th>";
   
    echo "<th>FOTO</th></tr>";

    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){

        $idEmpleado = $fila['ID_empleado']; 


        echo "<tr><td>";

echo $fila['ID_empleado'] . "</td><td>";
echo $fila['Apellido'] . " </td><td> ";
echo $fila['Nombre'] . " </td><td> ";
echo $fila['Seccional'] . " </td><td> ";
echo $fila['Facultad'] . " </td><td> ";
echo $fila['Cargo'] . " </td><td> ";
echo $fila['Salario'] . " </td><td> ";
echo $fila['Fch_comienzo'] . " </td><td> ";
echo $fila['Fch_nacimiento'] . " </td><td> ";
echo $fila['FOTO'] . " </td><td class ='eliminar'> ";
echo  "<a href='borrar.php?id=" . $idEmpleado. "'> <img src='../img/delete-file-icon.png' name='del' id='del' width='20px'></a> </td><td class='eliminar'> ";
 echo  "<a href='actualizar.php?id=" . $idEmpleado. " & apellido=" . $fila['Apellido'].  " & nombre=" . $fila['Nombre'].  " & seccional=" . $fila['Seccional'].  " & facultad=" . $fila['Facultad'].  "& cargo=" . $fila['Cargo'].  "  & salario=" . $fila['Salario'].  " & comienzo=" . $fila['Fch_comienzo'].  " & nacimiento=" . $fila['Fch_nacimiento'].  "'><img src='../img/update-icon.png' name='del' id='del' width='20px'></a> </td></tr>";

    }

    echo "</table>";

}

	 ?>

<br>

<a href="../index.php"><input type="button" value="volver"></a>





</body>
</html>