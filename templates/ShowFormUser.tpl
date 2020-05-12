{include 'header.tpl'}

<div class="container">
    
        <h1>Logueo de usuarios:</h1>
        <div class="row">
        <div class="col-6">
        <form action="verificar" method="post" class="my-4">     
            
            <div class="form-group">
                <label>Nombre de Usuario</label>
                    <input name="nombre_usuario" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                      <input type="password" name="password" class="form-control">
                    
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
</div>
        