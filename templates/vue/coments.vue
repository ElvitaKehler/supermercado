{literal}

<section id="app-coments">



  <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Comentarios</h5>
        </div>

           <ul id="list-coments" class="list-group list-group-flush">
            
            <div v-if="comentarios.length==0">        <!--falta hacer-->
                No hay comentarios para este producto
              </div>
              <div v-if ="comentarios.length!=0">
                <li v-for="comentario in comentarios" class="list-group-item list-group-item-action"> 
                    {{ comentario.detalle }} Puntaje: {{ comentario.puntaje }}
                </li>
              </div>
            
        
        </ul>

        <div class="card-footer text-muted">
            {{ footer }}
        </div>

    </div>

</section>
{/literal}
