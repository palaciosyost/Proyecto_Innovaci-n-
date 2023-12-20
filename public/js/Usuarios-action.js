document.addEventListener("DOMContentLoaded", (e) => {
  let $inputNombre = document.querySelector('input[name="nombre-editar"]'),
    $inputDNI = document.querySelector('input[name="dni-editar"]'),
    $inputApellido = document.querySelector('input[name="apellido-editar"]'),
    $selectRol = document.querySelector('select[name="rol-editar"]'),
    $inputId = document.querySelector('input[name="id"]');
  // ingreso los datos del MYSQL al formulario con js y datasetS
  document.addEventListener("click", (e) => {
    // validacion de btn de editar usuarios
    if (e.target.matches(".card__btn-solid")) {
      console.log(e.target.dataset.nombre);
      $inputNombre.value = e.target.dataset.nombre;
      $inputDNI.value = e.target.dataset.dni;
      $inputId.value = e.target.dataset.id;
      $inputApellido.value = e.target.dataset.apellido;
      if (e.target.dataset.rol == "Administrador") {
        $selectRol.value = 1;
      } else {
        $selectRol.value = 2;
      }
    }
    // VALIDACION DE BTN DE GUARDAR MODEL DE EDITAR USUARIO
    let $form = document.querySelector("#form2"),
      $dni = document.querySelector('input[name="dni-editar"]'),
      $nombre = document.querySelector('input[name="nombre-editar"]'),
      $apellido = document.querySelector('input[name="apellido-editar"]'),
      $rol = document.querySelector('select[name="rol-editar"]'),
      $contraseña = document.querySelector('input[name="contraseña-editar"]');

    // EDITAR USUARIO AJAX
    function EditarDatos() {
      if ($inputId.value != "") {
        $form.addEventListener("submit", (e) => {
          e.preventDefault();

          let data = {
            id: $inputId.value,
            apellido: $apellido.value,
            nombres: $nombre.value,
            dni: $dni.value,
            contraseña: $contraseña.value, // Asegúrate de tener la variable $contraseña definida
            rol: $rol.value,
          };
          fetch("../../controlador/editar-usuario-controlador.php", {
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
              console.log(resultado);
            });
        });
      }
    }
    EditarDatos();
    // INSERCIÓN DE DATOS FORMULARIO DE CONTACTOS
  });

  // FUNCION PARA ELIMINAR USUARIO

  document.addEventListener("click", (e) => {
    if (e.target.matches(".card-btn-eliminar")) {
      let $id = e.target.dataset.id;
      let data = {
        id: $id,
      };
      fetch("../../controlador/eliminar-usuario-controlador.php", {
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
          console.log(resultado);
          if (resultado == 1) {
            window.location.reload();
          }
        });
    }
  });
});
