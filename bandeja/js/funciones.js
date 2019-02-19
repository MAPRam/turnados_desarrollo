function responde(id)
{
  console.log(id);
  console.log("Lalalal");
  console.log(document.getElementById(id).value);
}


function ejecuta()
{
  var id_mensaje = document.getElementById('efirstname').value;
  var titulo = document.getElementById('elastname').value;

  var id_obj = document.getElementById("destinatario").selectedIndex;
  var id_list = document.getElementById("destinatario").options;

  var id_usr = id_list[id_obj].id;

  console.log(id_mensaje);
  console.log(titulo);
  console.log(id_usr);

}
