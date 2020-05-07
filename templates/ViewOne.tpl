{include 'header.tpl'}

   <h1> Rubro :{$identif[0]->rubro}</h1>
    <h2>Producto: git add {$identif[0]->nombre}</h2>
   
    <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
     
    {foreach $identif item = prod}          
       
        <tr>        
            <td>Marca: <b>{$prod->marca}</b> </td>
            <td>Precio: <b>{$prod->precio}</b> </td>
        </tr>

    {/foreach}
    </table>