{include 'header.tpl'}
<table class="table table-hover table-dark" style='width:900px'>
    <tr>
        <td>
            <h2 class="table table-hover table-dark" style='color:orange'> Rubro :{strtoupper($identif->rubro)}</h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2 style='color:orange'>Producto: {strtoupper($identif->nombre)}</h2>
        </td>
    </tr>
</table>

<table class="table table-hover table-dark" style='width:900px'>



    <tr>
        {if $User=='admin'}
        <td scope='col'> <a href="borrarimagen/{$identif->id_producto}" class="btn btn-link"><b style='color:orange'>Borrar Imagen</b> </a>
        {/if}
        <td>Marca: <b>{strtoupper($identif->marca)}</b> </td>
        <td>Precio: <b>{$identif->precio}</b> </td>
         
    </tr>
    <img src={($identif->imagen)}>


</table>


{if $User=='admin' ||$User=='registrado'}

<div class="form-group">
    <h3>Agregue su comentario:</h3>

    <form class="my-4">

        <div class="form-group">
            <label>Detalle: </label>
            <textarea name="detalle" id="detalle" class="form-control"> </textarea>
        </div>
        <div class="form-group">
            <label>Puntaje: </label>
            <select name="puntaje" id="puntaje" class="form-control">
                <option value="1">1-malo</option>
                <option value="2">2-regular</option>
                <option value="3">3-bueno</option>
                <option value="4">4-muy bueno</option>
                <option value="5">5-excelente</option>

            </select>
        </div>
        <div id="btnagregar" class="btn btn-dark">Guardar</div>
    </form>
</div>

{/if}
<input id="idprod" type="hidden" value={$identif->id_producto}>
<input id="user" type="hidden" value={$User}>

<form>
<h3>Preferencia de Orden:</h3>

<div class="form-group">
    <label>Criterio: </label>
        <select id="sort"  class="form-control">
            <option value="fecha">Fecha</option>
            <option value="detalle">Detalle</option>
            <option value="puntaje">Puntaje</option>
        </select>
        <label>Orden: </label>
        <select id="order"  class="form-control">
            <option value="ASC">ASCENDENTE</option>
            <option value="DESC">DESCENDENTE</option>
        </select>
</div>
<div  id="btnorden" class="btn btn-dark">Ordenar</div>
</form>

    {include 'vue/coments.vue'}

</div>


<script src="js/main.js"></script>
{include 'footer.tpl'}

