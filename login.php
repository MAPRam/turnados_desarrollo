<?php
    
    session_start();

    $name = $_POST["usuario"];
    $password = $_POST["password"];

    $conexion = new mysqli("localhost", "mensajes", "Frutyloop10!", "correspondencia");

    $sql = 'SELECT * FROM usuario WHERE correo="' . $name . '" AND password="' . $password . '"';

    $result = $conexion->query($sql);

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }
    if (($name == $row["correo"]) && $password == $row["password"] )
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['usuario'] = $row["nombre"];
        $_SESSION['apellido_p'] = $row["apellido_p"];
        $_SESSION['puesto'] = $row["puesto"];
        $_SESSION['id_usuario'] = $row["id_usuario"];
        $_SESSION['tipo_usuario'] = $row["tipo_usuario"];
        $_SESSION['direccion'] = $row["direccion"];
        $_SESSION['user'] = $row["user"];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        mysqli_close($conexion);
        header("Location: administrador/");
    }

    else
    {
        mysqli_close($conexion);
        echo'<script type="text/javascript">alert("Usuario o contraseña incorrectos, intenta otra vez");
        window.location.href="index.php";
        </script>';
    }



?>
