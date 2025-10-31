let pagina = document.getElementById("pagina");

function cargarLogin() {
  fetch("login.html")
    .then((response) => response.text())
    .then((data) => {
      pagina.innerHTML = data;
    });
}

function cargarBandejaUsuario() {
  fetch("bandeja-usuario.html")
    .then((response) => response.text())
    .then((data) => {
      pagina.innerHTML = data;
    });
}

function cargarBandejaAdmin() {
  fetch("bandeja-admin.html")
    .then((response) => response.text())
    .then((data) => {
      pagina.innerHTML = data;
      cargarUsuarios();
    });
}

function estaLogueado() {
  fetch("sesion.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.logged) {
        nivel = data.nivel;
        if (nivel === 1) {
          cargarBandejaAdmin();
        } else {
          cargarBandejaUsuario();
        }
      } else {
        cargarLogin();
      }
    });
}

estaLogueado();

function autenticar() {
  let form = document.getElementById("login-form");
  let data = new FormData(form);
  fetch("autenticar.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        nivel = data.nivel;
        if (nivel === 1) {
          cargarBandejaAdmin();
        } else {
          cargarBandejaUsuario();
        }
      } else alert(data.message);
    });
}

function salir() {
  fetch("salir.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) cargarLogin();
    });
}

function cargarUsuarios() {
  fetch("usuarios.php")
    .then((response) => response.text())
    .then((data) => {
      let tabla = document.getElementById("tabla");
      let contenidoTabla = tabla.querySelector("tbody");
      contenidoTabla.innerHTML = data;
    });
}

function cambiarEstado(estado, id) {
  let data = new FormData();
  data.append("estado", estado);
  data.append("id", id);
  fetch("cambiar-estado.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        cargarUsuarios();
      } else {
        alert("Error al cambiar el estado del usuario.");
      }
    });
}

function mostrarFormularioAviso() {
  let overlay = document.getElementById("overlay");
  fetch("form-aviso.html")
    .then((response) => response.text())
    .then((data) => {
      overlay.innerHTML = data;
      overlay.style.display = "block";
    });
}

function cerrarModal() {
  let overlay = document.getElementById("overlay");
  overlay.style.display = "none";
  overlay.innerHTML = "";
}

function enviarAviso() {
  let form = document.getElementById("form-aviso");
  let data = new FormData(form);
  fetch("enviar-aviso.php", {
    method: "POST",
    body: data,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        cerrarModal();
        cargarBandejaSalida();
      } else {
        alert(data.message);
      }
    });
}

function cargarBandejaSalida() {
  fetch("correos-salida.php")
    .then((response) => response.json())
    .then((data) => {
      let tabla = document.getElementById("tabla");
      let contenidoTabla = tabla.querySelector("tbody");
      let mensajes = "";
      data.forEach((correo) => {
        mensajes += `<tr>
            <td>${correo.destino}</td>
            <td>${correo.asunto}</td>
            <td>${correo.estado ? "Enviado" : "No Enviado"}</td>
            <td>
            <div class="row" style="justify-content: center">
                <div
                  class="button"
                  style="
                    border: 1px solid blue;
                    background-color: rgb(120, 120, 237);
                    color: white;
                    width: 100px;
                  "
                  onclick="cargarCorreo(${correo.id})"
                >
                  Ver
                </div>
                <div
                  class="button"
                  style="
                    border: 1px solid blue;
                    background-color: rgb(120, 120, 237);
                    color: white;
                    width: 100px;
                  "
                >
                  Borrar
                </div>
              </div>
            </td>
        </tr>`;
        contenidoTabla.innerHTML = mensajes;
      });
    });
}

function cargarCorreo(id) {
  let overlay = document.getElementById("overlay");
  fetch("ver-mensaje-salida.php?id=" + id)
    .then((response) => response.text())
    .then((data) => {
      overlay.innerHTML = data;
      overlay.style.display = "block";
    });
}
