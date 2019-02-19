var formulario = document.getElementById('formulario');
var respuesta = document.getElementById('respuesta');


formulario.addEventListener('submit', function(e){
    e.preventDefault();

    var datos = new FormData(formulario)

    //var id_obj = document.getElementById("destinatario").selectedIndex;
    //var id_list = document.getElementById("destinatario").options;
    //var id_usr = id_list[id_obj].id;
    //console.log(id_usr);
    //console.log("Nombre: ");

    //console.log(nomb);
    //console.log("Direccion:");
    //console.log(direccion);

    document.getElementById('submit').disabled = false;
    //document.getElementById('btnup').disabled = true;

    //console.log(datos.get('destinatario'));

    //var d = document.getElementById('cargando');
    //d.style.visibility = "visible";

    fetch('directores.php',{
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
            document.getElementById('submit').disabled = false;
            //d.style.visibility = "hidden";
            respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Ha ocurrido un error, intenta mas tarde... </div>`;
        }

        else
        {
            formulario.reset();
            console.log("RESPUESTA");
            console.log(data);
            document.getElementById('submit').disabled = false;
            //d.style.visibility = "hidden";
            respuesta.innerHTML = `<div class="alert alert-warning" role="alert">Usuario creado correctamente, ingresa con tu correo y tu contraseña desde la página de inicio</div>`; // ${data}

        }
    })

})
