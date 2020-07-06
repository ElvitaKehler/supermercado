
{include 'header.tpl'} 
<div class="container">  
       

        <h4>Modifique permisos </h4>
        <form action="user_editado/{$usuar->id_usuario}" method="post" class="my-4">
        

               
            <input name="iduser" type="hidden" value={$usuar->id_usuario} class="form-control">
                <label>Nombre : {$usuar->nombre_usuario} </label><br>
                <input name="nombreUsuario" type="hidden" value={$usuar->nombre_usuario} class="form-control">
                <label>Tipo</label>
                <select name="tipo" type="text" class="form-control">
                    <option value="admin" selected>Admin</option>
                     <option value="registrado">Registrado</option>
                    </select>
            <button type="submit" class="btn btn-dark">Editar</button>
       
        </form>
 </div>         
    
  {include 'footer.tpl'}         