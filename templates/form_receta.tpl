<div class="formulario col-6">
    <h1>Agregar receta</h1>
    <!-- formulario de alta de receta -->
    <form action="insertarReceta" method="POST" class="my-4">
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label>Nombre</label>
                    <input name="nombre" type="text" class="form-control">
                </div>
            </div>

            <!-- input ingredientes -->
            <div class="col-10">
                <div class="form-group">
                    <label>Ingredientes</label>
                    <input name="ingredientes" type="text" class="form-control">
                </div>
            </div>

            <!-- input calorias -->
            <div class="col-10">
                <div class="form-group">
                    <label for="calorias">Calorias</label>
                    <input name="calorias" type="number" class="form-control">
                </div>
            </div>
            <!-- input instrucciones -->
            <div class="col-10">
                <div class="form-group">
                    <label for="instrucciones">Instrucciones</label>
                    <textarea class="form-control" name="instrucciones" rows="4"></textarea>
                </div>
            </div>
            <!-- input id categoria -->
            <div class="col-10">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                     <select name="categoria" class="form-control" required>
                        {foreach from=$categorias_s item=categoria}
                            <option value="{$categoria->id}">{$categoria->nombre}</option>
                        {/foreach}
                    
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar!</button>
    </form>
</div>
