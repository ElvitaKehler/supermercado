<div class="row">        
      <table>        
            {foreach from=$imagenes item=imagen}
                  <td>  
                        <tr> <img class="imgchica" src="{$imagen->path}"> </tr> 
                        {if $User=='admin'} 
                        <tr> <a href="borrarimagrubro/{$imagen->id_rubro_fk}/{$imagen->id_imagen}" class="btn btn-link"><b style='color:orange'>Borrar</b> </a>  </tr>
                        {/if}
                  </td>
              
            {/foreach}          
      </table>
</div>

  <!--<div class="row ">
            <div id="carouselExampleIndicators" class="carousel slide margen-abajo" data-ride="carousel">

                <ol class="carousel-indicators">
                    {assign var=i value=0}
                    {foreach from=$imagenes item=imagen}
                        <li data-target="#carouselExampleIndicators" data-slide-to="{$i}" {if $i == 0} class="active" {/if}></li>
                        {assign var=i value=$i+1}
                    {/foreach}
                </ol>
                

                <div class="carousel-inner">

                    {assign var=i value=0}
                    {foreach from=$imagenes item=imagen}
                        <div class="carousel-item {if $i == 0} active {/if} ">
                            <a class="btn btn-dark ancho" href="borrarimagrubro/{$imagen->id_rubro_fk}/{$imagen->id_imagen}">
                                Borrar imagen
                            </a>
                            <img class="d-block w-100" src="./{$imagen->path}">
                        </div>
                        {assign var=i value=$i+1}
                    {/foreach}

                </div>
                
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
           
  </div> -->    