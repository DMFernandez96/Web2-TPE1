{include "templates/header.tpl"}
<div class="col-8">
  <h2 class="mt-2"> {$titulo_s} </h2>
  <div class='list-group'>    
      <ul class="list-group mt-2">
        {foreach from=$recetas item=receta}
              <a href="detalles/{$receta->id}" class="list-group-item list-group-item-action text-center">{$receta->nombre}</a>                    
        {/foreach}
      </ul>
  </div>
</div>

{include file="templates/footer.tpl"}

