{include 'header.tpl'}

<div class="container">
    
        <h1 style='color:orange'>Registro de usuarios:</h1>
        
        <form action="registrarUsuario" method="post" class="my-4">     
            
            <div class="form-group">
                <label>Nombre de Usuario</label>
                    <input name="nombreusuario" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                      <input type="password" name="contraseniaUser" class="form-control">
                    
            </div>
             {if $error}
             <div class="alert alert-danger">
                 {$error}
             </div>
             {/if}
            
            <button type="submit" class="btn btn-dark">Enviar</button>
        </form>
</div>
{include 'footer.tpl'}   