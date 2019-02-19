<!-- Edit Modal-->
<!-- <script src="js/funciones.js"></script> -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">ELIMINAR MENSAJE</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:150px;">Identificador de mensaje:</span>
						<input type="text" style="width:350px;" class="form-control" id="efirstname" readonly>
					</div>
          <div class="form-group input-group">
            ¿Estás seguro que quieres eliminar el mensaje?<br>Dirigido a: <input type="text" id="destino" style="width:350px;" class="form-control" readonly><input type="text" id="asunto" class="form-control" style="width:350px;" readonly>
          </div>


				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="button" class="btn btn-danger" id="eliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="elimina.js"></script>


<!-- /.modal -->
