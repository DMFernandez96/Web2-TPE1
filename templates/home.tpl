{include "header.tpl"}

<p class="mt-5 h3 p-home">Mirá todas las recetas que tenemos para vos. Las mejores comidas, entradas y postres explicadas paso a paso.  ¡Son ricas, prácticas y fáciles de hacer!</p>
<div class="mt-5">
    <blockquote class="blockquote text-center">
        <p class="mb-0">La cocina es un lenguaje mediante el cual se puede expresar armonía, felicidad, belleza, poesía, complejidad, magia, humor, provocación, cultura</p>
        <footer class="blockquote-footer">Chef <cite title="Ferran Adrià">Ferran Adrià</cite></footer>
    </blockquote>
</div> 

<div class="row">
    <div class="col-4 mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="1800">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="./img/matcha-mint.jpg" class="d-block w-100" alt="Coctel">
                </div>
                <div class="carousel-item">
                    <img src="./img/soup.jpg" class="d-block w-100" alt="Sopa">
                </div>
                <div class="carousel-item">
                    <img src="./img/hotcakes.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="col-8">
    {* <form action="buscar" method="POST">
        <input id="inputBuscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" >
        <button type="submit" class="btn btn-primary">Buscar!</button>
     </form> *}
        <h3 class="text-center mt-2">Recetas</h3>
        
            <table class="table table-responsive" id="tabla">
                <thead class="thead-dark">
                    <tr class="">
                        <th>nombre </th>
                        <th>categoria </th>
                        <th>calorias</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$recetas_s item=receta}  
                        <tr>
                            <td>{$receta->nombre}</td>
                            <td>{$receta->categoria}</td>
                            <td>{$receta->calorias}</td>
                            <td> <a class='btn btn-primary btn-sm' href='detalles/{$receta->id}'> VER DETALLES</a> </td> 
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
</div>
<script src="js/busquedaAvanzada.js"></script>
{include file="footer.tpl"}

