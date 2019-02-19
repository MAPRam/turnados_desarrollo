$(document).ready(function(){

	$(document).on('click', '.edit', function(){
  	var id=$(this).val();
		var first=$('#idmensaje'+id).text();
		var last=$('#titulo'+id).text();
		var address=$('#descripcion'+id).text();
    console.log(id);
    console.log(first);
    console.log(last);
    console.log(address);

		$('#edit').modal('show');
		$('#efirstname').val(first);
		$('#elastname').val(last);
		$('#eaddress').val(address);
	});
});
