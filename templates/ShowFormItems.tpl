{include 'header.tpl'}

<div class="container">
    
    

        <h1 style='color:blue'>Inserte un Rubro</h1>
        <form action="altaItem" method="post" class="my-4">
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombreItem" type="text" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
    
{include 'footer.tpl'}   