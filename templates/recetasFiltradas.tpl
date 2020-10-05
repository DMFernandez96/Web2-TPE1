{include "templates/header.tpl"}
<h2 class="mt-2"> {$titulo_s} </h2>
<div class='list-group'>    
    {* <ul class="list-group mt-5"> *}
      {foreach from=$recetas item=receta}
             
          {*   <li>{$receta->nombre} 
            <a class='btn btn-info' href='detalles/{$receta->id}'>Ver</a> *}
            <a href="detalles/{$receta->id}" class="list-group-item list-group-item-action text-center">{$receta->nombre}</a>
            {* </li>  *}            
                                   
      {/foreach}
   {*  </ul> *}
</div>

{include file="templates/footer.tpl"}

