<!-- Edit Modal-->
<!-- <script src="js/funciones.js"></script> -->
    <div class="modal fade" id="resp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close2">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">RESPONDER</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">

          <form role="form" id="formulario" name="formulario" enctype="multipart/form-data">



					<div class="form-group input-group">
						<span class="input-group-addon" style="width:350px;">Identificador de mensaje:</span>
						<input type="text" style="width:450px;" class="form-control" name="ident" id="ident" readonly>
					</div>
          <div class="form-group input-group">
						<span class="input-group-addon" style="width:350px;">Remitente:</span>
						<input type="text" style="width:450px;" class="form-control" name="remitente" id="remitente" readonly>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:350px;">Título:</span>
						<input type="text" style="width:450px;" class="form-control" name="title" id="title" readonly>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon" style="width:350px;">Asunto:</span>
						<textarea style="width:450px; resize: none;" maxLength="200" class="form-control" name="asunto" id="asunto" readonly></textarea>
					</div>
          <div class="form-group input-group">
            <span class="input-group-addon" style="width:350px;">Mensaje de respuesta</span>
            <textarea style="width:450px;  resize: none;" maxLength="200" class="form-control" name="mensaje" id="mensaje"></textarea>
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon" style="width:350px;">Adjuntar documento</span>
            <input type="file" style="width:450px;" class="form-control" name="doc" id="doc">
          </div>

				</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
            <div id="botonload"><button type="submit" class="btn btn-info" id="responde">Enviar respuesta</button></div>

        </div>
        </form>

        </div>

            </div>
        </div>
    </div>

    <script src="responde.js"></script>


<!-- /.modal -->
