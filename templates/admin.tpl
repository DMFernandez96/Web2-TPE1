{include file="templates/header.tpl"}

{include file="templates/adminTab.tpl"}
{include file="templates/form_receta.tpl"}

<div class="row">

    <h3> Recetas</h3>
    <table class="table ">
        <thead class="thead-dark">
            <tr class="">
                <th>Nombre </th>
                <th>Categoria </th>
                <th>Calorias</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr> 
        </thead>
        {foreach from=$recetas_s item=receta}  
            <tr>
                <td>{$receta->nombre}</td>
                <td>{$receta->categoria}</td>
                <td>{$receta->calorias}</td>
                <td><a class='btn btn-danger btn-sm' href='eliminarReceta/{$receta->id}'>ELIMINAR</a></td>
            <td> <a class='btn btn-primary btn-sm' href='editarReceta/{$receta->id}'>Editar</a> </td> 
            </tr>
        {/foreach}
    </table>
</div>

{include file="templates/footer.tpl"}