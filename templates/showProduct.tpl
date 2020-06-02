{include 'header.tpl'}

{if $esadmin} 
     <table  class="table table-hover table-dark" style='width:900px'>
      
        <tr style='color:orange'><th scope='col'><h2> Productos disponibles </h2></th><th scope='col'><a class="navbar-brand" href="formAltaProducto" style='color:orange'>Alta de un Producto</a></th>
        </tr>
    </table>
 {/if}
       <table  class="table table-hover table-dark" style='width:900px'>
      
       <tr style='color:orange'><th scope='col'></th><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>
        
       
        {foreach $listaProductos item= producto} 
            
           <tr>
            <td><img src="images/imagesProd/{($producto->nombre)}.jpg"></td>
             <td> <b> {strtoupper($producto->nombre)} </b> </td>
            <td> <b> {strtoupper($producto->marca)}</b> </td>
                <td> <b>{$producto->precio}</b> </td>
                <td scope='col'> <a href="verproducto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Ver</b></a>
                        {if $esadmin==1} 
                            <td scope='col'> <a href="borrar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Borrar</b> </a>
                            <td scope='col'> <a href="editar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Editar</b> </a>
                        {/if}
                </tr>
        {/foreach}
     {include 'footer.tpl'}   