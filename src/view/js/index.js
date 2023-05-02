const container = document.querySelector(".container");

async function api() {
  const url = "http://localhost:8080/pruebaTecnica/src/model/apiVentas.php";
  const peticion = await fetch(url);
  const respuesta = await peticion.text();
  container.innerHTML = respuesta;
}

api();
