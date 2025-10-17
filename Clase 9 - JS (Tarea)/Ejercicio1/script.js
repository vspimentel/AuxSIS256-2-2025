class Estudiante {
  constructor(nombre, edad, materia, nota) {
    this.nombre = nombre;
    this.edad = edad;
    this.calificacion = new Calificacion(materia, nota);
  }
}

class Calificacion {
  constructor(materia, nota) {
    this.materia = materia;
    this.nota = nota;
  }
}

let estudiantes = [
  new Estudiante("Juan Perez", 20, "Matemáticas", 85),
  new Estudiante("Luis Rodríguez", 19, "Ciencias", 78),
  new Estudiante("Ana Torres", 21, "Matemáticas", 88),
];

mostrarEstudiantes();

function agregarEstudiante() {
  const nombre = prompt("Ingrese el nombre del estudiante:");
  const edad = parseInt(prompt("Ingrese la edad del estudiante:"));
  const materia = prompt("Ingrese la materia:");
  const nota = parseInt(prompt("Ingrese la nota:"));
  const estudiante = new Estudiante(nombre, edad, materia, nota);
  if (isNaN(edad) || isNaN(nota)) {
    alert("Edad y nota deben ser números válidos.");
    return;
  }

  if (nota < 0 || nota > 100) {
    alert("La nota debe estar entre 0 y 100.");
    return;
  }

  if (edad < 0 || edad > 120) {
    alert("La edad debe estar entre 0 y 120.");
    return;
  }

  estudiantes.push(estudiante);
  mostrarEstudiantes();
}

btnAgregar.addEventListener("click", agregarEstudiante);

function mostrarEstudiantes(mejorEstudiante = null) {
  let tabla = `<table border='1'>
        <tr>
          <th>Nro</th>
          <th>Apellidos y Nombres</th>
          <th>Edad</th>
          <th>Materia</th>
          <th>Nota</th>
        </tr>`;
  for (let i = 0; i < estudiantes.length; i++) {
    if (
      mejorEstudiante !== null &&
      mejorEstudiante.calificacion.nota === estudiantes[i].calificacion.nota
    ) {
      tabla += `<tr style="background-color: red;">
            <td>${i + 1}</td>
            <td>${estudiantes[i].nombre}</td>
            <td>${estudiantes[i].edad}</td>
            <td>${estudiantes[i].calificacion.materia}</td>
            <td>${estudiantes[i].calificacion.nota}</td>
        </tr>`;
    } else {
      tabla += `<tr>
            <td>${i + 1}</td>
            <td>${estudiantes[i].nombre}</td>
            <td>${estudiantes[i].edad}</td>
            <td>${estudiantes[i].calificacion.materia}</td>
            <td>${estudiantes[i].calificacion.nota}</td>
        </tr>`;
    }
  }
  tabla += "</table>";

  document.getElementById("tabla").innerHTML = tabla;
}

function encontrarMejorEstudiante() {
  if (estudiantes.length === 0) {
    alert("No hay estudiantes registrados.");
    return;
  }

  //   let notas = estudiantes.map((estudiante) => estudiante.calificacion.nota);
  //   let mejor = Math.max(...notas);
  //   let index = notas.indexOf(mejor);

  let mejorEstudiante = estudiantes[0];
  for (let i = 1; i < estudiantes.length; i++) {
    if (estudiantes[i].calificacion.nota > mejorEstudiante.calificacion.nota) {
      mejorEstudiante = estudiantes[i];
    }
  }

  mostrarEstudiantes(mejorEstudiante);
}

btnMejorEstudiante.onclick = encontrarMejorEstudiante;
