{include 'header.tpl'}

<div class="container">  
       

        <h1>Edite el  Producto  {$producto[0]->nombre}</h1>
        <form action="productoEditado/{$producto[0]->nombre}" method="post" class="my-4">
        <div class="form-group">

                
                    <input name="idproducto" type="hidden" value={$producto[0]->id_producto} class="form-control">


                            <label>nombre</label>
                    <input name="nombreProducto" type="text" value={$producto[0]->nombre} class="form-control">
                             <label>Marca</label>
                    <input name="marcaProducto" type="text" value={$producto[0]->marca} class="form-control">
                             <label>Precio</label>
                    <input name="precioProducto" type="text" value={$producto[0]->precio} class="form-control">
                             
                    <input name="rubroProducto" type="hidden" value={$producto[0]->id_rubro} class="form-control">
            </div>
            

            <button type="submit" class="btn btn-dark">Editar</button>
        </form>
        </div>
    
{include 'footer.tpl'}   