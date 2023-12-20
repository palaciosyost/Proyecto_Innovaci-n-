var anchoPantalla = window.innerWidth;

if (anchoPantalla < 870) {
  let confirmacion = confirm(
    "Acceso denegado, tamaño de pantalla no recomendada"
  );
  if (confirmacion) {
    window.location.href = "https://google.com";
  } else {
    window.location.href = "https://google.com";
  }
}
