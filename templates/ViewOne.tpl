{include 'header.tpl'}

   <h1> Rubro :{strtoupper($identif[0]->rubro)}</h1>
    <h2>Producto: {strtoupper($identif[0]->nombre)}</h2>
   
    <table class='table table-hover table-striped table-bordered table table-condensed' style='width:900px'>
     
    {foreach $identif item = prod}          
       
        <tr>        
            <td>Marca: <b>{strtoupper($prod->marca)}</b> </td>
            <td>Precio: <b>{$prod->precio}</b> </td>
        </tr>
        <img src="images/{($identif[0]->nombre)}.jpg">

    {/foreach}
 {include 'footer.tpl'}   