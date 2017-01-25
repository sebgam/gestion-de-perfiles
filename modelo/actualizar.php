<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/buscar.css">

    


</head>
<body>
   
   <?php 
    include("conexion.php");
    if (!isset($_POST['guardar'])) {

      $id= $_GET['id'];
      $ape= $_GET['apellido'];
      $nom= $_GET['nombre'];
      $sec= $_GET['seccional'];
      $fac= $_GET['facultad'];
      $car= $_GET['cargo'];
      $sal= $_GET['salario'];
      $com= $_GET['comienzo'];
      $nac= $_GET['nacimiento'];
}else{

      $id = $_POST['idF'];
      $ape= $_POST['ape'];
      $nom= $_POST['nom'];
      $sec= $_POST['sec'];
      $fac= $_POST['fac'];
      $car= $_POST['car'];
      $sal= $_POST['sal'];
      $com= $_POST['com'];
      $nac= $_POST['nac'];
      
      

      $sql = "UPDATE base_de_datos SET Apellido =:apel, Nombre=:nomb, Seccional=:secc, Facultad=:facu, Cargo=:carg, Salario=:sala, Fch_comienzo=:comi, Fch_nacimiento=:naci WHERE ID_empleado=:miid ";

      $resultado= $conexion->prepare($sql);

      $resultado->execute(array(":miid"=>$id,":apel"=>$ape,":nomb"=>$nom,":secc"=>$sec,":facu"=>$fac,":carg"=>$car,":sala"=>$sal,":comi"=>$com,":naci"=>$nac));


//---------------------imagen----------------------------------------------------------------------------------------------

      $nombre_imagen = $_FILES['imagen']['name'];
      $tipo_imagen = $_FILES['imagen']['type'];
      $tamano_imagen= $_FILES['imagen']['size'];
//---------------VALIDAR EL TAMAÑO DE ARCHIVO-----------------

    if($tamano_imagen <= 1000000 ){
    //-------VALIDA EL TYPO DE IMAGEN-------------
      if($tipo_imagen =="image/jpeg" ||$tipo_imagen =="image/gif" ||$tipo_imagen =="image/png" ||$tipo_imagen =="image/jpg" ){
//------------INDICAR DIRECTORIO DONDE SE VA A GUARDAR LA IMAGEN EN SERVIDOR-------

$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/mis_creaciones/imagenes/';
move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);
                }
     }

//---------------ENVIAR DIRECCION A BASE DE DATOS-------------------

$sql2 = "UPDATE base_de_datos SET  FOTO ='$nombre_imagen' WHERE ID_empleado =:miidf ";

$resultado2= $conexion->prepare($sql2);

$resultado2->execute(array(":miidf"=>$id));














      header("location:mostrar_registro_modificado.php?id=" . $id);




     }

   



     ?>



   
    <div class="contenedor">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formId" enctype="multipart/form-data">
           
           <h2>ACTUALIZAR DATOS</h2>
           <p>ID_empleado</p>
           <input type="text" name="idF" id="idF" value="<?php echo $_GET['id'] ?>" readonly="readonly" >
           <p>Apellido</p>
           <input type="text" name="ape" id="ape" value="<?php echo $_GET['apellido'] ?>">
           <p>Nombre</p>
           <input type="text" name="nom" id="nom" value="<?php echo $_GET['nombre'] ?>">
           <p>Seccional</p>
           <input type="text" name="sec" id="sec" value="<?php echo $_GET['seccional'] ?>">
           <p>Facultad</p>
           <input type="text" name="fac" id="fac" value="<?php echo $_GET['facultad'] ?>">
           <p>cargo</p>
           <input type="text" name="car" id="car" value="<?php echo $_GET['cargo'] ?>">
           <p>Salario</p>
           <input type="text" name="sal" id="sal" value="<?php echo $_GET['salario'] ?>">
           <p>comienzo</p>
           <input type="text" name="com" id="com" value="<?php echo $_GET['comienzo'] ?>">
           <p>nacimiento</p>
           <input type="text" name="nac" id="nac" value="<?php echo $_GET['nacimiento'] ?>">
           <p>foto</p>
           <input type="file" name="imagen" id="imagen" size="20">
           <p><input type="submit" name="guardar" id="enviar" value="GUARDAR"></p>
           <p><a href="../index.php"><input type="button" value="volver"></a></p>
       </form>
        
    </div>
    
    
    
    
    
    
</body>
</html>