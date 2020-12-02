{include 'header.tpl'}
<div class="formulario   mt-5">
    <h1>Editar receta</h1>
    <!-- formulario de alta de receta -->
    <div class="row">
        <div class="col-8 ml-0">
            <form action="actualizarReceta/{$receta_s->id}" method="POST" class="my-4 " enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input name="nombreActualizado" type="text" class="form-control" value="{$receta_s->nombre}">
                        </div>
                    </div>
                
                    <!-- input calorias -->
                    <div class="col-4">
                        <div class="form-group">
                            <label>Calorias</label>
                            <input name="caloriasActualizado" type="number" class="form-control" value="{$receta_s->calorias}">
                        </div>
                    </div>
                    <!-- input ingredientes -->
                    <div class="col-6">
                        <div class="form-group">
                            <label>Ingredientes</label>
                            <textarea class="form-control" name="ingredientesActualizado" rows="4" >{$receta_s->ingredientes}</textarea>
                        </div>
                    </div>
                    <!-- input id categoria -->
                    <div class="col-4">
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="categoriaActualizado" class="form-control" required>
                                {foreach from=$categorias_s item=categoria}
                                    <option value="{$categoria->id}">{$categoria->nombre}</option>
                                {/foreach}
                            
                            </select>
                        </div>
                    </div>
                    <!-- input instrucciones -->
                    <div class="col-8">
                        <div class="form-group">
                            <label>Instrucciones</label>
                            <textarea class="form-control" name="instruccionesActualizado" rows="6" >{$receta_s->instrucciones}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="imageToUpdate">Imagen</label>
                            <input type="file" name="input_name" id="imageToUpdate">
                        </div>
                    </div>
                
                </div>
                <button type="submit" class="btn btn-primary">Editar!</button>
                <a class="ml-2" href="adminRecetas">Volver</a>
            </form>
        </div>
        {if $receta_s->imagen}
            <div class="col-4 text-center h-auto">
                <div class=" p-4 containerBtnBorrar rounded-lg shadow">
                    <h1 class="text-center">Eliminar Imagen</h1>
                    <a class='btn btn-danger btn-sm shadow' href='eliminarImgReceta/{$receta_s->id}'>ELIMINAR Imagen</a>
                </div>
            </div>
        {/if}
    </div>
</div>
{include 'footer.tpl'}
