
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

        // Ocultar el mensaje después de 5 segundos
        setTimeout(function () {
            mensajePopup.style.display = "none";
        }, 5000); // 5000 milisegundos = 5 segundos
    }

    // Manejar la respuesta del formulario
    var form = document.querySelector(".form");
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        fetch('../php/formulario.php', {
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

