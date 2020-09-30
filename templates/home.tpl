{include file="header.tpl"}
<p class="mt-5 h3">Mirá todas las recetas que tenemos para vos. Las mejores comidas, entradas y postres explicadas paso a paso.  ¡Son ricas, prácticas y fáciles de hacer!</p>
<div class="mt-5">
    <blockquote class="blockquote text-center">
        <p class="mb-0">La cocina es un lenguaje mediante el cual se puede expresar armonía, felicidad, belleza, poesía, complejidad, magia, humor, provocación, cultura</p>
        <footer class="blockquote-footer">Chef <cite title="Ferran Adrià">Ferran Adrià</cite></footer>
    </blockquote>
</div>
 <h3><em>Listado de recetas</em></h3>
    <ul class='list-group mt-2'>
    {foreach from=$recetas_s item=receta} 
        <li class='list-group-item'>
                {$receta->nombre} | {$receta->id_categoria} | {$receta->calorias} 
                <a class='btn btn-primary btn-sm'  name='linkDetalles' href='detallar/$receta->id'> VER DETALLES</a> 
            </li> 
    {/foreach}
    </ul>
{include file="footer.tpl"}

