<?php

  include '../conexion/conexion.php';
  $conexion = conex();

  $idmensaje = $_POST["ident"];
  $mensaje = $_POST["mensaje"];
  $nombre = $_FILES["doc"]["name"];

  //$query = 'UPDATE mensajes SET compartido='. $id_destino . ' WHERE id_mensaje_send=' . $idmensaje;

  $fecha = getdate();
  $anio = $fecha['year'];
  $fecha2 =  $anio . "_" . date("m") . "_" . date("d");

  $query1 = 'SELECT enlace_enviado FROM mensajes WHERE id_mensaje_send="'. $idmensaje .'"';
  $url = $conexion->query($query1);

  $url = mysqli_fetch_assoc($url);

      // SELECT * FROM mensajes WHERE id_mensaje_send=4

  //echo json_encode($url["enlace_enviado"]);
  $separados = explode("/", $url["enlace_enviado"]);


  $url_resp = '../expedientes/'. $separados[0]. '/' . $separados[1] . '/' .$separados[2] . '/' . $separados[3] . '/' . $separados[4] . '/' . 'Respuesta_' . $nombre;
  $url_bd = $separados[0]. '/' . $separados[1] . '/' .$separados[2] . '/' . $separados[3] . '/' . $separados[4] . '/' . 'Respuesta_' . $nombre;
  $temporal = $_FILES['doc']['tmp_name'];

  //echo $url_resp . " - " . $temporal;

  if (move_uploaded_file($temporal, $url_resp))
  {
    $query2 = 'UPDATE mensajes SET enlace_respuesta="'. $url_bd . '", mensaje_respuesta="'.$mensaje .'", hora_respuesta="'. date("H:i") .'", fecha_respuesta="'. $fecha2 .'"  WHERE id_mensaje_send="'. $idmensaje .'"';

    $conexion->query($query2);
    mysqli_close($conexion);
    echo json_encode('Respuesta correcta');
  }
  else
  {
    echo json_encode('error');
  }




?>
