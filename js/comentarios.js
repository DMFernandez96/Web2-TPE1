"use strict"
const app = new Vue({
    el: "",
    data: {
        comentarios: [] //esto es como un assing de smarty
    }
});

document.addEventListener("DOMContentLoaded", iniciarPag);

function iniciarPag() {

    document.querySelector('#comentarios-form').addEventListener('submit', e => {
        e.preventDefault(); //que no me mande el form
        addComentario();
    });

    getComentarios(); //carga los comentarios

    async function getComentarios() {
        try {
            //buena practica si no se modif en toda la ejecucion hacer constante la variable.
            const response = await fetch('api/comentarios/'); //devuelve un obj de js q da mas info de la rta.(nos sirve como desarrolladores)

            const comentarios = await response.json(); //la api devuelve JSON

            //imprimo los comentarios
            cargarComentarios(comentarios);
        } catch (e) {
            console.log(e);
        }

    }

    async function addComentario() {
        //armo el comentario
        const comentario = {
            cuerpo: document.querySelector('input[name="cuerpo"').value,
            puntuacion: document.querySelector('select[name="puntaje"').value,
            id_receta: 32,
            id_usuario: 2
        };
        try {
            const response = await fetch('api/comentarios', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comentario)
            });

            //const r = response.json();
            getComentarios();

        } catch (e) {
            console.log(e);
        }
    }

    function cargarComentarios(comentarios) {
        const container = document.querySelector('#lista-comentarios');
        container.innerHTML = '';

        for (let comentario of comentarios) {
            container.innerHTML += `<li class="list-group-item d-flex justify-content-between"> ${comentario.cuerpo} - Puntuación: ${comentario.puntuacion} </li>`;
        }

    }





}