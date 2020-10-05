{include file="header.tpl"}
<p class="mt-5 h3">Mirá todas las recetas que tenemos para vos. Las mejores comidas, entradas y postres explicadas paso a paso.  ¡Son ricas, prácticas y fáciles de hacer!</p>
<div class="mt-5">
    <blockquote class="blockquote text-center">
        <p class="mb-0">La cocina es un lenguaje mediante el cual se puede expresar armonía, felicidad, belleza, poesía, complejidad, magia, humor, provocación, cultura</p>
        <footer class="blockquote-footer">Chef <cite title="Ferran Adrià">Ferran Adrià</cite></footer>
    </blockquote>
</div>
 <h3><em>Recetas</em></h3>
 {*    <ul class='list-group mt-2'>
    {foreach from=$recetas_s item=receta} 
        <li class='list-group-item'>
            {$receta->nombre} | {$receta->id_categoria} | {$receta->calorias} 
            <a class='btn btn-primary btn-sm' href='detalles/{$receta->id}'> VER DETALLES</a> 
        </li> 
    {/foreach}
    </ul> *}

    <table class="table ">
    <thead class="thead-dark">
        <tr class="">
            <th>nombre </th>
            <th>categoria </th>
            <th>calorias</th>
            <th>Detalles</th>
        </tr> 
    </thead>
    {foreach from=$recetas_s item=receta}  
        <tr>
            <td>{$receta->nombre}</td>
            <td>{$receta->categoria}</td>
            <td>{$receta->calorias}</td>
            <td> <a class='btn btn-primary btn-sm' href='detalles/{$receta->id}'> VER DETALLES</a></td>
        </tr>
    {/foreach}
</table>
{include file="footer.tpl"}

