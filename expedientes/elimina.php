<?php

  include '../conexion/conexion.php';
  $conexion = conex();

  $idmensaje = $_POST["id_mensaje"];

  $query = 'SELECT enlace_enviado FROM mensajes WHERE id_mensaje_send="' . $idmensaje . '"';

  $res = $conexion->query($query);

  $rs = mysqli_fetch_assoc($res);

  $rs2 = explode("/", $rs["enlace_enviado"]);

  $drop = $rs2[0] . '/' . $rs2[1] . '/' . $rs2[2] . '/' . $rs2[3] . '/' . $rs2[4];

  unlink($rs["enlace_enviado"]);
  rmdir($drop);

  $query2 = 'DELETE FROM mensajes where id_mensaje_send="'.$idmensaje.'"';

  $conexion->query($query2);

  mysqli_close($conexion);

  echo json_encode('1');


?>
