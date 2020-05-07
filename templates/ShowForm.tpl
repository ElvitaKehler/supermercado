{include 'header.tpl'}

<div class="container">
    
        <h1>Inserte un Producto</h1>
        <div class="row">
        <div class="col-6">
        <form action="altaprod" method="post" class="my-4">     
            
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
                <label>id_rubro</label>
                <input name="id_rubro" type="text" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
        <div class="col-6">

        <h1>Inserte un Rubro</h1>
        <form action="altaItem" method="post" class="my-4">
            
            <div class="form-group">
                <label>nombre</label>
                    <input name="nombreItem" type="text" class="form-control">
            </div>
            

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
    
    </body>
</html>