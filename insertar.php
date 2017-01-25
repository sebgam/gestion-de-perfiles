<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>inicio</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
    
</head>
<body>
   <div class="contenedor">
    <header>
      <nav>
          <ul>
              <li><a href="index.php" id="buscar" name="buscar" >buscar</a></li>
              <li><a href="insertar.php" id="insertar" name="insertar">insertar nuevo</a></li>
              <li><a href="mostrar_perfil.php" id="mostrar" name="mostrar">mostrar perfil</a></li>
          </ul>
          
      </nav>  
        
    </header>
    </div>

   <?php 

    require_once("modelo/insertar1.php");


     ?>


</body>
</html>