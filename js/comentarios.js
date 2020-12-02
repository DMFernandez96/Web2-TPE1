"use strict"

document.addEventListener("DOMContentLoaded", iniciarPag);

function iniciarPag() {

    const app = new Vue({
        el: "#app",
        data: { //variables de vue que quiero usar 
            comentarios: [], //esto es como un assign de smarty
            isAdmin: 0,
        },
        methods: {
            deleteComentario: function(id) {
                let url = 'api/comentarios/' + id;
                fetch(url, {
                    'method': 'DELETE'
                }).then(function(r) {
                    return r.json();
                }).then(function(json) { // o .then((json)=>{...})
                    console.log("Se eliminó correctamente el comentario");
                    getComentariosReceta(idReceta);
                }).catch((error) => {
                    console.log(error); //error de conexion
                });
            }

        }

    });
    let idReceta = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1);
    app.isAdmin = document.querySelector("#usuarioIsAdmin").value;

    document.querySelector('#comentarios-form').addEventListener('submit', e => {
        e.preventDefault(); //que no me mande el form
        addComentario();
    });
    getComentariosReceta(idReceta);

    async function getComentariosReceta(idReceta) {
        try {
            //buena practica si no se modif en toda la ejecucion hacer constante la variable.
            const response = await fetch(`api/comentarios/${idReceta}`); //devuelve un obj de js q da mas info de la rta.(nos sirve como desarrolladores)

            const comentarios = await response.json(); //la api devuelve JSON

            //imprimo los comentarios
            app.comentarios = comentarios;
        } catch (e) {
            console.log(e);
        }
    }

    async function addComentario() {
        //armo el comentario
        const comentario = {
            cuerpo: document.querySelector('input[name="cuerpo"]').value,
            puntuacion: document.querySelector('select[name="puntaje"]').value,
            id_receta: parseInt(document.querySelector('input[name=idReceta]').value),
            id_usuario: parseInt(document.querySelector('input[name=idUsuario]').value),
        };
        try {
            const response = await fetch('api/comentarios', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(comentario)
            });

            const r = await response.json();
            console.log(r);
            app.comentarios.push(r);

        } catch (e) {
            console.log(e);
        }
    }

}