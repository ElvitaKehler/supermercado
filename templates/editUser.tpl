

<div class="container">  
       

        <h1 style='color:orange'>Modifique permisos </h1>
        <form action="user_editado/{$usuario->id_usuario}" method="post" class="my-4">
        

                <label>id Usuario</label> 
            <input name="iduser" type="number" value={$usuario->id_usuario} class="form-control">
                <label>nombre</label>
                <input name="nombreUsuario" type="text" value={$usuario->nombre_usuario} class="form-control">
                <label>Tipo</label>
                <input name="tipo" type="text" value={$usuario->tipo} class="form-control">
            <button type="submit" class="btn btn-dark">Editar</button>
       
        </form>
 </div>        
    
  {include 'footer.tpl'}         