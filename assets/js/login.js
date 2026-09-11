// LOGIN USANDO JQUERY

$(document).ready(function () {

    // Configura a validação do formulário
    validarFormulario();

});


function validarFormulario() {

    // Seleciona a div responsável pelas mensagens
    const mensagem = document.getElementById("mensagem");


    // Configura o jQuery Validation
    $("#formLogin").validate({

        // Regras de validação
        rules: {

            email: {
                required: true,
                email: true
            },

            senha: {
                required: true,
                minlength: 6
            }

        },


        // Mensagens em português
        messages: {

            email: {
                required: "Informe o e-mail.",
                email: "Informe um e-mail válido."
            },

            senha: {
                required: "Informe a senha.",
                minlength: "A senha deve possuir no mínimo 6 caracteres."
            }

        },


        // Mensagens de erro
        errorPlacement: function (error, element) {

            element
                .closest(".mb-3")
                .find(".invalid-feedback")
                .text(error.text());

        },


        // Campo inválido
        highlight: function (element) {

            $(element)
                .removeClass("is-valid")
                .addClass("is-invalid");

        },


        // Campo válido
        unhighlight: function (element) {

            $(element)
                .removeClass("is-invalid")
                .addClass("is-valid");

        },


        // Executado quando o formulário estiver válido
        submitHandler: function (formulario) {

            realizarLogin(formulario, mensagem);

            // Impede o envio tradicional do formulário
            return false;

        }

    });

}


// =========================================
// REALIZA O LOGIN
// =========================================

async function realizarLogin(
    formulario,
    mensagem
) {

    // Captura os dados
    const dados =
        new FormData(formulario);


    // Mostra os dados no console
    console.table(
        Object.fromEntries(
            dados.entries()
        )
    );


    // Exibe mensagem
    mensagem.className =
        "alert alert-info mt-3";

    mensagem.textContent =
        "Verificando dados...";


    try {

        // Envia os dados para o Controller
        const resposta =
            await fetch(
                "controllers/LoginController.php",
                {
                    method: "POST",
                    body: dados
                }
            );


        // Converte a resposta para JSON
        const resultado =
            await resposta.json();


        // Mostra a resposta do Controller
        console.log(
            "Resposta do Controller:",
            resultado
        );


        // Login realizado com sucesso
        if (
            resposta.ok
            &&
            resultado.sucesso === true
        ) {

            mensagem.className =
                "alert alert-success mt-3";

            mensagem.textContent =
                resultado.mensagem;


            // Redireciona para a HOME
            setTimeout(function () {

                window.location.href =
                    "index.php?page=home";

            }, 1000);

        } else {

            // Login inválido
            mensagem.className =
                "alert alert-danger mt-3";

            mensagem.textContent =
                resultado.mensagem
                ||
                "E-mail ou senha inválidos.";

        }


    } catch (erro) {

        console.error(
            "Erro no login:",
            erro
        );

        mensagem.className =
            "alert alert-danger mt-3";

        mensagem.textContent =
            "Erro ao realizar o login. Tente novamente.";

    }

}