{include 'header.tpl'}
<table  class="table table-hover table-dark" style='width:900px'>
   <tr ><td><h2 class="table table-hover table-dark" style='color:orange'> Rubro :{strtoupper($identif->rubro)}</h2> </td></tr>
   <tr ><td><h2 style='color:orange'>Producto: {strtoupper($identif->nombre)}</h2> </td></tr>
</table>   

<table  class="table table-hover table-dark" style='width:900px'>
     
             
       
        <tr>        
            <td>Marca: <b>{strtoupper($identif->marca)}</b> </td>
            <td>Precio: <b>{$identif->precio}</b> </td>
        </tr>
        <img src={($identif->imagen)}>

   
</table>
{if $User=='registrado'}
<h1>es registrado pude ingresar comentarios</h1>
{/if}
{if $User=='admin'}
<h1>es admin puede hacer lo que quiera!!!!!</h1>
{/if}
<input id="idprod" type="hidden" value={$identif->id_producto}>
<input id="user" type="hidden" value={$User}>
<div>
   
       {include 'vue/coments.vue'}
    
</div>

<script src="js/main.js"></script>
{include 'footer.tpl'}   

<!--{if $esadmin==1} 
    <td scope='col'> <a href="borrar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Borrar</b> </a>
    <td scope='col'> <a href="editar_producto/{$producto->id_producto}" class="btn btn-link"><b style='color:orange'>Editar</b> </a>
{/if}
-->