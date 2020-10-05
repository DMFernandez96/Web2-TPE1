{include file="templates/header.tpl"}

{include file="templates/adminTab.tpl"}
{include file="templates/form_receta.tpl"}

<h3> Recetas</h3>
{* crea la lista en la linea 13 poner el nombre que se corresponde con el nombre que esta en la bbdd *}
{* <ul class='list-group mt-2'>
    {foreach from=$recetas_s item=receta}
        <li class='list-group-item'>
                {$receta->nombre} | {$receta->id_categoria} | {$receta->calorias} 
                <a class='btn btn-danger btn-sm' href='eliminarReceta/{$receta->id}'>ELIMINAR</a> 
                <a class='btn btn-primary btn-sm' href='editarReceta/{$receta->id}'>Editar</a> 
            </li> 
    {/foreach}
</ul> *}

<table class="table ">
    <thead class="thead-dark">
        <tr class="">
            <th>nombre </th>
            <th>categoria </th>
            <th>calorias</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr> 
    </thead>
    {foreach from=$recetas_s item=receta}  
        <tr>
            <td>{$receta->nombre}</td>
            <td>{$receta->id_categoria}</td>
            <td>{$receta->calorias}</td>
            <td><a class='btn btn-danger btn-sm' href='eliminarReceta/{$receta->id}'>ELIMINAR</a></td>
           <td> <a class='btn btn-primary btn-sm' href='editarReceta/{$receta->id}'>Editar</a> </td> 
        </tr>
    {/foreach}
</table>

{include file="templates/footer.tpl"}