<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/estilo1.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/i18n/defaults-*.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<title>Gestión de correspondencia</title>


</head>
<body class="background">

    <div class="container-fluid py-3">
    <div class="container-fluid">
            <nav class="navbar navbar-expand-lg" style="background-color: rgb(37,39,35);"> <!-- navbar-dark bg-dark -->
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <img class="img-fluid" width="150px" height="250px" src="images/Logo.png">
                        </li>
                        <button class="btn btn-outline-info navbar-btn" onclick="location.href='index.php'">Directores</button>
                            <!--<a class="nav-link" href="../enviar/">Enviar documento</a>-->
                        </li>
                        &nbsp;
                        &nbsp;
                        <li class="nav-item">
                        <button class="btn btn-info navbar-btn" onclick="location.href=''">Usuarios</button>
                            <!--<a class="nav-link" href="../enviar/">Enviar documento</a>-->
                        </li>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;





                        <strong><h1 class="lead" style="color: white;">REGISTRO DE USUARIOS</h1></strong>
                        &nbsp;
                        &nbsp;
                      </ul>
                      <button class="btn btn-outline-danger" onclick="location.href='../'">Salir</button>
                    </nav>
    </div>
    </div>

    <div class="container py-5">
        <div class="mt-3" id="respuesta">

        </div>
    <div class="row justify-content-center bg-light py-3">
       <p class="lead"><strong>Registro de directores</strong></p>
    </div>
    <div class="row justify-content-center bg-light" style="border-style:solid; border:5px;">

        <div class="row justify-content-center py-3">
            <form class="form-horizontal col-md-12" role="form" id="formulario" name="formulario" enctype="multipart/form-data">
            <div class="form-inline row">
                <label for="destinatario">Nombre &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" style="width: 500px;" id="nombre" name="nombre" maxlength="30" placeholder="Escribe tu nombre" required>
              </div>

                <div class="row form-inline py-2">
                  <label for="titulo">Apellido paterno &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <input type="text" class="form-control" style="width: 500px;" id="apellido_p" name="apellido_p" maxlength="30" onkeypress="return val(event)" placeholder="Escribe tu apellido paterno" required>
                </div>

                <div class="row form-inline py-2">
                  <label for="titulo">Apellido materno &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                  <input type="text" class="form-control" style="width: 500px;" id="apellido_m" name="apellido_m" maxlength="30" onkeypress="return val(event)" placeholder="Escribe tu apellido materno" required>
                </div>

                <div class="row form-inline py-2">
                  <label for="titulo">Dirección &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                  <select class="form-control" style="width: 500px;"  name="destinatario" id="destinatario">

                <?php
                        include "conexion.php";

                        $conexion = conex();

                        $query = "SELECT * FROM direccion";

                        $datos = $conexion->query($query);

                        while ($row = mysqli_fetch_assoc($datos))
                        {
                            $option = '<option id="' . $row["id_direccion"] . '"  >' . $row["nombre_direccion"] . '</option>';
                            echo($option);
                            //echo($row["direccion"]);

                        }

                        //$query2 = "SELECT MAX(id_mensaje_send) as maximo FROM mensajes";
                        //$datos2 = $conexion->query($query2);
                        //$datos3 = mysqli_fetch_assoc($datos2);
                        //$datos3["maximo"] = $datos3["maximo"] + 1;
                        //echo($datos3["maximo"]);
                        //mysqli_free_result($datos);
                        //mysqli_free_result($datos3);

                        mysqli_close($conexion);

                    ?>
                </select>
                </div>

                <div class="row form-inline py-2">
                  <label for="titulo">Correo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                  <input type="email" class="form-control" style="width: 500px;" id="email" name="email" maxlength="40" placeholder="tucorreo@correo.com" required>
                </div>
                <div class="row form-inline py-2">
                  <label for="titulo">Contraseña &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                  <input type="password" class="form-control" style="width: 500px;" id="password" name="password" onkeyup="verifica();" maxlength="30" placeholder="Escribe tu contraseña" required>
                </div>
                <div class="row form-inline py-2">
                  <label for="titulo">Confirma contraseña &nbsp;&nbsp;&nbsp; </label>
                  <input type="password" class="form-control" style="width: 500px;" id="password1" name="password1" maxlength="30" onkeyup="compara();" placeholder="Escribe tu contraseña" required>
                </div>


                        <div class="row float-right mb-5">
                            <button type="submit" class="btn btn-success" id="submit">Enviar</button>
                        </div>
            </form>
        </div>
	</div>
    </div>


    <script>
    function val(e)
    {
      tecla = (document.all) ? e.keyCode : e.which;
      if (tecla==8 ) return true;
      if (tecla==32 ) return true;
      patron = /[A-Za-z]/;
      te = String.fromCharCode(tecla);

      return patron.test(te);
    }

    function validaEmail()
    {

      var email = document.getElementById('email');
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4d})+$/;

      if (!filter.test(email.value))
      {

        document.getElementById("email").style.borderColor = "red";
      }
      else
      {
        document.getElementById("email").style.borderColor = "green";
      }
    }

    function compara()
    {
        var pss1 = document.getElementById('password').value;
        var pss2 = document.getElementById('password1').value;

        if (pss1 === pss2)
        {
          document.getElementById("password1").style.borderColor = "green";
        }
        else
        {
          document.getElementById("password1").style.borderColor = "red";
        }

    }

    function verifica()
    {

      var pss1 = document.getElementById('password').value;
      var pss2 = document.getElementById('password1').value;

      if (pss2 != "")
      {
        if (pss1 === pss2)
        {
          document.getElementById("password1").style.borderColor = "green";
        }
        else
        {
          document.getElementById("password1").style.borderColor = "red";
        }
      }
      else
      {

      }

    }
    </script>

<script src="app.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
