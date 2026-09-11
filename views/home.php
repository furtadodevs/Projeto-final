<div class="container home-container">

    <!-- CSS da página -->
    <link rel="stylesheet" href="assets/css/home.css">



    <!-- ==============================
     MENSAGEM DE BOAS-VINDAS
     ============================== -->

    <div class="home-header mb-5">

        <div class="header-icon">

            <i class="bi bi-hand-wave"></i>

        </div>

        <div>

            <h2>
                Olá,<?= htmlspecialchars($_SESSION["usuario_nome"]) ?> 👋
            </h2>

            <p>
                O que você está procurando hoje?
            </p>

        </div>

    </div>

    <!-- ==============================
         AÇÕES
         ============================== -->

    <div class="d-flex justify-content-end mb-4">

        <a
            href="index.php?page=eventos"
            class="btn btn-primary">

            <i class="bi bi-plus-lg me-1"></i>

            Cadastrar evento

        </a>

    </div>


    <!-- ==============================
         EVENTOS
         ============================== -->

    <div class="row g-4">


        <!-- EVENTO 1 -->

        <div class="col-md-6 col-lg-4">

            <div class="card cadastro-card h-100">

                <img
                    src="https://picsum.photos/600/350?random=10"
                    class="card-img-top evento-imagem"
                    alt="Imagem do evento">

                <div class="card-body">

                    <div class="evento-categoria">

                        <i class="bi bi-tag"></i>

                        Música

                    </div>

                    <h5 class="card-title">

                        Festival de Música

                    </h5>

                    <p class="card-text">

                        Evento musical com apresentações de artistas
                        e atrações especiais.

                    </p>


                    <div class="evento-info">

                        <div>

                            <i class="bi bi-calendar3"></i>

                            20/09/2026

                        </div>

                        <div>

                            <i class="bi bi-clock"></i>

                            19:00

                        </div>

                        <div>

                            <i class="bi bi-geo-alt"></i>

                            Contagem - MG

                        </div>

                    </div>


                    <div class="mt-4">

                        <a
                            href="#"
                            class="btn btn-primary w-100">

                            <i class="bi bi-eye me-1"></i>

                            Ver evento

                        </a>

                    </div>

                </div>

            </div>

        </div>



        <!-- EVENTO 2 -->

        <div class="col-md-6 col-lg-4">

            <div class="card cadastro-card h-100">

                <img
                    src="https://picsum.photos/600/350?random=11"
                    class="card-img-top evento-imagem"
                    alt="Imagem do evento">

                <div class="card-body">

                    <div class="evento-categoria">

                        <i class="bi bi-tag"></i>

                        Cultura

                    </div>

                    <h5 class="card-title">

                        Feira Cultural

                    </h5>

                    <p class="card-text">

                        Feira com apresentações culturais,
                        gastronomia e artesanato.

                    </p>


                    <div class="evento-info">

                        <div>

                            <i class="bi bi-calendar3"></i>

                            25/09/2026

                        </div>

                        <div>

                            <i class="bi bi-clock"></i>

                            14:00

                        </div>

                        <div>

                            <i class="bi bi-geo-alt"></i>

                            Contagem - MG

                        </div>

                    </div>


                    <div class="mt-4">

                        <a
                            href="#"
                            class="btn btn-primary w-100">

                            <i class="bi bi-eye me-1"></i>

                            Ver evento

                        </a>

                    </div>

                </div>

            </div>

        </div>



        <!-- EVENTO 3 -->

        <div class="col-md-6 col-lg-4">

            <div class="card cadastro-card h-100">

                <img
                    src="https://picsum.photos/600/350?random=12"
                    class="card-img-top evento-imagem"
                    alt="Imagem do evento">

                <div class="card-body">

                    <div class="evento-categoria">

                        <i class="bi bi-tag"></i>

                        Tecnologia

                    </div>

                    <h5 class="card-title">

                        Encontro de Tecnologia

                    </h5>

                    <p class="card-text">

                        Palestras e atividades sobre tecnologia,
                        inovação e desenvolvimento.

                    </p>


                    <div class="evento-info">

                        <div>

                            <i class="bi bi-calendar3"></i>

                            03/10/2026

                        </div>

                        <div>

                            <i class="bi bi-clock"></i>

                            18:30

                        </div>

                        <div>

                            <i class="bi bi-geo-alt"></i>

                            Contagem - MG

                        </div>

                    </div>


                    <div class="mt-4">

                        <a
                            href="#"
                            class="btn btn-primary w-100">

                            <i class="bi bi-eye me-1"></i>

                            Ver evento

                        </a>

                    </div>

                </div>

            </div>

        </div>


    </div>


</div>