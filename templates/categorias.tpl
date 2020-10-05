 
{include file="templates/header.tpl"}

    <div class="row">
     <p class="mt-5 h5">Estas son todas las recetas que encontrarás en nuestro sitio. He aqui un listado de todas ellas agrupadas según su correspondiente categoria: </p>
        
        <div class="col-4">
       <h3><em>Listado de categorias</em></h3>
        <ul class='list-group mt-2'>
        {foreach from=$categorias_s  item=categoria} 
            <li class='list-group-item'>
                {$categoria->nombre} 
                <a class='btn btn-primary btn-sm' href='listarRecetas/{$categoria->id}'> Ver Recetas de esta categoria</a> 
            </li> 
        {/foreach}
        </ul>
        </div>
        <div class="col-8">
           {*  {include 'templates/recetasDeCategoria.tpl'} *}
        </div>
    </div>

{include file="templates/footer.tpl"}