//var form = document.getElementById("formContacto");
var form = document.querySelector("#formContacto"); // selecciona el primero que cumple con el selector
// si lo enocntro retorna un objeto 
var input = document.querySelectorAll("input"); // selecciona a todos los que cumple con el selector
// si encuentra retorna un arreglo de objeto

form.addEventListener('submit', validar);

function validar(event) {
    var resultado = true;

    var txtDestino = document.getElementById("lugar");
    var txtfechaE = document.getElementById("fechaE");
    var txtfechaS = document.getElementById("fechaS");

    var txtNombres = document.getElementById("nombres");//document.querySelector("#nombres"); // reotrna el primer input que tenga name ='nombres'
    var txtApellidos = document.getElementById("apellidos");
    var selectPais = document.getElementById("numeroC");
    var txtTelefono = document.getElementById("telefono");
    var txtemail = document.getElementById("correo");

    var txtTitular = document.getElementById("titular");
    var txtTarjeta = document.getElementById("tarjeta");



    // expresiones regulares (RegEx)
    var letra = /^[a-z ,.'-]+$/i;
    var correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var telefonoreg = /^[0-9]{10}$/g;
    var tarjetareg = /^[0-9]{13^14^15^16^17^18}$/g;

     limpiarMensajes();

    //validacion para destino
    if (txtDestino.value === '') {
        resultado = false;
        mensaje("Destino es requerido", txtDestino);
    } else if (!letra.test(txtDestino.value)) {
        resultado = false;
        mensaje("El destino solo debe contener letras", txtDestino);
    } else if (txtDestino.value.length > 20) {
        resultado = false;
        mensaje("El destino debe contener maximo 20 caracteres", txtDestino);
    }


    // validacion de fecha de entrada
    var dato = txtfechaE.value;
    var fechaE = new Date(dato);// convertir a fecha
    var anioE = fechaE.getFullYear();
    
    var fechaActual = new Date();// fecha actual
    var anioA = fechaActual.getFullYear();
    if (fechaE < fechaActual) {
        resultado = false;
        mensaje("La fecha de entrada no puede ser anterior a la fecha actual", txtfechaE);
    } else if (anioE < anioA) {
        resultado = false;
        mensaje("Debe registrase en al actual año en curso", txtfechaE);
    }

    if (!resultado) {
        event.preventDefault();  // detener el evento  //stop form from submitting
    }


    // validacion de fecha de salida
    var dato = txtfechaS.value;
    var fechaS = new Date(dato);// convertir a fecha
    var anioS = fechaS.getFullYear();
        
    var fechaActual = new Date();// fecha actual
    var anioA = fechaActual.getFullYear();
    if (fechaS < fechaActual) {
        resultado = false;
        mensaje("La fecha de salida no puede ser anterior a la fecha actual", txtfechaS);
    } else if (anioE < anioA) {
        resultado = false;
        mensaje("Debe registrase en al actual año en curso", txtfechaS);
    }
    
    if (!resultado) {
        event.preventDefault();  // detener el evento  //stop form from submitting
    }


    //validacion para nombres
    if (txtNombres.value === '') {
        resultado = false;
        mensaje("Nombre es requerido", txtNombres);
    } else if (!letra.test(txtNombres.value)) {
        resultado = false;
        mensaje("Nombre solo debe contener letras", txtNombres);
    } else if (txtNombres.value.length > 20) {
        resultado = false;
        mensaje("Nombre maximo 20 caracteres", txtNombres);
    }


    // lo mismo para apellidos
    if (txtApellidos.value === '') {
        resultado = false;
        mensaje("Apellido es requerido", txtApellidos);
    } else if (!letra.test(txtApellidos.value)) {
        resultado = false;
        mensaje("Apellido solo debe contener letras", txtApellidos);
    } else if (txtApellidos.value.length > 20) {
        resultado = false;
        mensaje("Apellido maximo 20 caracteres", txtApellidos);
    }


    //validacion select
    if (selectPais.value === null || selectPais.value === '0') {
        resultado = false;
        mensaje("Debe seleccionar el pais al que corresponda el numero de telefono", selectPais);
    }
    
    //validacion telefono
    if (txtTelefono.value === "") {
        resultado = false;
        mensaje("Telefono es requerido", txtTelefono);
    } else if (!telefonoreg.test(txtTelefono.value)) {
        resultado = false;
        mensaje("Telefono debe ser de 10 digitos", txtTelefono);
    }


    //validacion email
    if (txtemail.value === "") {
        resultado = false;
        mensaje("Email es requerido", txtemail);
    } else if (!correo.test(txtemail.value)) {
        resultado = false;
        mensaje("Email no es correcto", txtemail);
    }


    //validacion titular
    if (txtTitular.value === '') {
        resultado = false;
        mensaje("El titular de la tarjeta es requerido", txtTitular);
    } else if (!letra.test(txtTitular.value)) {
        resultado = false;
        mensaje("Titular solo debe contener letras", txtTitular);
    } else if (txtTitular.value.length > 20) {
        resultado = false;
        mensaje("Titular maximo 20 caracteres", txtNombres);
    }


    //validacion tarjeta
    if (txtTarjeta.value === "") {
        resultado = false;
        mensaje("Numero de tarjeta es requerido", txtTarjeta);
    } else if (!tarjetareg.test(txtTarjeta.value)) {
        resultado = false;
        mensaje("Ingrese un numero de tarjeta valido", txtTarjeta);
    }



}

function mensaje(cadenaMensaje, elemento) {
    elemento.focus();
    var nodoPadre = elemento.parentNode;
    var nodoMensaje = document.createElement("span");
    nodoMensaje.textContent = cadenaMensaje;
    nodoMensaje.setAttribute("class", "mensajeError");
    nodoPadre.appendChild(nodoMensaje);

}

function limpiarMensajes() {
    var mensajes = document.querySelectorAll(".mensajeError");
    for (let i = 0; i < mensajes.length; i++) {
        mensajes[i].remove();// remueve o elimina un elemento de mi doc html
    }
}