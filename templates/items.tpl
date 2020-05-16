{include 'header.tpl'}
{if $esadmin==1}
<table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
       
       <tr style='color:blue'><th scope='col'><h2> Rubro disponibles </h2></th><th scope='col'><a class="navbar-brand" href="formAltaItem">Alta de un Rubro</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </span>
                </th>
        </tr>
        
        </table>
         {/if}
<table class='table table-hover table-striped table-bordered table table-condensed' style='width:400px'>
      
       <tr style='color:blue'><th scope='col'>RUBRO</th>
        
       
        {foreach $listarubros item= rubro} 
            
           <tr>
             <td><a href='productos_por_rubros/{$rubro->id_rubro}' class='btn btn-link '>{strtoupper($rubro->nombre)}</a>  
             {if $esadmin==1}             
                  <td> <a href='borrar_rubro/{$rubro->id_rubro} class='btn btn-link>Borrar </a></td>
                  <td> <a href='editar_rubro/{$rubro->id_rubro} class='btn btn-link>Editar </a></td>
              {/if}
            </tr>
        {/foreach}
{include 'footer.tpl'} 