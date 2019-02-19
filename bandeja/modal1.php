<!-- Edit Modal-->
<!-- <script src="js/funciones.js"></script> -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">COMPARTIR INFORMACIÓN</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Identificador de mensaje:</span>
						<input type="text" style="width:350px;" class="form-control" id="efirstname" readonly>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Título:</span>
						<input type="text" style="width:350px;" class="form-control" id="elastname" readonly>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Asunto:</span>
						<input type="text" style="width:350px;" class="form-control" id="eaddress" readonly>
					</div>
          <div class="form-group input-group">
            <span class="input-group-addon" style="width:150px;">Reenviar a:</span>
            <select class="form-control" style="width: 350px;" id="destinatario">

            <?php
            session_start();
                    include "../conexion/conexion.php";

                    $conexion = conex();
                    $idactual = $_SESSION['tipo_usuario'];
                    $nombre = $_SESSION['usuario'];
                    $apellido = $_SESSION['apellido_p'];

                    if ($idactual == 1)
                    {
                        $query = 'SELECT id_usuario, nombre, apellido_p, direccion FROM usuario WHERE NOT nombre="'. $nombre .'"  AND puesto="1"';
                    }
                    else
                    {
                        $query = 'SELECT id_usuario, nombre , apellido_p, direccion FROM usuario WHERE tipo_usuario="'. $idactual . '" AND (NOT nombre="'. $nombre . '" OR NOT apellido_p="'. $apellido . '")'; /* NOT nombre="'. $nombre .'" AND tipo_usuario="'. $idactual .'"' */
                    }

                    $datos = $conexion->query($query);

                    while ($row = mysqli_fetch_assoc($datos))
                    {
                        $option = '<option id="' . $row["id_usuario"] . '"  >' . $row["nombre"] . " ". $row["apellido_p"] . ' (' . $row["direccion"] . ') ' . '</option>';
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

				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="button" class="btn btn-success" id="reenviar">Enviar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="reenvia.js"></script>


<!-- /.modal -->
