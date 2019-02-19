<?php

  include '../conexion/conexion.php';
  $conexion = conex();

  $idmensaje = $_POST["id_mensaje"];
  $id_destino = $_POST["id_destino"];


  $query = 'UPDATE mensajes SET compartido='. $id_destino . ' WHERE id_mensaje_send=' . $idmensaje;



      // SELECT * FROM mensajes WHERE id_mensaje_send=4

  // $response = $idmensaje . ' - ' . $id_destino;

  $conexion->query($query);
  mysqli_close($conexion);

  echo json_encode("Bien");


?>
