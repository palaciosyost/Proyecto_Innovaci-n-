let $form = document.querySelector("#form"),
  $dni = document.querySelector('input[name="dni"]'),
  $nombre = document.querySelector('input[name="nombre"]'),
  $apellido = document.querySelector('input[name="apellido"]'),
  $contraseña = document.querySelector('input[name="contraseña"]'), // Eliminé el signo "+" aquí
  $token = document.querySelector('input[name="token"]').value;

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
          $nombre.value = "";
          $apellido.value = "";
        } else {
          throw new Error("Error en la solicitud");
        }
      })
      .then((response) => {
        console.log(response);
        $nombre.value = response.nombres;
        $apellido.value = response.apellidoPaterno + ' ' +response.apellidoMaterno;
      })
      .catch((error) => {
        console.error("Error:", error.message);
        $nombre.value = "";
        $apellido.value = "";
      });
  });
}

ApiResul();

function AjaxForm() {
  let $form = document.querySelector("#form");

  $form.addEventListener("submit", (e) => {
    e.preventDefault();

    let data = new FormData($form);

    console.log(data.get("dni"));
    console.log($nombre.value);
    console.log($apellido.value);
    console.log($contraseña.value)
    fetch('../../controlador/set-usuarios-controlador.php', {
      method : 'POST',
      headers : { 'append': 'Content-Type', },
      body : {
        nombres_P : $nombre.value + ' ' + $apellido.value,
        dni : $dni.value,
        contraseña : $contraseña.value,
      }
    }).then(resul => {
      
    }).then(resultado => {

    });
  });
}

AjaxForm();
