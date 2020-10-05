 {include file="templates/header.tpl"}

{include file="templates/adminTab.tpl"} 
{include 'templates/form_categoria.tpl'}

<h3> {$titulo_s}</h3>
<ul class='list-group mt-2'>
    {foreach from=$categorias_s item=categoria}
        <li class='list-group-item'>
                {$categoria->nombre} | {$categoria->id} | {$categoria->descripcion} 
                <a class='btn btn-danger btn-sm' href='eliminarCategoria/{$categoria->id}'>ELIMINAR</a> 
                <a class='btn btn-primary btn-sm' href='editarCategoria/{$categoria->id}'>Editar</a> 
        </li> 
    {/foreach}
</ul>

{* <table class="table ">
    <thead class="thead-dark">
        <tr class="">
            <th>nombre </th>
            <th>id</th>
            <th>Descripcion </th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr> 
    </thead>
    {foreach from=$categorias_s item=categoria}  
        <tr>
            <td>{{$categoria->nombre}</td>
            <td>{$categoria->id}</td>
            <td>{$categoria->descripcion}</td>
            <td><a class='btn btn-danger btn-sm' href='eliminarCategoria/{$categoria->id}'>ELIMINAR</a> </td>
            <td> <a class='btn btn-primary btn-sm' href='editarCategoria/{$categoria->id}'>Editar</a>  </td> 
        </tr>
    {/foreach}
</table> *}

{include file="templates/footer.tpl"}