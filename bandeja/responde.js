var formulario = document.getElementById('formulario');
var boton = document.getElementById('botonload');

formulario.addEventListener('submit', function(e){
    e.preventDefault();

    //var id_mensaje = document.getElementById('efirstname').value;

    //var id_obj = document.getElementById("destinatario").selectedIndex;
    //var id_list = document.getElementById("destinatario").options;

    //var id_usr = id_list[id_obj].id;

    boton.innerHTML = '<button class="btn btn-info" type="button" disabled><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="sr-only">Enviando...</span></button>';

    var datos = new FormData(formulario);

    //datos.append("id_mensaje", id_mensaje);
    //datos.append("id_destino", id_usr);

    fetch('../expedientes/responder.php',{
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
          document.getElementById('close2').click();
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-danger" role="alert">Ha ocurrido un error, intenta mas tarde... </div>`;
        }

        else
        {
          //$('#edit').modal('show');
          console.log(data);
          document.getElementById('close2').click();
          alert("SE HA CONTESTADO CON ÉXITO");
          boton.innerHTML = '<button type="submit" class="btn btn-info" id="responde">Enviar respuesta</button>';
          location.href='';

          //console.log(data);
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-warning" role="alert">${data}</div>`; // ${data}

        }
    })

})
