{include file="templates/header.tpl"}

{include file="templates/adminTab.tpl"}
{* {include file="templates/form_receta.tpl"} *}

<div class="formulario col-md-8">
    <h1>Agregar receta</h1>
    <!-- formulario de alta de receta -->
    <form action="insertarReceta" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Nombre</label>
                    <input name="nombre" type="text" class="form-control">
                </div>
            </div>

            <!-- input ingredientes -->
            <div class="col-9">
                <div class="form-group">
                    <label>Ingredientes</label>
                    <input name="ingredientes" type="text" class="form-control">
                </div>
            </div>

            <!-- input calorias -->
            <div class="col-9">
                <div class="form-group">
                    <label for="calorias">Calorias</label>
                    <input name="calorias" type="number" class="form-control">
                </div>
            </div>
            <!-- input instrucciones -->
            <div class="col-9">
                <div class="form-group">
                    <label for="instrucciones">Instrucciones</label>
                    <input name="instrucciones" type="text" class="form-control">
                </div>
            </div>
            <!-- input id categoria -->
            <div class="col-9">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input name="categoria" type="number" class="form-control">
                    {* <select name="categoria">
                        {foreach from=$categorias_s item=categ}
                            <option>{$categ->nombre}</option> 
                        {/foreach}
                    </select> *}
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar!</button>
    </form>
</div>

<div class="row">

    <h3> Recetas</h3>
    <table class="table ">
        <thead class="thead-dark">
            <tr class="">
                <th>nombre </th>
                <th>categoria </th>
                <th>calorias</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr> 
        </thead>
        {foreach from=$recetas_s item=receta}  
            <tr>
                <td>{$receta->nombre}</td>
                <td>{$receta->categoria}</td>
                <td>{$receta->calorias}</td>
                <td><a class='btn btn-danger btn-sm' href='eliminarReceta/{$receta->id}'>ELIMINAR</a></td>
            <td> <a class='btn btn-primary btn-sm' href='editarReceta/{$receta->id}'>Editar</a> </td> 
            </tr>
        {/foreach}
    </table>
</div>

{include file="templates/footer.tpl"}