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

let boton=document.querySelector('#btnagregar');
let idprod = document.querySelector('#idprod').value;
let esadmin = document.querySelector('#user').value;
boton.addEventListener("click", agregarcomentario(idprod));
//document.querySelector("#btn_agregar").addEventListener('click', agregarcomentario); -> NO TOMA DEL VUE
console.log($('#btnagregar'));

cargarcomentarios(idprod);
cargarusuario(esadmin);


//carga inicial de comentarios
function cargarcomentarios(idprod){
    fetch('api/productos/'+idprod+'/comentarios')        
     .then(response=>response.json())
     .then(comentarios=>{
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
    alert("ingresa a la funcion agregar comentario");
    let data = {
        detalle: document.querySelector("textarea[name=detalle]").value,
        //fecha: document.querySelector("input[name=fecha]").value,
        puntaje: document.querySelector("select[name=puntaje]").value,
        id_producto: idprod
    } 
    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response => {
        cargarcomentarios(idprod);
    })
    .catch(error => console.log(error));
 
    
    alert(" Se agregó comentario  para el producto ");
 }


    





