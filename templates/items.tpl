{include 'header.tpl'}

 
{if $esadmin}
    <table  class="table table-hover table-dark" style='width:900px'>
       
        <tr style='color:blue'>
            <th scope='col'><h2> Rubro disponibles </h2></th>
            <th scope='col'><a class="navbar-brand" href="formAltaItem">Alta de un Rubro</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> </button>
            </th>
        </tr>
        
    </table>
 {/if}

<table  class="table table-hover table-dark" style='width:400px'>
      
       <tr style='color:blue'>
            <th scope='col'></th>
            <th scope='col'>RUBRO</th>
       </tr>
        {foreach $listarubros item= rubro} 
        <tr>
            <td><img src="images/imagesRubros/{($rubro->nombre)}.jpg"></td>
             <td><a href="productos_por_rubros/{$rubro->id_rubro}" class='btn btn-link'><b>{strtoupper($rubro->nombre)}</b> </a> 
             {if $esadmin}             
                  <td> <a href='borrar_rubro/{$rubro->id_rubro}' class='btn btn-link'><b>Borrar</b> </a></td>
                  <td> <a href='editar_rubro/{$rubro->id_rubro}' class='btn btn-link'><b>Editar</b> </a></td>
              {/if}
        </tr>
            {/foreach}
       
{include 'footer.tpl'} 