{include 'header.tpl'}

    {if  empty($listProductsByItem)}
                <h1>Este rubro no tiene productos</h1> 
                 <div class="text-center "><a class="" href="listrubros"><h3>Volver</h3></a></div>
    {else} 
     
        <img src="images/imagesRubros/{($listProductsByItem[0]->rubro)}.jpg"> 
        <table  class="table table-hover table-dark" style='width:900px'>
         <tr ><td><h2 ><b>Rubro: {strtoupper($listProductsByItem[0]->rubro)}</b></h2> </td></tr> 
        </table> 
            <table  class="table table-hover table-dark" style='width:900px'>
                <tr style='color:blue'><th scope='col'></th><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>  
      
                {foreach $listProductsByItem item= producto}           
            
                    <tr> 
                        <td><img src="images/imagesProd/{($producto->nombre)}.jpg"></td>        
                        <td><b>{strtoupper($producto->nombre)}</b></td>
                        <td><b>{strtoupper($producto->marca)}</b> </td>
                        <td><b>{$producto->precio}</b> </td>
                        <td scope='col'> <a href="verproducto/{$producto->id_producto}" class="btn btn-link"><b>Ver</b></a>
                        {if $esadmin==1} 
                            <td scope='col'> <a href="borrar_producto/{$producto->id_producto}" class="btn btn-link"><b>Borrar</b> </a>
                            <td scope='col'> <a href="editar_producto/{$producto->id_producto}" class="btn btn-link"><b>Editar</b> </a>
                        {/if}
                    </tr>
                {/foreach}
        
            </table>
     
    {/if} 
 {include 'footer.tpl'}              

      
       