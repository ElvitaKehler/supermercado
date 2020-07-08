{include 'header.tpl'}
   
    <div class='row'>
    <div class='col-12'>
    {if  empty($listProductsByItem)}
                <h1 style='color:orange'>Este rubro no tiene productos</h1> 
                 <div class="text-center "><a class="" href="listrubros"><h3>Volver</h3></a></div>
    {else} 
     
         
        <table  class="table table-hover table-dark" style='width:900px'>
         <tr ><td><h2 ><b style='color:orange'>Rubro: {strtoupper($listProductsByItem[0]->rubro)}</b></h2> </td></tr> 
        </table> 
           <div class='col-12'>
    {include 'images.tpl'} 
    </div> 
          
            <table  class="table table-hover table-dark" style='width:900px'>
                <tr style='color:orange'><th scope='col'></th><th scope='col'>Producto</th><th scope='col'>Marca</th><th scope='col'>Precio</th></tr>  
               
                {foreach $listProductsByItem item= producto}           
            
                    <tr> 
                        <td><img src="{($producto->imagen)}"></td> 
                           
                        <td><b>{strtoupper($producto->nombre)}</b></td>
                        <td><b>{strtoupper($producto->marca)}</b> </td>
                        <td><b>{$producto->precio}</b> </td>
                        <td scope='col'> <a href="verproducto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Ver</b></a>
                        {if $User=='admin'} 
                            <td scope='col'> <a href="borrar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Borrar</b> </a>
                            <td scope='col'> <a href="editar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Editar</b> </a>
                        {/if}
                    </tr>
                {/foreach}
        
            </table>
     
    {/if}
    </div> 
   
   
      
 {include 'footer.tpl'}              

      
       