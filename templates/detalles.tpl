{include 'templates/header.tpl'}

<h2 class="mt-5 mb-5 text-center"> {$receta_s->nombre|upper}</h2>
<div class="row mx-auto d-block"> {* muestra la imagen *}
    {if $receta_s->imagen != ''}
       <p> <img class="rounded mx-auto d-block" width="200px" src="{$receta_s->imagen}"> </p>
    {/if}
</div>
<div class="row"> 
    <div class="col-4 text-justify">  
        <h4> Calorias (por porción):</h4>
        <p> {$receta_s->calorias}</p>
        <h4> Categoria de receta:</h4>
        <p> {$receta_s->categoria}</p>
         <h4> Ingredientes:</h4>
        <p> {$receta_s->ingredientes} </p>
    </div>
    
    <div class="col-8 text-justify">
        <h4> Receta paso a paso:</h4>
        <p> {$receta_s->instrucciones} </p>
    </div>
</div>

<div class="row mt-2 border border-primary info-calorias mb-5">
    <h5> ¿Cómo calculo las calorías que necesito?</h5>
        <p> En general, la Organización Mundial de la Salud (OMS) establece un cálculo genérico: entre 1600 y 2000 calorías al día para las mujeres, y para los hombres entre 2000 y 2500. Pero para conocer nuestra necesidad energética de manera más exacta, tenemos que tener en cuenta dos factores: el metabolismo basal y nuestra actividad física.</p>
        <p><strong>Para los hombres:</strong> necesitan 1 caloría por kilo de peso y hora: kg x 1 x 24 </p> 
        <p><strong> Para las mujeres:</strong> necesitan 0,9 calorías por kilo de peso y hora: kg x 0,9 x 24</p>
         
</div>

{* {if $logueado_s}
    {include 'templates/form_alta_comentario.tpl'}
{/if} *}

{include 'templates/comentarios.tpl'}


<div class="row mt-4 mb-4 justify-content-center">
    <a href='home'>Volver al home</a>
</div>

{* incluyo js para CSR *}
<script src="js/comentarios.js"></script>
{include 'templates/footer.tpl'}