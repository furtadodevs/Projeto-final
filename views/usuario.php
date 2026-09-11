<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar usuário</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <main class="container py-5">

        <div class="card mx-auto p-4" style="max-'width: 500px;">

            <h2 class="mb-4">
                Criar usuário
            </h2>

            <form id="formUsuario">

                <input
                    type="hidden"
                    name="acao"
                    value="cadastrar">

                <div class="mb-3">

                    <label class="form-label">
                        Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Senha
                    </label>

                    <input
                        type="password"
                        name="senha"
                        class="form-control">

                </div>

                <button
                    class="btn btn-primary"
                    type="submit">

                    Cadastrar

                </button>

                <a
                    href="login.php"
                    class="btn btn-outline-secondary">

                    Voltar

                </a>

            </form>

            <div
                id="mensagemUsuario"
                class="alert d-none mt-3">
            </div>

        </div>

    </main>

        <!-- Script da página -->
        <script src="assets/js/usuario.js"></script>

</body>
</html>
