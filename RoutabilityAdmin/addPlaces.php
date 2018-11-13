<?php

$MESSAGE = "";

session_start();

//Consultamos los datos de la obra

$conexion = mysqli_connect("localhost", "ramon", "ramon");
$BD = mysqli_select_db($conexion, "routability");

//Comprueba conexion
if(mysqli_connect_errno()){
    
    echo "Fallo de conexión: ".mysqli_connect_error();
    exit();
}

/* cambiar el conjunto de caracteres a utf8 */
if (!$conexion->set_charset("utf8")) {
            
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
    exit();
}

if(isset($_POST["aniadir"])){
 
    if(!empty($_POST['nombre']) && !empty($_POST['descripcion']) && !empty($_POST['localization']) && !empty($_POST['imagen'])){
         
         $id=2;
         $nombre=$_POST['nombre'];
         $descripcion=$_POST['descripcion'];
         $localization=$_POST['localization'];
         $imagen=$_POST['imagen'];

    if(!($QUERY = mysqli_query($conexion, "INSERT INTO `place`(`IdPlace`, `Description`, `Localitation`, `Name`, `Image`) VALUES ($id, '$descripcion', '$localization', '$nombre', '$imagen')"))){
    
        echo "Fallo del query de lugares";
        exit();
    }
        
    $MESSAGE = "LUGAR AÑADIDO";
    
    } else {
      
        $MESSAGE = "ERROR AL AÑADIR EL LUGAR";
     }
}
       
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RoutabilityAdmin</title>
  <link rel="shortcut icon" href="./img/monkeybits2.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="./theme.css" type="text/css">
  <link rel="stylesheet" href="./fonts.css" type="text/css">
</head>

<body class="bg-primary">
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3"><b>Routability: Granada</b></h1><a class="btn btn-secondary" href="admin.php" style="	transform:  translateX(900px)  translateY(-60px) ;">Volver a administración</a>
        </div>
      </div>
        
        <?php if (!empty($MESSAGE)) {echo "<p class=\"ERROR\">" . "MENSAJE: ". $MESSAGE . "</p>";}
          ?>
        
        <fieldset>

            <h1>Información del lugar</h1>

            <form action="addPlaces.php" method="post">
      <div class="row">
          
        <div class="col-md-6">
            <div class="form-group"> <label><b>Nombre del lugar</b></label><input type="nombre" class="form-control" required value="" name="nombre" placeholder="Introducir el nombre" onBlur="if(this.value=='')this.value='nombre'" onFocus="if(this.value=='nombre')this.value='' "></div>
        </div>
        <div class="col-md-6">
            <div class="form-group"> <label><b>Imagen del lugar</b></label><input type="imagen" class="form-control" required value="" name="imagen" placeholder="Introducir la imagen" onBlur="if(this.value=='')this.value='imagen'" onFocus="if(this.value=='imagen')this.value='' "></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <div class="form-group"> <label><b>Descripción del lugar</b></label><br/><textarea required value="" name="descripcion" placeholder="Escribe la descripción del lugar..." maxlength="10000" rows="10" cols="50" onFocus="if(this.value=='descripcion')this.value='' "></textarea></div>    
        </div>
        <div class="col-md-6">
            <div class="form-group"> <label><b>Localización del lugar</b></label><br/><textarea required value="" name="localization" placeholder="Escribe la localización del lugar..." maxlength="10000" rows="10" cols="50" onFocus="if(this.value=='localization')this.value='' "></textarea></div>
            <input class="bg-secondary" type="submit" name="aniadir" value="Añadir">
        </div>
      </div>
            </form>
        </fieldset>
    </div>
  </div>
  <div class="py-3 bg-secondary" style="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0"><b>© 2018 MonkeyBits. All rights reserved</b></p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous" style=""></script>
</body>

</html>