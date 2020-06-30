"use strict"

let app =new Vue({

    el: "#app-coments",
    data: {
        footer: "Comentarios renderizados con CSR",
        comentarios:[]
    }

});


let idprod =document.querySelector('#idprod');
//alert(idprod);

let lista = document.querySelector('#list-coments');

//carga inicial de comentarios
cargarcomentarios();

function cargarcomentarios(idprod){
    fetch('api/comentarios')        //fetch('productos/'+idprod+'/comentarios')
     .then(response=>response.json())
     .then(comentarios=>{
       app.comentarios=comentarios;

     });
}
