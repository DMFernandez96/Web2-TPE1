{literal}

<section id="app">
    <table v-if="comentarios !=0" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Comentario</th>
                <th scope="col">Puntacion</th>

                <th v-if="isAdmin == 1" scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="comentario in comentarios">
                <td>{{comentario.mail}}</td>
                <td>{{ comentario.cuerpo }}</td>
                <td>{{ comentario.puntuacion }}</td>
                <td v-if="isAdmin == 1"><button :id="comentario.id" v-on:click="deleteComentario(comentario.id)" class="btn btn-danger">Borrar </button></td>
            </tr>
        </tbody>
    </table>
</section>
{/literal}