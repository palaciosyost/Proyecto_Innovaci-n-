let $form = document.querySelector("#form"),
  $dni = document.querySelector('input[name="dni"]'),
  $nombre = document.querySelector('input[name="nombre"]'),
  $apellido = document.querySelector('input[name="apellido"]'),
  $rol = document.querySelector('select[name="rol"]'),
  $contraseña = document.querySelector('input[name="contraseña"]'),
  $token = document.querySelector('input[name="token"]').value;

// DATOS CON API RENIEC FORM CONTACTO
function ApiResul() {
  $dni.addEventListener("keyup", (e) => {
    fetch(
      `https://dniruc.apisperu.com/api/v1/dni/${e.target.value}?token=${$token}`
    )
      .then((response) => {
        if (response.status === 200) {
          return response.json();
        } else if (response.status === 404) {
          throw new Error("DNI no encontrado");
        } else {
          throw new Error("Error en la solicitud");
        }
      })
      .then((response) => {
        $nombre.value = response.nombres;
        $apellido.value = response.apellidoPaterno;
      })
      .catch((error) => {
        console.error("Error:", error.message);
        $nombre.value = "";
        $apellido.value = "";
      });
  });
}

// EJECUCION  "FUNCION USO DE API RENIEC DATOS DNI"
ApiResul();

// INSERCIÓN DE DATOS FORMULARIO DE CONTACTOS
function AjaxForm() {
  $form.addEventListener("submit", (e) => {
    e.preventDefault();

    let data = {
      nombres_P: $nombre.value,
      apellido: $apellido.value,
      dni: $dni.value,
      contraseña: $contraseña.value,
      rol: $rol.value,
    };
    fetch("../../controlador/set-usuarios-controlador.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((resul) => {
        return resul.text();
      })
      .then((resultado) => {
        document.querySelector(".mensaje-resul").innerHTML = resultado;
      });
  });
}

AjaxForm();
