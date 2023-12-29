let archivoForm = document.getElementById("archivoForm");
let vistaPrevia = document.getElementById("vistaPrevia");

document.addEventListener("DOMContentLoaded", function () {
  archivoForm.addEventListener("change", function (event) {
    var archivoInput = event.target;
    var archivo = archivoInput.files[0];
    if (window.location.href)
      archivoForm.addEventListener("submit", (e) => {
        e.preventDefault();
        let formData = new FormData();
        formData.append("archivo", archivo); // Obtener el archivo del campo de entrada
        const id = new URL(location.href).searchParams.get("keycarpeta");
        formData.append("id_carpeta", id);
        fetch(
          "http://localhost/fdc/Proyecto_Innovaci-n-/controlador/set-archivo-controlador.php",
          {
            method: "POST",
            body: formData,
          }
        )
          .then((response) => response.text())
          .then((data) => {
            // Manejar la respuesta del servidor
            vistaPrevia.innerHTML = data;
          })
          .catch((error) => {
            // Manejar errores
            console.error(error);
          });
      });
    if (archivo && archivo.type.startsWith("image/")) {
      const lector = new FileReader();

      lector.onload = function (e) {
        const imagenPrevia = document.createElement("img");
        imagenPrevia.src = e.target.result;
        vistaPrevia.innerHTML = "";
        vistaPrevia.appendChild(imagenPrevia);
      };

      lector.readAsDataURL(archivo);
    } else {
      vistaPrevia.innerHTML =
        "Vista previa no disponible para este tipo de archivo.";
    }
  });
});

// Resto de la lógica para enviar el archivo...
