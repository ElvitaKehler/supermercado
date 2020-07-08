

  <div class="container">
  <div class="row">
   <div class="col-6">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">

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
                         {if $User=='admin'} 
                            <a class="btn btn-dark container" href="borrarimagrubro/{$imagen->id_rubro_fk}/{$imagen->id_imagen}">
                                Borrar imagen
                            </a>
                          {/if}   
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
           
  </div>
   </div> 
   </div>   