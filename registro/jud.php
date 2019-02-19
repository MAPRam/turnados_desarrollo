<?php
  include 'conexion.php';

  $conexion = conex();

    $nombre = $_POST["nombre"];
    $ape1 = $_POST["apellido_p"];
    $ape2 = $_POST["apellido_m"];
    $dire = $_POST["direccion"];
    $correo = $_POST["email"];
    $contra = $_POST["password"];


  $query1 = "SELECT MAX(id_usuario) as maximo FROM usuario";
  $datos = $conexion->query($query1);
  $datos = mysqli_fetch_assoc($datos);
  $datos["maximo"] = $datos["maximo"] + 1;

  $query2 = 'SELECT id_direccion FROM direccion WHERE nombre_direccion="'. $dire . '"';
  $datos2 = $conexion->query($query2);
  $datos2 = mysqli_fetch_assoc($datos2);
  $id_direcc = $datos2["id_direccion"];

  $queryp1 = 'INSERT INTO usuario(id_usuario, tipo_usuario, nombre, apellido_p, apellido_m, user, password, puesto, direccion, correo, estado)';
  $queryp2 = ' VALUES( ' . $datos["maximo"] . ' , ' . $id_direcc . ' , "' . $nombre . '", "' . $ape1 . '", "' . $ape2 . '", "' . $nombre . '", "' . $contra .'", "' . 2 .'", "' . $dire . '", "' . $correo . '", 1)';

  $queryfin = $queryp1 . $queryp2;


  if ($conexion->query($queryfin))
  {
    mysqli_close($conexion);
    echo json_encode($queryfin);
  }
  else
  {
    mysqli_close($conexion);
    echo json_encode('error');
  }






?>
