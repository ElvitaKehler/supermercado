{include 'header.tpl'}

<div class="container">  
       

        <h1 style='color:orange'>Edite el  Producto  {$producto->nombre}</h1>
        <form action="productoEditado/{$producto->nombre}" method="post" class="my-4" enctype="multipart/form-data">
        <div class="form-group">

                
                    <input name="idproducto" type="hidden" value={$producto->id_producto} class="form-control">


                            <label>nombre</label>
                    <input name="nombreProducto" type="text" value={$producto->nombre} class="form-control">
                             <label>Marca</label>
                    <input name="marcaProducto" type="text" value={$producto->marca} class="form-control">
                             <label>Precio</label>
                    <input name="precioProducto" type="text" value={$producto->precio} class="form-control">
                             
                    <input name="rubroProducto" type="hidden" value={$producto->id_rubro} class="form-control">
                      <div class="form-group">
                <label>Imagen </label>
               <div class="custom-file margen-abajo">
                    <input type="file" class="custom-file-input" name="imagenprod">
                    <label class="custom-file-label" >Agregar imagen...</label>
                </div>     
           
            

            <button type="submit" class="btn btn-dark">Editar</button>
        </form>
         <div class="custom-file margen-abajo">                   
            <a class="btn btn-warning ancho" href="borrarimagenprod/{$producto[0]->id_producto}">Borrar imagen</a>            
        </div>
    
{include 'footer.tpl'}   