{include 'header.tpl'}

<ul class="list-group">
    {foreach $listarubros item= rubro}              
        <li class="list-group-item">
            <a href='productos_por_rubros/$idrubro' class='btn btn-link '>{strtoupper($rubro->nombre)}</a>    
        </li>
    {/foreach}
</ul>
 