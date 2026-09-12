<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar usuário</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS da página -->
    <link rel="stylesheet" href="assets/css/usuario.css">

</head>

<body class="bg-light">

    <main class="container py-5">

        <div class="card mx-auto p-4" style="max-width: 500px;">

            <h2 class="mb-4">
                Criar usuário
            </h2>

            <form id="formUsuario">

                <input
                    type="hidden"
                    name="acao"
                    value="cadastrar">

                <!-- Nome -->
                <div class="mb-3">

                    <label for="nome" class="form-label">
                        Nome
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            class="form-control"
                            placeholder="Digite seu nome">

                    </div>

                </div>


                <!-- E-mail -->
                <div class="mb-3">

                    <label for="email" class="form-label">
                        E-mail
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="email@email.com">

                    </div>

                </div>


                <!-- Senha -->
                <div class="mb-3">

                    <label for="senha" class="form-label">
                        Senha
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            class="form-control"
                            placeholder="Digite sua senha">

                    </div>

                </div>
                <button
                    class="btn btn-primary"
                    type="submit">

                    Cadastrar

                </button>

                <a
                    href="index.php"
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