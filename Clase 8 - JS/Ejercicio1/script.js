function fechaLiteral(fecha) {
  const meses = [
    "",
    "enero",
    "febrero",
    "marzo",
    "abril",
    "mayo",
    "junio",
    "julio",
    "agosto",
    "septiembre",
    "octubre",
    "noviembre",
    "diciembre",
  ];

  let [dia, mes, anio] = fecha.split("/");

  dia = parseInt(dia);
  mes = parseInt(mes);
  anio = parseInt(anio);

  return `${numeroLiteral(dia)} de ${meses[mes]} de ${numeroLiteral(anio)}`;
}

function numeroLiteral(num) {
  const unidades = [
    "cero",
    "uno",
    "dos",
    "tres",
    "cuatro",
    "cinco",
    "seis",
    "siete",
    "ocho",
    "nueve",
  ];

  const otros = [
    "diez",
    "once",
    "doce",
    "trece",
    "catorce",
    "quince",
    "dieciséis",
    "diecisiete",
    "dieciocho",
    "diecinueve",
  ];

  const decenas = [
    "",
    "",
    "veinte",
    "treinta",
    "cuarenta",
    "cincuenta",
    "sesenta",
    "setenta",
    "ochenta",
    "noventa",
  ];
  const centenas = [
    "",
    "ciento",
    "doscientos",
    "trescientos",
    "cuatrocientos",
    "quinientos",
    "seiscientos",
    "setecientos",
    "ochocientos",
    "novecientos",
  ];

  if (num < 10) return unidades[num];
  if (num < 20) return otros[num - 10];
  if (num < 100) {
    if (num % 10 === 0) return decenas[parseInt(num / 10)];
    if (num < 30) return `veinti${unidades[num % 10]}`;
    return `${decenas[parseInt(num / 10)]} y ${unidades[num % 10]}`;
  }
  if (num < 1000) {
    if (num === 100) return "cien";
    if (num % 100 === 0) return centenas[parseInt(num / 100)];
    return `${centenas[parseInt(num / 100)]} ${numeroLiteral(num % 100)}`;
  }
  if (num < 10000) {
    const miles =
      parseInt(num / 1000) == 1
        ? "mil"
        : `${unidades[parseInt(num / 1000)]} mil`;
    if (num % 1000 === 0) return miles;
    return `${miles} ${numeroLiteral(num % 1000)}`;
  }
}

const fecha = prompt("Ingrese una fecha en formato dd/mm/aaaa:");
const fechaEnLiteral = fechaLiteral(fecha);
resultado.innerText = fechaEnLiteral;
