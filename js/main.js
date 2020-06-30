"use strict"

let app =new Vue({

    el: "#app-coments",
    data: {
        footer: "Comentarios renderizados con CSR",
        comentarios:[]
            }

});


let idprod = document.querySelector('#idprod').value;


let lista = document.querySelector('#list-coments');

//alert('productos/'+idprod+'/comentarios');
//carga inicial de comentarios

cargarcomentarios(idprod);

function cargarcomentarios(idprod){
    fetch('api/productos/'+idprod+'/comentarios')        
     .then(response=>response.json())
     .then(comentarios=>{
       app.comentarios=comentarios;
       
       

     });
}
