{include file="header.tpl"}
<p class="mt-5 h3">Mirá todas las recetas que tenemos para vos. Las mejores comidas, entradas y postres explicadas paso a paso.  ¡Son ricas, prácticas y fáciles de hacer!</p>
<div class="mt-5">
    <blockquote class="blockquote text-center">
        <p class="mb-0">La cocina es un lenguaje mediante el cual se puede expresar armonía, felicidad, belleza, poesía, complejidad, magia, humor, provocación, cultura</p>
        <footer class="blockquote-footer">Chef <cite title="Ferran Adrià">Ferran Adrià</cite></footer>
    </blockquote>
</div>
 <h3><em>Recetas</em></h3>
 {if $logueado_s} <h4><em>Recetas publicadas en el sitio:</em></h4> {/if}
    <table class="table ">
        <thead class="thead-dark">
            <tr class="">
                <th>nombre </th>
                <th>categoria </th>
                <th>calorias</th>
                <th>Detalles</th>
            </tr> 
        </thead>
        <tbody>
            {foreach from=$recetas_s item=receta}  
                <tr>
                    <td>{$receta->nombre}</td>
                    <td>{$receta->categoria}</td>
                    <td>{$receta->calorias}</td>
                    <td> <a class='btn btn-primary btn-sm' href='detalles/{$receta->id}'> VER DETALLES</a> </td> 
                </tr>
            {/foreach}
        </tbody>
    </table>
{include file="footer.tpl"}

