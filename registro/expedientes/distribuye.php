<?php
    include "../../conexion/conexion.php";
    $conexion = conex();
    //$destinatario = $_POST['destinatario'];
    //echo json_encode($destinatario);
    session_start();

    $query = "SELECT MAX(id_mensaje_send) as maximo FROM mensajes";
    $datos = $conexion->query($query2);
    $datos2 = mysqli_fetch_assoc($datos2);
    $datos2["maximo"] = $datos2["maximo"] + 1;
    //echo($datos2["maximo"]);
    //mysqli_free_result($datos);
    //mysqli_free_result($datos2);

    //PREPARA DATOS PARA INSERTAR EN LA TABLA DE MENSAJES 

    $fecha = getdate();
    $dia = $fecha['day'];
    $mes = $fecha['mday'];
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
    $url = $direc;  // . "/" . $puesto1["puesto"] . "/" . $user_get . "/" . $fecha2 . "/" . date("H:i") 
    $exist = 0;

    $user_get = str_replace(" ", "", $user_get);

    $url = $url = $direc . "/" . $puesto1["puesto"] . "/" . $user_get . "/" . $fecha2 . "/" . date("H:i");

    if (file_exists($url)) 
    {
       echo json_encode('error');
    } 
    else 
    {
        mkdir($url, 0777, true);


        $tmpFilePath = $_FILES['archivo']['tmp_name'];
        if ($tmpFilePath != "") 
        {
            $fil = $url . "/" .'Solicitud_' . $_SESSION['usuario'] . '.pdf';
            if (move_uploaded_file($tmpFilePath, $fil)) 
            {
                chmod($fil, 0777);

                //$query2 = 'INSERT INTO mensajes(id_mensaje_send, id_usuario_send, id_usuario_get, titulo_mensaje, descripcion, fecha_enviado,hora_enviado, estado_respuesta, enlace_enviado, enlace_respuesta, mensaje_respuesta, hora_respuesta) 
                //VALUES($datos2["maximo"], $_SESSION['id_usuario'], $id_get, $_POST['titulo'], $_POST['descripcion'], $fecha2)';
                
            }
        }

        
    }
    
    

    //echo($_SESSION['loggedin']);
    //echo("<br/>");
    //echo($_SESSION['usuario']);
    //echo("<br/>");
    //echo($_SESSION['puesto']);
    //echo("<br/>");
    //echo($_SESSION['id_usuario']);
    //echo("<br/>");
    //echo($_SESSION['tipo_usuario']);
    mysqli_free_result($datos2);
    mysqli_free_result($puesto1);
    mysqli_close($conexion);
    echo json_encode($url);


?>