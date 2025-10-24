let principal = document.getElementById("principal");
let menu = document.getElementById("menu");
let mensaje = document.getElementById("mensaje");
let overlay = document.querySelector(".overlay");
let imagenModal = document.getElementById("imagen");
let btnCerrar = document.getElementById("btnCerrar");

function cargarBotones() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `botones.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      menu.innerHTML = ajax.responseText;
      asignarEventos();
    }
  };
  ajax.send();
}

cargarBotones();

function cargarLibros() {
  fetch(`galeria.php`)
    .then((response) => response.text())
    .then((data) => {
      principal.innerHTML = data;
      asignarEventosModal();
    });
}

function asignarEventos() {
  let btnPregunta1 = document.getElementById("btnPregunta1");
  btnPregunta1.addEventListener("click", function () {
    principal.innerHTML = "";
  });
  let btnPregunta2 = document.getElementById("btnPregunta2");
  btnPregunta2.addEventListener("click", function () {
    cargarLibros();
  });
  let btnPregunta3 = document.getElementById("btnPregunta3");
  btnPregunta3.addEventListener("click", function () {
    cargarFormulario();
  });
}

function mostrarModal(src) {
  imagenModal.src = src;
  overlay.style.display = "flex";
}

function asignarEventosModal() {
  let libros = document.querySelectorAll(".libro");
  libros.forEach((libro) => {
    libro.addEventListener("click", function (e) {
      let src = e.target.src;
      if (!src) return;
      mostrarModal(src);
    });
  });
}

function cerrarModal() {
  overlay.style.display = "none";
}

btnCerrar.addEventListener("click", cerrarModal);

function cargarFormulario() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `formulario.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      principal.innerHTML = ajax.responseText;
      cargarEditoriales();
      cargarCarreras();
    }
  };
  ajax.send();
}

function cargarEditoriales() {
  let select = document.querySelector("[name='editorial']");
  fetch(`editoriales.php`)
    .then((response) => response.text())
    .then((data) => {
      select.innerHTML = data;
    });
}

async function cargarCarreras() {
  let select = document.querySelector("[name='carrera']");
  const response = await fetch(`carreras.php`);
  const data = await response.text();
  select.innerHTML = data;
}

function guardarLibro() {
  let form = document.getElementById("form_registrar");
  let data = new FormData(form);
  var ajax = new XMLHttpRequest();
  ajax.open("POST", `insertar.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      const response = ajax.responseText;
      if (response.trim() === "exito") cargarLibros();
    }
  };
  ajax.send(data);
}

// const nombre = prompt("Ingrese su nombre:");
// mensaje.innerHTML = `Hola, ${nombre}.`;
