{include "templates/header.tpl"}
{include "templates/adminTab.tpl"} 

<div class="row">
    {include 'templates/form_categoria.tpl'}
    <div class="col-8">
            <table class="table ">
                <thead class="thead-dark">
                    <tr class="">
                        <th>Nombre</th>
                        <th>Descripcion </th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr> 
                </thead>
                <tbody>
                    {foreach from=$categorias_s item=categoria}  
                        <tr class="bg-light">
                            <td>{$categoria->nombre}</td>
                            <td>{$categoria->descripcion}</td>
                            <td><a class='btn btn-danger btn-sm' href='eliminarCategoria/{$categoria->id}'>ELIMINAR</a> </td>
                            <td> <a class='btn btn-primary btn-sm' href='editarCategoria/{$categoria->id}'>Editar</a> </td> 
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
</div>
{include "templates/footer.tpl"}