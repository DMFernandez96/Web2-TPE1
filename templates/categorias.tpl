 
{include file="templates/header.tpl"}

    <div class="row d-flex justify-content-between">
        <p class="mt-5 h5 p-categorias">Estas son todas las recetas que encontrarás en nuestro sitio. He aqui un listado de todas ellas agrupadas según su correspondiente categoria: </p>
        <div class="col-8">
            <h3><em>Listado de categorias</em></h3>
            <ul class='list-group mt-2'>
                {foreach from=$categorias_s  item=categoria} 
                    <li class='list-group-item d-flex justify-content-between'>
                        {$categoria->nombre} 
                        <a class='btn btn-primary btn-sm ' href='listarRecetas/{$categoria->id}'> Ver Recetas de esta categoria</a> 
                    </li> 
                {/foreach}
            </ul>
        </div>

        <div class="col-4 mt-4">
        <div id="carouselExampleControls" class="carousel slide " data-ride="carousel" data-interval="1800">
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <img src="./img/pasta.jpg" class="d-block w-100" alt="Pasta">
                </div>
                <div class="carousel-item">
                    <img src="./img/muffins.png" class="d-block w-100" alt="Muffins">
                </div>
                <div class="carousel-item">
                    <img src="./img/soup2.jpg" class="d-block w-100" alt="Sopa">
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
    </div>

{include file="templates/footer.tpl"}