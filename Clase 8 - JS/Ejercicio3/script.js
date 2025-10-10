let cantidadInput = document.getElementById("cantidad");
let imagen = document.getElementById("imagen");

function agrandar() {
  const cantidad = parseInt(cantidadInput.value);
  const width = parseInt(imagen.style.width);
  const newWidth = cantidad + width;
  imagen.style.width = newWidth + "px";
}

function reducir() {
  const cantidad = parseInt(cantidadInput.value);
  const width = parseInt(imagen.style.width);
  const newWidth = width - cantidad;
  imagen.style.width = newWidth + "px";
}

btnAgrandar.addEventListener("click", agrandar);
btnReducir.onclick = reducir;
