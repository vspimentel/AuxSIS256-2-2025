let tablaMedicos = document.getElementById("tabla-medicos");

function cargarMedicos() {
  fetch("listar-medicos.php")
    .then((response) => response.text())
    .then((data) => {
      let body = tablaMedicos.querySelector("tbody");
      body.innerHTML = data;
    });
}

cargarMedicos();
