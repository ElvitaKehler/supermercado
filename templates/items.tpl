{include 'header.tpl'}

 
{if $User=='admin'}
    <table  class="table table-hover table-dark" style='width:900px'>
       
        <tr style='color:orange'>
            <th scope='col'><h2> Rubro disponibles </h2></th>
            <th scope='col'><a class="navbar-brand" href="formAltaItem" style='color:orange'>Alta de un Rubro</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> </button>
            </th>
        </tr>
        
    </table>
 {/if}

<table  class="table table-hover table-dark" style='width:400px'>
      
       <tr style='color:orange'>
            <th scope='col'></th>
            <th scope='col'>RUBRO</th>
       </tr>
        {foreach $listarubros item= rubro} 
        <tr>
            <td><img src={($rubro->imagen_rubro)}></td>
             <td><a href="productos_por_rubros/{$rubro->id_rubro}" class='btn btn-link'><b style='color:orange'>{strtoupper($rubro->nombre)}</b> </a> 
             {if $User=='admin'}             
                  <td> <a href='borrar_rubro/{$rubro->id_rubro}' class='btn btn-link'><b style='color:orange'>Borrar</b> </a></td>
                  <td> <a href='editar_rubro/{$rubro->id_rubro}' class='btn btn-link'><b style='color:orange'>Editar</b> </a></td>
              {/if}
        </tr>
            {/foreach}
          
       
{include 'footer.tpl'} 