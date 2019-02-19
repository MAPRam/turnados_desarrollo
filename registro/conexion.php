<?php

    function conex()
    {
        $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");
        //mysqli_set_charset($conexion, 'utf8');

        return $conexion;
    }

?>
