window.addEventListener("load", function () {
  let loader = document.querySelector(".fondo-loader");
  loader.classList.add("remove-loading");
});

let refrescar = () => {
  window.location.reload();
};
