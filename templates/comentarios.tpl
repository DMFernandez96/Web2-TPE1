{* <div class="row"> *}
    <h2 class="mb-4"> ¿Qué te pareció la receta? </h3>
    <form id="comentarios-form" method="POST">
        <div class="row">
            <div class="col-8">
                <input type="text" name="cuerpo" class="form-control" placeholder="Comentario">
            </div>
            <label for="puntaje">Puntaje de receta: </label>
            <div class="col form-group">
                <select class="col" class="form-control" name="puntaje" id="puntaje">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Comentar!</button>
            </div>
        </div>
</form>
<div {* class="row" *}>
    <ul class =" list-group mt-2" id="lista-comentarios">{* js lo va a llenar *}
    </ul>
</div>

{* </div> *}