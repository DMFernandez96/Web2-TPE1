{include file="templates/header.tpl"}
{include file="templates/adminTab.tpl"}

<div class="row">

    <div class="col-8 pr-0">
            <h3> Usuarios</h3>
            <table class="table table-responsive col-10 m-0  ">
                <thead class="thead-dark">
                    <tr class="">
                        <th class="text-center">Mail </th>
                        <th class="text-center">Es admin? </th>
                        <th class="text-center">Permisos admin</th>
                        <th class="text-center">Eliminar</th>
                    </tr> 
                </thead>
                {foreach from=$usuarios_s item=usuario}  
                    {if $usuario->mail !== $smarty.session.EMAIL_USER}
                        <tr class="bg-light">
                            <td>{$usuario->mail}</td>
                            {if $usuario->administrador == 1} 
                                <td class="text-center"> Si </td>
                            {else}
                                <td class="text-center"> No </td>
                            {/if}
                            <td>
                                {if $usuario->administrador == 0}
                                    <a class='btn btn-primary btn-sm center' href='addAdmin/{$usuario->id}'>Hacer Admin</a>  
                                {else}
                                    <a class='btn btn-primary btn-sm center' href='eliminarAdmin/{$usuario->id}'>Revocar permisos</a> 
                                {/if}
                            </td>
                            <td><a class='btn btn-danger btn-sm text-center' href='eliminarUsuario/{$usuario->id}'>ELIMINAR USUARIO</a></td>
                        </tr>
                    {/if}
                {/foreach}
            </table>
        </div>

        <div class="col-4 mt-5 pl-0">
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
</div>

{include file="templates/footer.tpl"}