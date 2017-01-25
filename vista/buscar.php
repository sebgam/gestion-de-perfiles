<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>buscar</title>
    <link rel="stylesheet" type="text/css" href="css/buscar.css">
    <script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    
    
    
</head>
<body>



    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formId">
        
        <p>BUSCAR POR NUMERO ID</p>
        <p>numero ID:</p>
        <p><input type="text" name="buscarId" id="buscarId"> </p>
        <p><input type="submit" value="consultar" name="consultarId"></p>
        
    </form>
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="formNom">
        <p>BUSCAR POR NOMBRE</p>
        <p>nombre:</p>
        <p><input type="text" name="buscarNom" id="buscarNom"></p>
        <p><input type="submit" name="consultarNom" id="consultarNom" value="consultar"></p>
    </form>
    
    

<?php 



if(isset($_POST['consultarId'])){

    include("modelo/conexion.php");

    $buscaid= $_POST['buscarId'];

    $sql ="SELECT * FROM base_de_datos WHERE ID_empleado = :id";

    $resultado = $conexion->prepare($sql);

    $resultado->execute(array(":id"=>$buscaid));

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
echo  "<a href='modelo/borrar.php?id=" . $idEmpleado. "'> <img src='img/delete-file-icon.png' name='del' id='del' width='20px'></a> </td><td class='eliminar'> ";
 echo  "<a href='modelo/actualizar.php?id=" . $idEmpleado. " & apellido=" . $fila['Apellido'].  " & nombre=" . $fila['Nombre'].  " & seccional=" . $fila['Seccional'].  " & facultad=" . $fila['Facultad'].  "& cargo=" . $fila['Cargo'].  "  & salario=" . $fila['Salario'].  " & comienzo=" . $fila['Fch_comienzo'].  " & nacimiento=" . $fila['Fch_nacimiento'].  "'><img src='img/update-icon.png' name='del' id='del' width='20px'></a> </td></tr>";

    }







    echo "</table>";



}




$resultado->closeCursor();


}

//---------------------------------BUSCAR POR NOMBRE---------------------------
    if(isset($_POST['consultarNom'])){

    include("modelo/conexion.php");

    $buscanom= $_POST['buscarNom'];

    $sql ="SELECT * FROM base_de_datos WHERE Nombre LIKE '%$buscanom%'";

    $resultado = $conexion->prepare($sql);

    $resultado->execute();

    $numero_registros = $resultado->rowCount();

    if($numero_registros==0){
        echo "<br> <br> No se encontraron registros con el nombre ingresado";
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
echo  "<a href='modelo/borrar.php?id=" . $idEmpleado. "'> <img src='img/delete-file-icon.png' name='del' id='del' width='20px'></a> </td><td class='eliminar'> ";
echo  "<a href='modelo/actualizar.php?id=" . $idEmpleado. " & apellido=" . $fila['Apellido'].  " & nombre=" . $fila['Nombre'].  " & seccional=" . $fila['Seccional'].  " & facultad=" . $fila['Facultad'].  "& cargo=" . $fila['Cargo'].  "  & salario=" . $fila['Salario'].  " & comienzo=" . $fila['Fch_comienzo'].  " & nacimiento=" . $fila['Fch_nacimiento'].  "'><img src='img/update-icon.png' name='del' id='del' width='20px'></a> </td></tr>";

    }







    echo "</table>";



}




$resultado->closeCursor();


}
    

 ?>





    
    
</body>
</html>