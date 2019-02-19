$(document).ready(function(){

	$(document).on('click', '.responde', function(){
  	var id=$(this).val();
		var first=$('#idmensaje'+id).text();
		var remitente=$('#id_remitente'+id).text();
		var last=$('#titulo'+id).text();
		var address=$('#descripcion'+id).text();


		$('#resp').modal('show');
		$('#remitente').val(remitente);
		$('#ident').val(first);
		$('#title').val(last);
		$('#asunto').val(address);
	});
});
