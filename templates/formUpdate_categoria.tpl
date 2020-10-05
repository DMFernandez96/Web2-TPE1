
{include 'header.tpl'}
    <div class="formulario col-md-8">
        <h1>Editar receta</h1>
        <!-- formulario de alta de receta -->
        <form action="actualizarCategoria/{$categoria_s->id}" method="POST" class="my-4">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Nuevo nombre</label>
                        <input name="nombreActualizado" type="text" class="form-control" value="{$categoria_s->nombre}">
                        
                    </div>
                </div>

                <!-- input ingredientes -->
                <div class="col-4">
                    <div class="form-group">
                        <label>Nueva descripcion</label>
                        <input name="descripcionActualizado" type="text" class="form-control" value="{$categoria_s->descripcion}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"> Editar!</button>
            <a class="ml-2" href="adminCategorias">Volver</a>
        </form>
    </div>

{include 'footer.tpl'}