{include 'header.tpl'}

{if $User=='admin'} 
    
 
    <table  class="table table-hover table-dark" style='width:900px'>
     <tr style='color:orange'><th scope='col'><h1>Usuario</h1></th><th scope='col'><h1>Tipo</h1></th>
        {foreach $usuarios item= usuario} 
            <tr>
            <td> <b> {strtoupper($usuario->nombre_usuario)} </b> </td>
            <td> <b> {strtoupper($usuario->tipo)}</b> </td>
            <td scope='col'> <a href="borrar_usuario/{$usuario->id_usuario}" class="btn btn-link"><b style='color:orange'>Borrar Usuario</b> </a>
            <td scope='col'> <a href="editar_usuario/{$usuario->id_usuario}" class="btn btn-link"><b style='color:orange'>Editar Usuario</b> </a>
            </tr>
        {/foreach}
    </table>
{/if}    
    
{include 'footer.tpl'}   