<div class="row">
        

    
        
          
      <table>
        
            {foreach from=$imagenes item=imagen}
              <td>  
                  <tr> <img class="imgchica" src="{$imagen->path}"> </tr> 
                  {if $User=='admin'} 
                      <tr> <a href="borrarimagrubro/{$imagen->id_rubro_fk}/{$imagen->id_imagen}" class="btn btn-link"><b style='color:orange'>Borrar</b> </a>  </tr>
                           
                    {/if}
                   
              </td>
              
            {/foreach}
          
      </table>
    
 
</div>