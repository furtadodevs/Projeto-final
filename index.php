<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


// Captura a página atual
$page = $_GET["page"] ?? "landing";


// Páginas que podem ser acessadas sem login
$paginasPublicas = [
    "landing",
    "login",
    "usuario"
];


// Se a página NÃO for pública,
// verifica se o usuário está logado
if (!in_array($page, $paginasPublicas)) {

    require __DIR__ . "/proteger.php";
}


// Landing e Login não mostram o menu interno
$paginaInicial = (
    $page === "landing"
    ||
    $page === "login"
    ||
    $page === "usuario"
);

?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Sistema de Eventos
    </title>


    <!-- Bootstrap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    >


    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >


    <!-- Fonte -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- CSS geral -->
    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>


<body>


    <?php if (!$paginaInicial): ?>


        <!-- ==============================
             NAVBAR
        ============================== -->

        <header class="navbar-sistema">

            <div class="container">

                <div class="navbar-content">


                    <!-- Logo -->

                    <a
                        href="index.php?page=home"
                        class="logo-sistema"
                    >

                        <i class="bi bi-grid-1x2-fill"></i>

                        <span>
                            Sistema de Eventos
                        </span>

                    </a>


                    <!-- Menu -->

                    <nav class="menu-sistema">


                        <!-- Home -->

                        <a
                            href="index.php?page=home"
                            class="<?= $page === 'home' ? 'active' : '' ?>"
                        >

                            <i class="bi bi-house"></i>

                            Home

                        </a>


                        <!-- Eventos -->

                        <a
                            href="index.php?page=eventos"
                            class="<?= $page === 'eventos' ? 'active' : '' ?>"
                        >

                            <i class="bi bi-box-seam"></i>

                            Eventos

                        </a>


                        <!-- Sair -->

                        <a
                            href="logout.php"
                            class="sair"
                        >

                            <i class="bi bi-box-arrow-right"></i>

                            Sair

                        </a>


                        <!-- Usuário logado -->

                        <div class="usuario-logado">

                            <img
                                src="https://i.pravatar.cc/45?img=12"
                                alt="Usuário"
                                class="usuario-foto"
                            >

                            <div class="usuario-info">

                                <strong>

                                    <?= htmlspecialchars(
                                        $_SESSION["usuario_nome"] ?? ""
                                    ) ?>

                                </strong>

                                <small>
                                    Administrador
                                </small>

                            </div>

                        </div>


                    </nav>

                </div>

            </div>

        </header>


    <?php endif; ?>


    <!-- ==============================
         CONTEÚDO
    ============================== -->

    <main class="<?= $paginaInicial ? '' : 'conteudo-sistema' ?>">


        <?php

        // Carrega as páginas através do routes.php
        require __DIR__ . "/routes.php";

        ?>


    </main>


    <?php if (!$paginaInicial): ?>


        <!-- ==============================
             FOOTER
        ============================== -->

        <footer class="footer-sistema">

            <p>
                Sistema de Eventos
            </p>

        </footer>


    <?php endif; ?>


    <!-- Bootstrap -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- Constantes -->

    <script src="config/constants.js"></script>


    <!-- Helpers -->

    <script src="libs/js/helpers.js"></script>


</body>

</html>