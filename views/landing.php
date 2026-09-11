<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eventos | Sistema de Eventos </title>


    <!-- Bootstrap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">


    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Fonte Poppins -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <!-- CSS da página -->
    <link rel="stylesheet" href="assets/css/landing.css">

</head>


<body>


    <!-- =========================================
     CABEÇALHO
     ========================================= -->

    <header class="landing-header">

        <nav class="navbar">

            <div class="container">

                <div class="landing-nav">


                    <!-- Logo -->

                    <a
                        href="index.php?page=landing"
                        class="landing-logo">

                        <span class="logo-icon">
                            <i class="bi bi-calendar-event-fill"></i>
                        </span>

                        <span>
                            Sistema de Eventos
                        </span>

                    </a>


                    <!-- Botão Entrar -->

                    <a
                        href="index.php?page=login"
                        class="btn-login">

                        <i class="bi bi-box-arrow-in-right"></i>

                        Entrar

                    </a>


                    <!-- Botão Cadastrar -->

                    <a
                        href="index.php?page=cadastro"
                        class="btn-cadastrar">

                        <i class="bi bi-person-plus"></i>

                        Cadastrar

                    </a>

                </div>

            </div>

        </nav>

    </header>



    <!-- =========================================
     CONTEÚDO PRINCIPAL
     ========================================= -->

    <main class="eventos-main">


        <!-- =====================================
         PESQUISA
         ===================================== -->

        <section class="search-section">

            <div class="container">

                <div class="search-content">

                    <span class="search-label">
                        <i class="bi bi-stars"></i>
                        Encontre seu próximo evento
                    </span>

                    <h1>
                        Eventos para
                        <span>viver e aproveitar.</span>
                    </h1>

                    <p>
                        Encontre festas, shows, festivais e experiências
                        acontecendo perto de você.
                    </p>


                    <!-- Barra de pesquisa -->

                    <div class="event-search">

                        <i class="bi bi-search"></i>

                        <input
                            type="text"
                            placeholder="Pesquise eventos...">

                        <button type="button">

                            <i class="bi bi-search"></i>

                            Buscar

                        </button>

                    </div>

                </div>

            </div>

        </section>



        <!-- =====================================
         CARROSSEL
         ===================================== -->

        <section class="carousel-section">

            <div class="container">

                <div
                    id="carouselExample"
                    class="carousel slide event-carousel"
                    data-bs-ride="carousel">

                    <div class="carousel-inner">


                        <div class="carousel-item active">

                            <img
                                src="https://picsum.photos/1200/400?random=1"
                                class="d-block w-100"
                                alt="Imagem evento">

                            <div class="carousel-caption-custom">

                                <span>
                                    EVENTO EM DESTAQUE
                                </span>

                                <h2>
                                    Viva experiências incríveis
                                </h2>

                                <p>
                                    Descubra eventos que combinam com você.
                                </p>

                            </div>

                        </div>


                        <div class="carousel-item">

                            <img
                                src="https://picsum.photos/1200/400?random=2"
                                class="d-block w-100"
                                alt="Imagem evento">

                            <div class="carousel-caption-custom">

                                <span>
                                    FESTAS & SHOWS
                                </span>

                                <h2>
                                    Música para todos os momentos
                                </h2>

                                <p>
                                    Encontre seu próximo show.
                                </p>

                            </div>

                        </div>


                        <div class="carousel-item">

                            <img
                                src="https://picsum.photos/1200/400?random=3"
                                class="d-block w-100"
                                alt="Imagem evento">

                            <div class="carousel-caption-custom">

                                <span>
                                    EXPERIÊNCIAS
                                </span>

                                <h2>
                                    Tem sempre algo acontecendo
                                </h2>

                                <p>
                                    Explore os eventos disponíveis.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- Botão voltar -->

                    <button
                        class="carousel-control-prev"
                        type="button"
                        data-bs-target="#carouselExample"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon"></span>

                    </button>


                    <!-- Botão avançar -->

                    <button
                        class="carousel-control-next"
                        type="button"
                        data-bs-target="#carouselExample"
                        data-bs-slide="next">

                        <span class="carousel-control-next-icon"></span>

                    </button>

                </div>

            </div>

        </section>



        <!-- =====================================
         EVENTOS EM DESTAQUE
         ===================================== -->

        <section class="events-section">

            <div class="container">


                <div class="section-heading">

                    <div>

                        <span>  EVENTOS </span>

                        <h2>
                            Eventos em destaque
                        </h2>

                        <p>
                            Confira algumas experiências que estão esperando por você.
                        </p>

                    </div>

                </div>


                <!-- Cards -->

                <div class="row g-4">


                    <!-- Evento 1 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=4"
                                    alt="Evento 1">

                                <span class="event-category">
                                    Música
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    20 AGO 2026
                                </span>

                                <h5>
                                    Evento 1
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 2 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=5"
                                    alt="Evento 2">

                                <span class="event-category">
                                    Cultura
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    22 AGO 2026
                                </span>

                                <h5>
                                    Evento 2
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 3 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=6"
                                    alt="Evento 3">

                                <span class="event-category">
                                    Festival
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    25 AGO 2026
                                </span>

                                <h5>
                                    Evento 3
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 4 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=7"
                                    alt="Evento 4">

                                <span class="event-category">
                                    Entretenimento
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    28 AGO 2026
                                </span>

                                <h5>
                                    Evento 4
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- =====================================
         FESTAS, SHOWS E FESTIVAIS
         ===================================== -->

        <section class="category-section">

            <div class="container">


                <div class="section-heading">

                    <div>

                        <span>
                            CATEGORIAS
                        </span>

                        <h2>
                            Festas, shows e festivais
                        </h2>

                        <p>
                            Explore diferentes tipos de eventos.
                        </p>

                    </div>

                </div>


                <div class="row g-4">


                    <!-- Evento 5 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=8"
                                    alt="Evento 5">

                                <span class="event-category">
                                    Festa
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    30 AGO 2026
                                </span>

                                <h5>
                                    Evento 5
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 6 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=9"
                                    alt="Evento 6">

                                <span class="event-category">
                                    Show
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    02 SET 2026
                                </span>

                                <h5>
                                    Evento 6
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 7 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=10"
                                    alt="Evento 7">

                                <span class="event-category">
                                    Festival
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    05 SET 2026
                                </span>

                                <h5>
                                    Evento 7
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- Evento 8 -->

                    <div class="col-lg-3 col-md-6">

                        <div class="event-card">

                            <div class="event-image">

                                <img
                                    src="https://picsum.photos/400/250?random=11"
                                    alt="Evento 8">

                                <span class="event-category">
                                    Cultura
                                </span>

                            </div>


                            <div class="event-body">

                                <span class="event-date">
                                    <i class="bi bi-calendar3"></i>
                                    08 SET 2026
                                </span>

                                <h5>
                                    Evento 8
                                </h5>

                                <p>
                                    Descrição do evento.
                                </p>

                                <a href="#" class="event-link">

                                    Saiba mais

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>


                </div>

            </div>

        </section>


    </main>



    <!-- =========================================
     RODAPÉ
     ========================================= -->

    <footer class="landing-footer">

        <div class="container">

            <div class="footer-content">


                <div>

                    <strong>

                        <i class="bi bi-calendar-event-fill"></i>

                        Sistema de Eventos

                    </strong>

                    <p>
                        Encontre eventos e experiências em um só lugar.
                    </p>

                </div>


                <div>

                    <span>
                        Desenvolvido com PHP • MVC • Bootstrap
                    </span>

                </div>

            </div>

        </div>

    </footer>



    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>


</body>

</html>