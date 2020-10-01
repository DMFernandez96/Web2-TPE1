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
                    <label>Calorias</label>
                    <input name="calorias" type="number" class="form-control">
                </div>
            </div>
            <!-- input instrucciones -->
            <div class="col-9">
                <div class="form-group">
                    <label>Instrucciones</label>
                    <input name="instrucciones" type="text" class="form-control">
                </div>
            </div>
            <!-- input id categoria -->
            <div class="col-9">
                <div class="form-group">
                    <label>Categoria</label>
                    <input name="categoria" type="number" class="form-control">
                </div>
            </div>

        </div>


        <button type="submit" class="btn btn-primary">Guardar!</button>
    </form>
</div>
