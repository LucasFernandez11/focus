 // Función para mostrar el mensaje emergente
 function mostrarMensaje(mensaje, esExitoso) {
    var mensajeTexto = document.getElementById("mensajeTexto");
    var mensajePopup = document.getElementById("mensajePopup");

    mensajeTexto.innerText = mensaje;

    if (esExitoso) {
        mensajePopup.style.backgroundColor = "green";
    } else {
        mensajePopup.style.backgroundColor = "red";
    }

    mensajePopup.style.display = "block";
}

// Función para cerrar el mensaje emergente
function cerrarMensaje() {
    var mensajePopup = document.getElementById("mensajePopup");
    mensajePopup.style.display = "none";
}

// Agregar evento al botón "Cerrar"
var cerrarPopup = document.getElementById("cerrarPopup");
cerrarPopup.addEventListener("click", cerrarMensaje);

// Manejar la respuesta del formulario
var form = document.querySelector(".form");
form.addEventListener("submit", function (event) {
    event.preventDefault();

    fetch('tu_archivo_php.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.json())
    .then(data => {
        mostrarMensaje(data.message, data.success);
    })
    .catch(error => {
        mostrarMensaje('Error al procesar la solicitud.', false);
    });
});