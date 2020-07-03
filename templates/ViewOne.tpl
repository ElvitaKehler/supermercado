{include 'header.tpl'}
<table  class="table table-hover table-dark" style='width:900px'>
   <tr ><td><h2 class="table table-hover table-dark" style='color:orange'> Rubro :{strtoupper($identif->rubro)}</h2> </td></tr>
   <tr ><td><h2 style='color:orange'>Producto: {strtoupper($identif->nombre)}</h2> </td></tr>
</table>   

<table  class="table table-hover table-dark" style='width:900px'>
     
             
       
        <tr>        
            <td>Marca: <b>{strtoupper($identif->marca)}</b> </td>
            <td>Precio: <b>{$identif->precio}</b> </td>
            <td scope='col'> <a href="borrarimagen/{$identif->id_producto}" class="btn btn-link"><b style='color:orange'>Borrar Imagen</b> </a>
        </tr>
        <img src={($identif->imagen)}>

   
</table>
{* {if $User=='registrado'}
<h1>es registrado pude ingresar comentarios</h1> 
{/if}*}
{if $User=='admin' ||$User=='registrado'}

     {* <h1>es admin puede hacer lo que quiera!!!!!</h1> *}
     <div class="form-group">
     <h3>Agregue su comentario:</h3>
     <form action="" method="post" class="my-4" enctype="multipart/form-data"> 
     <div>
     <label>Fecha: </label>
     <input type="text" name="fecha">
     </div>  
     <div>      
            <label>Detalle: </label>
             <textarea name="detalle"> </textarea>
        </div>  
        <div>  
             <label>Puntaje: </label>
             <select name="puntaje">
                 <option value="1">1-malo</option>
                 <option value="2">2-regular</option>
                 <option value="3">3-bueno</option>
                 <option value="4">4-muy bueno</option>
                 <option value="5">5-excelente</option>
                
             </select>
        </div>
             <button type="submit" onclick="agregar({$identif->id_producto})" class="btn btn-dark">Guardar</button>
         </form>
     </div>
     
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