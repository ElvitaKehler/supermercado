

{literal}

<section id="app-coments">



  <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Comentarios </h5>
        </div>


    <table  id="list-coments" class="table table-hover table-dark" style='width:900px'>
        <tr style='color:orange' v-if="comentarios.length==0"><th scope='col'> No hay comentarios para este producto</th></tr>
        <tr style='color:yellow' v-if="comentarios.length!=0"><th scope='col'>El promedio de las puntuaciones es : {{ promedio }}</th></tr>
         <tr style='color:orange' ><th scope='col'> <button v-on:click="ordenar(comentario.fecha)" class="btn btn-dark">Fecha</button></th> <th scope='col'> <button v-on:click="ordenar(comentario.detalle)" class="btn btn-dark">Comentario</button></th> <th scope='col'> <button v-on:click="ordenar(comentario.puntaje)" class="btn btn-dark">Puntuación</button></th>
        <tr  v-for="comentario in comentarios">
            <td> <b>  {{ comentario.fecha }} </b> </td>
            <td> <b> {{ comentario.detalle }}</b> </td>
            <td> <b>Puntaje: {{ comentario.puntaje }}</b> </td>
            <td scope='col'  v-if ="esadmin=='admin'">  <button v-if="esadmin=='admin'" v-on:click="eliminar(comentario.id_comentario)" class="btn btn-dark">Eliminar</button></td>
        </tr>      
    </table>
     <div class="card-footer text-muted">
            {{ footer }}
        </div>

    </div>

</section>
{/literal}

