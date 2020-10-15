{include file="templates/header.tpl"}
{include file="templates/adminTab.tpl"}

<div class="row">
    {include file="templates/form_alta_receta.tpl"}
    <div class="col-6">
        <h3> Recetas existentes</h3>
        <table class="table table-responsive">
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
                <tr class="bg-light">
                    <td>{$receta->nombre}</td>
                    <td>{$receta->categoria}</td>
                    <td>{$receta->calorias}</td>
                    <td><a class='btn btn-danger btn-sm' href='eliminarReceta/{$receta->id}'>ELIMINAR</a></td>
                <td> <a class='btn btn-primary btn-sm' href='editarReceta/{$receta->id}'>Editar</a> </td> 
                </tr>
            {/foreach}
        </table>
    </div>
</div>

{include file="templates/footer.tpl"}