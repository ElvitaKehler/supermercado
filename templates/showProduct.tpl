{include 'header.tpl'}

{if $esadmin} 
 <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
      
       <tr style='color:blue'><th scope='col'><h2> Productos disponibles </h2></th><th scope='col'><a class="navbar-brand" href="formAltaProducto">Alta de un Producto</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                </span>
                </th>
        </tr>
        </table>
 {/if}
       <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
      
       <tr style='color:blue'><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>
        
       
        {foreach $listaProductos item= producto} 
            
           <tr>
             <td> <b> {$producto->nombre} </b> </td>
            <td> <b> {$producto->marca}</b> </td>
                <td> <b>{$producto->precio}</b> </td>
                <td> <a href="verproducto/{$producto->id_producto}" class="btn btn-link">Ver</a></td>
                {if $esadmin} 
                    <td> <a href="borrar_producto/{$producto->id_producto}" class="btn btn-link">Borrar </a></td>
                    <td> <a href="editar_producto/{$producto->id_producto}" class="btn btn-link">Editar </a></td>
                {/if}
                </tr>
        {/foreach}
     {include 'footer.tpl'}   