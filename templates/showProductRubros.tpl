{include 'header.tpl'}
{if empty($productos)}

          <h2>No hay productos de este rubro<h2>
{else $productos[0]->rubro}
     
    <h2> Rubro {$titulo}</h2>
            
            <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
                <tr style='color:blue'><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>  
      
    {foreach $listaProductos item= producto}           
           
        <tr>         
            <td><b>{$producto->nombre}</b></td>
            <td><b>{$producto->marca}</b> </td>
            <td><b>{$producto->precio}</b> </td>
            <td> <a href='verproducto/{$producto->id_producto} class='btn btn-link>Ver</a>
         </tr>
    {/foreach}
        
            </table>
         
{/if}
     
            

      
       