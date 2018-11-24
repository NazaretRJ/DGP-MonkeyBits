<?php

  $MESSAGE = "";
  $id = $_GET['id'];

  session_start();

  //Consultamos los datos de la obra

  $conexion = mysqli_connect("localhost", "root", "");
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

  if(!($Places = mysqli_query($conexion,"SELECT * FROM place WHERE IdPlace=".$id))){
    
            echo "Fallo del query de selección del lugar";
            exit();

        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RoutabilityAdmin</title>
    <link rel="shortcut icon" href="./img/monkeybits2.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://static.pingendo.com/bootstrap/bootstrap-4.1.3.css">
    <link rel="stylesheet" href="theme.css">
    <link rel="stylesheet" href="fonts.css" type="text/css">

</head>

<body class="bg-primario">
    <div class="py-2" style="">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="">
                    <div class="list-group">
                        <h3><a href="#" class="list-group-item list-group-item-action active list-group-item-info icon-library">&nbsp;Información del Lugar</a></h3>
                        <?php

                  if ($Places != NULL)
                    $lugares = mysqli_fetch_array($Places);
                  
                    if ($lugares != NULL) {

                    $id = $lugares["IdPlace"];
                    $nombre = $lugares["Name"];
                    $desc = $lugares["Description"];
                    $loc = $lugares["Localitation"];
                    $acc = $lugares["Accesibility"];
                    $img = $lugares["Image"];

                    echo '<div class="list-group-item list-group-item-action miembro-lista">';
                    echo '<h4><u><b>'.$nombre.'</b></u></h4>'; 
                    echo '<img class="foto" title="foto de '.$nombre.'" alt="foto de '.$nombre.'" src="'.$img.'">';
                    echo '<p><b>Descripción:</b><br>'.$desc.'</p>';
                    echo '<p><b>Localización:</b><br>'.$loc.'</p>';
                    echo '<p><b>Accesibilidad:</b><br>'.$acc.'</p>';
                    echo '</div>';
                  }
              
            ?>
                    </div>
                    <div class="py-2">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="viewPlaces.php" class="btn btn-light icon-library">&nbsp;Volver a vista de lugares</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<?php
  mysqli_close($conexion);
?>

</html>