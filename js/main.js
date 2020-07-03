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
    },
});


let idprod = document.querySelector('#idprod').value;
let esadmin = document.querySelector('#user').value;
let btn = document.getElementById("btnagregar");
btn.onclick = function() {
    agregarcomentario(idprod);
};




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
   // alert("ingresa a la funcion agregar comentario CON EL IDPROD"+idprod); LLEGA OK Idprod
    let data = {
        "detalle": document.querySelector("#detalle").value,       
        "puntaje": document.querySelector("#puntaje").value,  //llegan OK los valores del formulario
        "id_producto_fk": idprod
    } 
        
    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response => {
        cargarcomentarios(idprod);
        alert(" Se agregó comentario con para el producto con el id producto "+idproducto);
    })
    .catch(error => console.log(error));
 
    
 }


 

    





