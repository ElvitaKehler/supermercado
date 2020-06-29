{include 'header.tpl'}
<table  class="table table-hover table-dark" style='width:900px'>
   <tr ><td><h2 class="table table-hover table-dark" style='color:orange'> Rubro :{strtoupper($identif[0]->rubro)}</h2> </td></tr>
   <tr ><td><h2 style='color:orange'>Producto: {strtoupper($identif[0]->nombre)}</h2> </td></tr>
</table>   

<table  class="table table-hover table-dark" style='width:900px'>
     
    {foreach $identif item = prod}          
       
        <tr>        
            <td>Marca: <b>{strtoupper($prod->marca)}</b> </td>
            <td>Precio: <b>{$prod->precio}</b> </td>
        </tr>
        <img src={($prod->imagen)}>

    {/foreach}
</table>
<div class="card">
    <div class="clard-header">

<script src="js/main.js"></script>
{include 'footer.tpl'}   