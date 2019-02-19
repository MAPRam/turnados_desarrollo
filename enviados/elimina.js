var boton = document.getElementById('eliminar');

boton.addEventListener('click', function(e){
    e.preventDefault();

    var id_mensaje = document.getElementById('efirstname').value;

    var datos = new FormData();

    datos.append("id_mensaje", id_mensaje);

    fetch('../expedientes/elimina.php',{
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
          alert("Se ha eliminado el mensaje");
          location.href="";

          //console.log(data);
            //d.style.visibility = "hidden";
            //respuesta.innerHTML = `<div class="alert alert-warning" role="alert">${data}</div>`; // ${data}

        }
    })

})
