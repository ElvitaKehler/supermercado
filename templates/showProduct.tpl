{include 'header.tpl'}
 <h2> Productos disponibles </h2>

       <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
      
       <tr style='color:blue'><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>
        
       
        {foreach $listaProductos item= producto} 
            
           <tr>
             <td> <b> {$producto->nombre} </b> </td>
            <td> <b> {$producto->marca}</b> </td>
                <td> <b>{$producto->precio}</b> </td>
                <td> <a href='verproducto/{$producto->id_producto} class='btn btn-link>Ver</a>
                <td> <a href='borrar_producto/{$producto->id_producto} class='btn btn-link>Borrar </a>
                <td> <a href='editar_producto/{$producto->id_producto} class='btn btn-link>Editar </a>
            </tr>
        {/foreach}
        