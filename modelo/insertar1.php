<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/buscar.css">

    


</head>
<body>
   
   <?php 

   if(isset($_POST['guardar'])){

    include("conexion.php");
   
      $id = $_POST['idF'];
      $ape= $_POST['ape'];
      $nom= $_POST['nom'];
      $sec= $_POST['sec'];
      $fac= $_POST['fac'];
      $car= $_POST['car'];
      $sal= $_POST['sal'];
      $com= $_POST['com'];
      $nac= $_POST['nac'];
      $nombre_imagen = $_FILES['imagen']['name'];
      

      $sql = "INSERT INTO base_de_datos  (ID_empleado,Apellido,Nombre,Seccional, Facultad, Cargo,Salario,Fch_comienzo,Fch_nacimiento,FOTO) VALUES (:miid,:apel, :nomb, :secc,:facu, :carg, :sala, :comi, :naci,:fot)";

      $resultado= $conexion->prepare($sql);

      $resultado->execute(array(":miid"=>$id,":apel"=>$ape,":nomb"=>$nom,":secc"=>$sec,":facu"=>$fac,":carg"=>$car,":sala"=>$sal,":comi"=>$com,":naci"=>$nac,":fot"=>$nombre_imagen));


//---------------------imagen----------------------------------------------------------------------------------------------

      
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


















      header("location:modelo/mostrar_registro_creado.php?id=" . $id);




     

   

}

     ?>



   
    <div class="contenedor">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formId" enctype="multipart/form-data">
           
           <h2>ACTUALIZAR DATOS</h2>
           <p>ID_empleado</p>
           <input type="text" name="idF" id="idF" >
           <p>Apellido</p>
           <input type="text" name="ape" id="ape" >
           <p>Nombre</p>
           <input type="text" name="nom" id="nom" >
           <p>Seccional</p>
           <input type="text" name="sec" id="sec" >
           <p>Facultad</p>
           <input type="text" name="fac" id="fac" >
           <p>cargo</p>
           <input type="text" name="car" id="car" >
           <p>Salario</p>
           <input type="text" name="sal" id="sal" >
           <p>comienzo</p>
           <input type="text" name="com" id="com" >
           <p>nacimiento</p>
           <input type="text" name="nac" id="nac" >
           <p>foto</p>
           <input type="file" name="imagen" id="imagen" size="20">
           <p><input type="submit" name="guardar" id="enviar" value="GUARDAR"></p>
           <p><a href="../index.php"><input type="button" value="volver"></a></p>
       </form>
        
    </div>
    
    
    
    
    
    
</body>
</html>