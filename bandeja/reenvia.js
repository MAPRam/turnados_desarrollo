var boton = document.getElementById('reenviar');

boton.addEventListener('click', function(e){
    e.preventDefault();

    var id_mensaje = document.getElementById('efirstname').value;

    var id_obj = document.getElementById("destinatario").selectedIndex;
    var id_list = document.getElementById("destinatario").options;

    var id_usr = id_list[id_obj].id;


    var datos = new FormData();

    datos.append("id_mensaje", id_mensaje);
    datos.append("id_destino", id_usr);

    fetch('reenviar.php',{
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
          alert("ERROR");
          document.getElementById('close').click();
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Ha ocurrido un error, intenta mas tarde... </div>`;
        }

        else
        {
          //$('#edit').modal('show');
          console.log(data);
          document.getElementById('close').click();
          alert("SE REENVIÓ CON ÉXITO");

          //console.log(data);
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-warning" role="alert">${data}</div>`; // ${data}

        }
    })

})
