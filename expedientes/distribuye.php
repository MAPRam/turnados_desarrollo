<?php
    include "../conexion/conexion.php";
    $conexion = conex();
    //$destinatario = $_POST['destinatario'];
    //echo json_encode($destinatario);
    session_start();

    $query = "SELECT MAX(id_mensaje_send) as maximo FROM mensajes";
    $datos = $conexion->query($query);
    $datos2 = mysqli_fetch_assoc($datos);
    $datos2["maximo"] = $datos2["maximo"] + 1;
    //echo($datos2["maximo"]);
    //mysqli_free_result($datos);
    //mysqli_free_result($datos2);

    //PREPARA DATOS PARA INSERTAR EN LA TABLA DE MENSAJES

    $fecha = getdate();
    //$dia = $fecha['day'];
    //$mes = $fecha['mday'];
    $anio = $fecha['year'];
    $id_get = $_POST["id_get"];
    $user_get = $_POST["cliente"];
    $fecha2 =  $anio . "_" . date("m") . "_" . date("d");

    $query1 = 'SELECT puesto FROM usuario WHERE id_usuario="' . $id_get . '" AND nombre="' . $user_get . '"';

    $puesto = $conexion->query($query1);
    $puesto1 = mysqli_fetch_assoc($puesto);
    $user = $_SESSION['usuario'];

    $nmb = $_POST["destinatario"]; // $_SESSION['usuario'];
    $direc = $_POST["direccion"];
    $direc = str_replace(" ", "_", $direc);
    $nmb1 = str_replace(" ","_", $nmb);
    //$url = $direc;  // . "/" . $puesto1["puesto"] . "/" . $user_get . "/" . $fecha2 . "/" . date("H:i")
    $exist = 0;

    $user_get = str_replace(" ", "", $user_get);

    $url = $direc . '/' . $puesto1['puesto'] . '/' . $user_get . '/' . $fecha2 . '/' . date('H:i');
    $fil = "";
    $query3 = "";



    if (file_exists($url))
    {
        mysqli_close($conexion);
        echo json_encode('error');
    }
    else
    {
        mkdir($url, 0777, true); // ($url, 0777, true)

        $tmpFilePath = $_FILES['archivo']['tmp_name'];
        $nomb = $_FILES['archivo']['name'];

        if ($tmpFilePath != "")
        {
            $fil = $url . '/'.$nomb; // $url . "/" .'Solicitud_' . $_SESSION['usuario'] . '.pdf';
            if (move_uploaded_file($tmpFilePath, $fil))
            {

                $cadena1 = 'INSERT INTO mensajes(id_mensaje_send, id_usuario_send, id_usuario_get, titulo_mensaje, descripcion, fecha_enviado,hora_enviado, estado_respuesta, enlace_enviado, enlace_respuesta, mensaje_respuesta, hora_respuesta)';
                $cadena2 = ' VALUES('. $datos2["maximo"] .', ' . $_SESSION["id_usuario"] . ', ' . $id_get . ', "' . $_POST["titulo"] .'", "' . $_POST["describe"] . '", "' . $fecha2 .'", "' . date("H:i") . '" , "0", "' . $fil . '" , "no contestado", "0", "0" )';

                $query3 = $cadena1 . $cadena2;
                //echo($query3);

               $conexion->query($query3);
               mysqli_free_result($puesto1);
                mysqli_close($conexion);
                echo json_encode($query3);

            }
        }
        //mysqli_free_result($datos2);

    }

?>
