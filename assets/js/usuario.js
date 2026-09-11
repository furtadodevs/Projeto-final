
const formulario =
    document.getElementById(
        "formUsuario"
    );

const mensagem =
    document.getElementById(
        "mensagemUsuario"
    );

formulario.addEventListener(
    "submit",
    async function (event) {

        event.preventDefault();

        const resposta =
            await fetch(
                "controllers/UsuarioController.php",
                {
                    method: "POST",
                    body: new FormData(formulario)
                }
            );

        const resultado =
            await resposta.json();

        mensagem.classList.remove(
            "d-none",
            "alert-success",
            "alert-danger"
        );

        if (resultado.sucesso) {

            mensagem.classList.add(
                "alert-success"
            );

            mensagem.textContent =
                resultado.mensagem;

            formulario.reset();

            setTimeout(
                function () {
                    window.location.href =
                        "login.php";
                },
                1000
            );

        } else {

            mensagem.classList.add(
                "alert-danger"
            );

            mensagem.textContent =
                resultado.mensagem;
        }
    }
);
