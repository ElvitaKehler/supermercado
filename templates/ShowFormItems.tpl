{include 'header.tpl'}

<div class="container">
    
    

        <h1 style='color:orange'>Inserte un Rubro</h1>
        <form action="altaItem" method="post" class="my-4"  enctype="multipart/form-data">
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombreItem" type="text" class="form-control">
            </div>
             <div class="custom-file margen-abajo">
                <input type="file" class="custom-file-input" name="imagenrubro" id="validatedCustomFile" multiple>
                <label class="custom-file-label" for="validatedCustomFile">Agregar imagenes...</label>
            </div>
            

            <button type="submit" class="btn btn-dark">Guardar</button>
        </form>
        </div>
    
{include 'footer.tpl'}   