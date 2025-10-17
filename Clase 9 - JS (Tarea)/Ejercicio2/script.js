function agregar() {
  let productoV = producto.value;
  let incluyeDe = productoV.split(" ").includes("de");
  let li = incluyeDe
    ? `<li style="background-color: yellow;">${productoV}</li>`
    : `<li>${productoV}</li>`;
  lista.innerHTML += li;
  producto.value = "";
  producto.focus();
}
