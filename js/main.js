"use strict";

let app = new Vue({
  el: "#app-coments",
  data: {
    footer: "Comentarios renderizados con CSR",
    comentarios: [],
    esadmin: "",
    promedio: 0,
  },
  methods: {
    eliminar: function (id) {
      eliminarcomentario(id);
    },
  },
});

let idprod = document.querySelector("#idprod").value;
let esadmin = document.querySelector("#user").value;
if (esadmin == "admin" || esadmin == "registrado") {
  let btn = document.getElementById("btnagregar");
  btn.onclick = function () {
    agregarcomentario(idprod);
  };
}

function ordenar() {
  let orden = [];
  let sort = document.querySelector("#sort").value;
  let order = document.querySelector("#order").value;
  orden["sort"] = sort;
  orden["order"] = order;

  return orden;
}

let btnorden = document.querySelector("#btnorden");
btnorden.onclick = function () {
  cargarcomentarios(idprod, ordenar());
};

// cargarcomentarios(idprod, null);

// cargarusuario(esadmin);

//carga inicial de comentarios
function cargarcomentarios(idprod, orden) {
  let suma = 0;
  let cont = 0;
  let url;
  if (orden) {
    let sort = orden["sort"];
    let order = orden["order"];

    url =
      "api/productos/" +
      idprod +
      "/comentarios?sort=" +
      sort +
      "&" +
      "order=" +
      order;
  } else {
    url = "api/productos/" + idprod + "/comentarios";
  }

  fetch(url)
    .then((response) => response.json())
    .then((comentarios) => {
      app.comentarios = comentarios;

      //Calcula el promedio de los puntajes
      for (let comentario of comentarios) {
        suma += parseInt(comentario.puntaje, 10);
        cont++;
      }
      app.promedio = parseFloat(suma / cont).toFixed(2);
    });
}

//carga usuario
function cargarusuario(esadmin) {
  app.esadmin = esadmin;
}

// Elimina un comentario
function eliminarcomentario(idcoment) {
  fetch("api/comentarios/" + idcoment, {
    method: "DELETE",
  })
    .then((response) => {
      cargarcomentarios(idprod);
    })
    .catch((error) => console.log(error));
}

//agregar comentarios a un producto
function agregarcomentario(idprod) {
  let data = {
    detalle: document.querySelector("#detalle").value,
    puntaje: document.querySelector("#puntaje").value,
    id_producto_fk: idprod,
  };

  fetch("api/comentarios", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  })
    .then((response) => {
      cargarcomentarios(idprod, null);
    })
    .catch((error) => console.log(error));
}

cargarcomentarios(idprod, null);

cargarusuario(esadmin);
