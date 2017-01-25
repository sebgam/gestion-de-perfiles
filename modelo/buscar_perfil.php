<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/ver_perfil.css">
</head>
<body>






<div class="contenedor">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="formId" enctype="multipart/form-data">
           
           <h2>ACTUALIZAR DATOS</h2>
           <br>
           <?php 
$foto =$_GET['foto'];

echo "<img src='../imagenes/".$foto."' width='150' height='150' id='foto_perfil'>";  
 ?>
 <br>
           <p>ID_empleado</p>
           <input type="text" name="idF" id="idF" value="<?php echo $_GET['id'] ?>" readonly="readonly" >
           <p>Apellido</p>
           <input type="text" name="ape" id="ape" value="<?php echo $_GET['apellido'] ?>" readonly="readonly">
           <p>Nombre</p>
           <input type="text" name="nom" id="nom" value="<?php echo $_GET['nombre'] ?>" readonly="readonly">
           <p>Seccional</p>
           <input type="text" name="sec" id="sec" value="<?php echo $_GET['seccional'] ?>" readonly="readonly">
           <p>Facultad</p>
           <input type="text" name="fac" id="fac" value="<?php echo $_GET['facultad'] ?>" readonly="readonly">
           <p>cargo</p>
           <input type="text" name="car" id="car" value="<?php echo $_GET['cargo'] ?>" readonly="readonly">
           <p>Salario</p>
           <input type="text" name="sal" id="sal" value="<?php echo $_GET['salario'] ?>" readonly="readonly">
           <p>comienzo</p>
           <input type="text" name="com" id="com" value="<?php echo $_GET['comienzo'] ?>" readonly="readonly">
           <p>nacimiento</p>
           <input type="text" name="nac" id="nac" value="<?php echo $_GET['nacimiento'] ?>" readonly="readonly">

          
           <p><a href="../index.php"><input type="button" value="volver"></a></p>
       </form>
        
    </div>
    
    
    
    
    
    
</body>
</html>