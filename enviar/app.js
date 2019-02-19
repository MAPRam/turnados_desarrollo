var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');


formulario.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(formulario)

    var id_obj = document.getElementById("destinatario").selectedIndex;
    var id_list = document.getElementById("destinatario").options;
    document.getElementById("submit").disabled = true;
    var id_usr = id_list[id_obj].id;
    //console.log(id_usr);
    //console.log("Nombre: ");

    var n1 = datos.get('destinatario');
    n1 = n1.split("(");
    nomb = n1[0];
    n2 = n1[1];
    n2 = n2.split(")");
    direccion = n2[0]

    datos.append("cliente", nomb);
    datos.append("direccion", direccion);
    datos.append("id_get", id_usr);

    //console.log(nomb);
    //console.log("Direccion:");
    //console.log(direccion);

    //document.getElementById('submit').disabled = true;
    //document.getElementById('btnup').disabled = true;

    //console.log(datos.get('destinatario'));

    //var d = document.getElementById('cargando');
    //d.style.visibility = "visible";

    fetch('../expedientes/distribuye.php',{
        method: 'POST',
        body: datos
    })
    .then( res => res.json())
    .then( data => {
        //console.log(data)
        /*if (data === 'repetido')
        {
            formulario.reset();
            respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Es posible que los datos de este usuario ya existan... </div>`;
        }*/
        if (data === 'error')
        {
            formulario.reset();
            //d.style.visibility = "hidden";
            document.getElementById("submit").disabled = false;
            respuesta.innerHTML = `<div class="alert alert-warning" role="alert">Es posible que los datos de este usuario ya existan en los registros... </div>`;
        }

        else
        {
            formulario.reset();
            console.log("RESPUESTA");
            console.log(data);
            document.getElementById("submit").disabled = false;
            //d.style.visibility = "hidden";
            respuesta.innerHTML = `<div class="alert alert-warning" role="alert">MENSAJE ENVIADO CORRECTAMENTE</div>`; // ${data}

        }
    })

})
