let teclasNumero = document.querySelectorAll(".numero");
let teclasOperacion = document.querySelectorAll(".operacion");
let teclaIgual = document.querySelector(".igual");
let teclaBorrar = document.querySelector(".borrar");

let principal = document.querySelector(".principal");
let auxiliar = document.querySelector(".auxiliar");

let operacion = "";

function escribir(elemento) {
  const numero = elemento.innerHTML;
  principal.innerHTML += numero;
}

function operar(elemento) {
  const a = principal.innerHTML;
  auxiliar.innerHTML = a;
  principal.innerHTML = "";
  operacion = elemento.innerHTML;
}

function calcular() {
  const a = parseInt(auxiliar.innerHTML);
  const b = parseInt(principal.innerHTML);
  auxiliar.innerHTML = "";
  switch (operacion) {
    case "+":
      principal.innerHTML = a + b;
      break;
    case "-":
      principal.innerHTML = a - b;
      break;
    case "*":
      principal.innerHTML = a * b;
      break;
    case "/":
      principal.innerHTML = a / b;
      break;
  }
  operacion = "";
}

function borrar() {
  const numero = principal.innerHTML;
  principal.innerHTML = numero.slice(0, -1);
}
teclasNumero.forEach(function (teclaNumero) {
  teclaNumero.addEventListener("click", function (event) {
    escribir(event.target);
  });
});

teclasOperacion.forEach(function (teclaOperacion) {
  teclaOperacion.addEventListener("click", function (event) {
    operar(event.target);
  });
});

teclaIgual.addEventListener("click", function () {
  calcular();
});

teclaBorrar.addEventListener("click", function () {
  borrar();
});
