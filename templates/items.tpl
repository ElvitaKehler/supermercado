{include 'header.tpl'}

<h2> Rubros disponibles </h2>
<table class='table table-hover table-striped table-bordered table table-condensed' style='width:400px'>
      
       <tr style='color:blue'><th scope='col'>RUBRO</th>
        
       
        {foreach $listarubros item= rubro} 
            
           <tr>
             <td><a href='productos_por_rubros/{$rubro->id_rubro}' class='btn btn-link '>{strtoupper($rubro->nombre)}</a>               
            <td> <a href='borrar_rubro/{$rubro->id_rubro} class='btn btn-link>Borrar </a>
            <td> <a href='editar_rubro/{$rubro->id_rubro} class='btn btn-link>Editar </a>
            </tr>
        {/foreach}