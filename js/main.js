"use strict"

let app =new Vue({

    el: "#app-coments",
    data: {
        footer: "Comentarios renderizados con CSR",
        comentarios:[],
        esadmin:""      
            }

});


let idprod = document.querySelector('#idprod').value;
let esadmin = document.querySelector('#user').value;


//alert('productos/'+idprod+'/comentarios');

//carga inicial de comentarios

cargarcomentarios(idprod);
cargarusuario(esadmin);

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
    console.log(app.esadmin);
}

//agregar comentarios a un producto

function agregarcomentario(idprod){

}

/*document.querySelector("#form-tarea").addEventListener('submit', addTask);
function addTask(e) {
    e.preventDefault();
    
    let data = {
        titulo:  document.querySelector("input[name=titulo]").value,
        descripcion:  document.querySelector("input[name=descripcion]").value,
        prioridad:  document.querySelector("input[name=prioridad]").value
    }

    fetch('api/tareas', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
         getTasks();
     })
     .catch(error => console.log(error));
}
*/

