{include 'header.tpl'}

<div class="container">  
       

        <h1 style='color:orange'>Edite el  Rubro {$item[0]->nombre}</h1>
        <form action="rubroEditado/{$item[0]->nombre}" method="post" class="my-4" enctype="multipart/form-data">
        <div class="form-group">

                
                    <input name="iditem" type="hidden" value={$item[0]->id_rubro} class="form-control">


                            <label>nombre</label>
                    <input name="nombreItem" type="text" value={$item[0]->nombre} class="form-control">
                  
                   
            <div class="custom-file margen-abajo">
                <input type="file" class="custom-file-input" name="imagenrubro" id="validatedCustomFile" multiple>
                <label class="custom-file-label" for="validatedCustomFile">Agregar imagen...</label>
            </div>
            </div>
            
            

            <button type="submit" class="btn btn-dark">Editar</button>
        </form>
        </div>
    
{include 'footer.tpl'}   