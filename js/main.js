"use strict"

let app =new Vue({

    el: "#app-coments",
    data: {
        footer: "Comentarios renderizados con CSR",
        comentarios:[],
        esadmin:""      
            },
    methods: {
        eliminar: function (id) {
            eliminarcomentario(id);
        },
        agregar: function(id) {
            agregarcomentario(id);
        }
    },
});


let idprod = document.querySelector('#idprod').value;
let esadmin = document.querySelector('#user').value;
let boton = document.querySelector('#btnagregar');
    boton.addEventListener('click', agregarcomentario(idprod));
//document.querySelector("#btn_agregar").addEventListener('click', agregarcomentario); -> NO TOMA DEL VUE
console.log($('#btn_agregar'));

cargarcomentarios(idprod);
cargarusuario(esadmin);


//carga inicial de comentarios
function cargarcomentarios(idprod){
    fetch('api/productos/'+idprod+'/comentarios')        
     .then(response=>response.json())
     .then(comentarios=>{
         console.log(comentarios);
       app.comentarios=comentarios;
 
     });
}


//carga usuario
function cargarusuario(esadmin){
    app.esadmin=esadmin;
   // console.log(app.esadmin);
}

//agregar comentarios a un producto

function eliminarcomentario(idcoment){
    fetch('api/comentarios/' + idcoment, {
        method: 'DELETE',
        
    })
    .then(response => {
        cargarcomentarios(idprod);
       
    })
    .catch(error => console.log(error));
}

function agregarcomentario(idprod){
   // alert("ingresa a la funcion agregar comentario");
    let data = {
        detalle: document.querySelector("textarea[name=detalle]").value,       
        puntaje: document.querySelector("select[name=puntaje]").value,
        id_producto: idprod
    } 
    fetch('api/comentarios'+idprod, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response => {
        cargarcomentarios(idprod);
        alert(" Se agregó comentario con para el producto con el id producto "+idproducto);
    })
    .catch(error => console.log(error));
 
    
   // alert(" Se agregó comentario con para el producto ");
 }


 

/*
 async function agregarcomentario(idprod) {
    let data = {
        detalle: document.querySelector("textarea[name=detalle]").value,       
        puntaje: document.querySelector("select[name=puntaje]").value,
        id_producto: idprod
    } ;
    console.log(data);
    let nuevo = JSON.stringify(data);
    console.log(nuevo);
    let r = await fetch('http://localhost/web2/tpEspecial/supermercado/api/comentarios'+idprod, {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json"
        },
        "body": nuevo
    });
    if (r.ok) {
        let json = await r.json();
       cargarcomentarios(json);
    }
}


 function cargarcomentarios(json){
    let data = json.information;
    console.log(json);
    let tabla = document.querySelector("#miTabla");
    let fila = tabla.insertRow(-1); //inserta fila
    let col1 = fila.insertCell(0); //inserta la primer celda
    let col2 = fila.insertCell(1);
    let col3 = fila.insertCell(2);
    col1.innerHTML = json.detalle;
    col2.innerHTML = json.puntaje;
    col3.innerHTML = json.id_producto;
 }

*/

    





