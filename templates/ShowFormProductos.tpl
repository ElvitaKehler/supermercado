{include 'header.tpl'}

<div class="container">
    
        <h1 style='color:orange'>Inserte un Producto</h1>
        
        
        <form action="altaprod" method="post" class="my-4" enctype="multipart/form-data">     
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombre" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>marca</label>
                    <input name="marca" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>precio</label>
                <input name="precio" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Rubro</label>
               <select name="id_rubro" type="text" class="form-control" >
                {foreach from=$listarubros item=rubro} 
                    <option value={$rubro->id_rubro}>{$rubro->nombre}</option>
                {/foreach}
            </select>
            </div>
            <div class="form-group">
                <label>Imagen Producto</label>
               <div class="custom-file margen-abajo">
                    <input type="file" class="custom-file-input" name="imagenprod"  >
                    <label class="custom-file-label">Agregar imagen...</label>
                </div>
            </div>

            <button type="submit" class="btn btn-dark">Guardar</button>
        </form>
 </div>      
        

    
    
{include 'footer.tpl'}   