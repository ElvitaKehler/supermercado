{include 'header.tpl'}

<div class="container">
    
        <h3 style='color:orange'>Restablecer contraseña:</h3>
        <h5> Ingrese el mail con el cual se registró</h5>
        
        <form action="reenviocontra" method="post" class="my-4">     
            
            <div class="form-group">
                <label>Mail:</label>
                    <input name="mail" type="text" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-dark">Enviar</button>
        </form>
</div>
{include 'footer.tpl'}   
        