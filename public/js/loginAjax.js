const d = document;

let $alert = d.querySelector(".alertas"),
  $inputPassword = d.getElementById("password"),
  $form = d.getElementById("form-login");
$form.addEventListener("submit", (e) => {
  e.preventDefault();
  let data = new FormData($form);
  fetch("controlador/login-controlador.php", {
    method: "POST",
    body: data,
  })
    .then((respuesta) => {
      return respuesta.ok ? respuesta.text() : Promise.reject();
    })
    .then((datos) => {
      if (datos != 1 && datos != 2) {
        $alert.innerHTML = datos;
        setTimeout(() => {
          $alert.textContent = "";
        }, 2500);
        $inputPassword.value = "";
      } else {
        switch (datos) {
          case "1":
            location.href = "public/administrador/";
            break;
          case "2":
            location.href = "public/sistemas/";
            break;
        }
      }
    });
});
