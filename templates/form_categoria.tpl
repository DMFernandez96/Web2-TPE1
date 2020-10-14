
    <div class="formulario col-4">
        <h1>Agregar categoria</h1>
        <!-- formulario de alta de categoria -->
        <form action="insertarCategoria" method="POST" class="my-4">
            <div class="row">
                <div class="col-10">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input name="nombre" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input name="descripcion" type="text" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar!</button>
        </form>
    </div>
