{literal}
<!-- para q no genere conflicto con smarty -->
<!-- <section id="app">
    <ul class="list-group mt-2">
        <li v-for="comentario in comentarios" class="list-group-item d-flex justify-content-between">
            {{ comentario.cuerpo }} - Puntuación: {{ comentario.puntuacion }} - idReceta: {{comentario.id_receta}} -idUsuario: {{comentario.id_usuario}} - idComentario: {{comentario.id}}

            <button :id="comentario.id" class="btn btn-danger w-25 deleteComentario">Borrar </button> -->
<!-- v-bind:class="{admin: usuario.admin == 1}" -->
<!--         </li>

    </ul>
</section> -->

<section id="app">
    <table v-if="comentarios != 0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Comentario</th>
                <th scope="col">Puntacion</th>
                <th scope="col">idComentario</th>
                <th scope="col">idReceta</th>
                <th scope="col">idUsuario</th>
                <th v-if="isAdmin == 1" scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="comentario in comentarios">
                <td>{{ comentario.cuerpo }}</td>
                <td>{{ comentario.puntuacion }}</td>
                <td>{{comentario.id}}</td>
                <td>{{comentario.id_receta}}</td>
                <td>{{comentario.id_usuario}}</td>
                <td v-if="isAdmin == 1"><button :id="comentario.id" v-on:click="deleteComentario(comentario.id)" class="btn btn-danger">Borrar </button></td>
            </tr>
        </tbody>
    </table>
</section>
{/literal}