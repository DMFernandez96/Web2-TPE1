{* <div class="row"> *}

  <h2 class="mb-4"> ¿Qué te pareció la receta? </h3>
        <form id="comentarios-form" action="" method="POST">
            <div class="row">
            {if isset($smarty.session.EMAIL_USER)}
                <input type="hidden" id="IdUsuario" name="idUsuario" value={$smarty.session.ID_USER}/>
                <input type="number" id="usuarioIsAdmin" name="usuarioIsAdmin" value="{$smarty.session.ADMIN_USER}" hidden/>
            {else}
                <input type="number" id="usuarioIsAdmin" name="usuarioIsAdmin" value="0" hidden/>
            {/if}
                <input type="hidden" id="idReceta" name="idReceta" value={$idReceta_s}/>
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
                    {if isset($smarty.session.EMAIL_USER)}
                        <button type="submit" class="btn btn-primary mb-2" >Comentar!</button>
                   {else}
                        <a class="nav-link mt-0 p-0" href="adminRecetas">Ingresar para comentar!</a>
                    {/if}
                </div>
            </div>
    </form>

    <div>
        {include file="vue/comentarios.vue"}
    </div>

{* </div> *}