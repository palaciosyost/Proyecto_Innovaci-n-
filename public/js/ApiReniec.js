function ApiResul() {
  let $form = document.querySelector("#form"),
    $dni = document.querySelector('input[name="dni"]'),
    $nombre = document.querySelector('input[name="nombre"]'),
    $apellido = document.querySelector('input[name="apellido"]'),
    $token = document.querySelector('input[name="token"]').value;

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
        $apellido.value = response.apellidoPaterno;
      })
      .catch((error) => {
        console.error("Error:", error.message);
        $nombre.value = "";
        $apellido.value = "";
      });
  });
}

ApiResul();
