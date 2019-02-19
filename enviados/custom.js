$(document).ready(function(){

	$(document).on('click', '.elimina', function(){
  	var id=$(this).val();
		var first=$('#idmensaje'+id).text();
		var id_dest=$('#id_destino'+id).text();
		var id_asunto=$('#idtitulo'+id).text();
		
		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#destino').val(id_dest);
		$('#asunto').val(id_asunto);

	});
});
