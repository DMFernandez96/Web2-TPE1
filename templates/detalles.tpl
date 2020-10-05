{include 'templates/header.tpl'}

<h2 class="mt-5 mb-5 text-center"> {$receta_s->nombre|upper}</h2>
<div class="row"> 
    <div class="col-4">  
        <h4> Calorias (por porción):</h4>
        <p> {$receta_s->calorias}</p>
        <h4> Categoria de receta:</h4>
        <p> {$receta_s->categoria}</p>
    </div>
    
    <div class="col-8">
        <h4> Receta paso a paso:</h4>
        <p> {$receta_s->instrucciones} </p>
    </div>
</div>
<div class="row mt-2 border border-primary">
    <h5> ¿Cómo calculo las calorías que necesito?</h5>
        <p> En general, la Organización Mundial de la Salud (OMS) establece un cálculo genérico: entre 1600 y 2000 calorías al día para las mujeres, y para los hombres entre 2000 y 2500. Pero para conocer nuestra necesidad energética de manera más exacta, tenemos que tener en cuenta dos factores: el metabolismo basal y nuestra actividad física.</p>
        <p><strong>Para los hombres:</strong> necesitan 1 caloría por kilo de peso y hora: kg x 1 x 24 </p> 
        <p><strong> Para las mujeres:</strong> necesitan 0,9 calorías por kilo de peso y hora: kg x 0,9 x 24</p>
        <a class='btn btn-info' href='home'>Volver</a> 
</div>

{include 'templates/footer.tpl'}