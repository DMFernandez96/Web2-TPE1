 {include file="templates/header.tpl"}

{include file="templates/adminTab.tpl"} 
{include 'templates/form_categoria.tpl'}

<h3> {$titulo_s}</h3>
{* rea la lista en la linea 13 poner el nombre que se corresponde con el nombre que esta en la bbdd *}
<ul class='list-group mt-2'>
    {foreach from=$categorias_s item=categoria}
        <li class='list-group-item'>
                {$categoria->nombre} | {$categoria->id} | {$categoria->descripcion} 
                <a class='btn btn-danger btn-sm' href='eliminarCategoria/{$categoria->id}'>ELIMINAR</a> 
                <a class='btn btn-primary btn-sm' href='editarCategoria/{$categoria->id}'>Editar</a> 
        </li> {* el link tiene forma de boton con esas clases de bootstrap *}
    {/foreach}
</ul>

{include file="templates/footer.tpl"}