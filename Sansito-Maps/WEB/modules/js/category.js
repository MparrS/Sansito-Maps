document.addEventListener("DOMContentLoaded", function () {
  const categoriasBtn = document.getElementById("categoriasBtn");
  const barraLateral = document.getElementById("barraLateral");
  const cerrarBtn = document.getElementById("cerrarBtn");

  categoriasBtn.addEventListener("click", function () {
    barraLateral.classList.add("activo");
  });

  cerrarBtn.addEventListener("click", function () {
    barraLateral.classList.remove("activo");
  });
});


