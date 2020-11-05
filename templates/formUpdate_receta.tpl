{include 'header.tpl'}
<div class="formulario col-md-10  mt-5">
    <h1>Editar receta</h1>
    <!-- formulario de alta de receta -->
    <form action="actualizarReceta/{$receta_s->id}" method="POST" class="my-4">
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
            
           
        </div>
        <button type="submit" class="btn btn-primary">Editar!</button>
        <a class="ml-2" href="adminRecetas">Volver</a>
    </form>
</div>
{include 'footer.tpl'}
