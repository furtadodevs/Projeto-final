<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/evento.css">

<section class="evento-container">

    <div class="evento-card">

        <!-- =========================================
             CABEÇALHO
             ========================================= -->

        <div class="evento-header">

            <div class="evento-icon">
                <i class="bi bi-calendar-event"></i>
            </div>

            <div>
                <h2>Cadastro de evento</h2>

                <p>
                    Preencha os dados abaixo para publicar um novo evento.
                </p>
            </div>

        </div>


        <!-- =========================================
             FORMULÁRIO
             ========================================= -->

        <form id="formEvento">


            <!------------- CAMPOS OCULTOS ----------------------------->
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="acao" name="acao" value="cadastrar">
            <!-- ------------------------------------------------------->

            <div class="row g-4">


                <!-- =================================
                     TÍTULO
                     ================================= -->

                <div class="col-md-6">

                    <label for="titulo" class="form-label">
                        Título do evento
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-calendar-event"></i>
                        </span>

                        <input id="titulo" type="text" class="form-control" placeholder="Digite o título do evento">

                    </div>

                    <div class="invalid-feedback">
                        Digite o título do evento.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     CATEGORIA
                     ================================= -->

                <div class="col-md-6">

                    <label for="categoria" class="form-label">
                        Categoria
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-tags"></i>
                        </span>

                        <select id="categoria" name="categoria" class="form-select">

                            <option value="">
                                Escolha uma categoria
                            </option>

                            <option value="Música">
                                Música
                            </option>

                            <option value="Cultura">
                                Cultura
                            </option>

                        </select>

                    </div>

                    <div class="invalid-feedback">
                        Selecione uma categoria.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     DESCRIÇÃO
                     ================================= -->

                <div class="col-12">

                    <label for="descricao" class="form-label">
                        Descrição completa
                    </label>

                    <div class="input-group input-group-textarea">

                        <span class="input-group-text textarea-icon">
                            <i class="bi bi-card-text"></i>
                        </span>

                        <textarea id="descricao" class="form-control"
                            placeholder="Digite uma descrição completa do evento"></textarea>

                    </div>

                    <div class="invalid-feedback">
                        Digite uma descrição.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     IMAGEM
                     ================================= -->

                <div class="col-12">

                    <label for="imagem" class="form-label">
                        Imagem de capa
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-image"></i>
                        </span>

                        <input id="imagem" type="file" class="form-control" accept="image/*">

                    </div>

                    <div class="invalid-feedback">
                        Selecione uma imagem de capa.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     DATA
                     ================================= -->

                <div class="col-md-6">

                    <label for="data" class="form-label">
                        Data
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-calendar3"></i>
                        </span>

                        <input id="data" type="date" class="form-control">

                    </div>

                    <div class="invalid-feedback">
                        Informe a data do evento.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     HORÁRIO
                     ================================= -->

                <div class="col-md-6">

                    <label for="horario" class="form-label">
                        Horário
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-clock"></i>
                        </span>

                        <input id="horario" type="time" class="form-control">

                    </div>

                    <div class="invalid-feedback">
                        Informe o horário.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     LOCAL
                     ================================= -->

                <div class="col-md-6">

                    <label for="local" class="form-label">
                        Local do evento
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-geo-alt"></i>
                        </span>

                        <input id="local" type="text" class="form-control" placeholder="Ex.: Centro Cultural">

                    </div>

                    <div class="invalid-feedback">
                        Informe o local do evento.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     ENDEREÇO
                     ================================= -->

                <div class="col-md-6">

                    <label for="endereco" class="form-label">
                        Endereço
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-pin-map"></i>
                        </span>

                        <input id="endereco" type="text" class="form-control" placeholder="Digite o endereço">

                    </div>

                    <div class="invalid-feedback">
                        Informe o endereço.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     TELEFONE
                     ================================= -->

                <div class="col-md-4">

                    <label for="telefone" class="form-label">
                        Telefone
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-telephone"></i>
                        </span>

                        <input id="telefone" type="text" class="form-control" placeholder="(00) 00000-0000">

                    </div>

                    <div class="invalid-feedback">
                        Informe o telefone.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     EMAIL
                     ================================= -->

                <div class="col-md-4">

                    <label for="email" class="form-label">
                        E-mail
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input id="email" type="email" class="form-control" placeholder="email@exemplo.com">

                    </div>

                    <div class="invalid-feedback">
                        Digite um e-mail válido.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>


                <!-- =================================
                     SITE
                     ================================= -->

                <div class="col-md-4">

                    <label for="site" class="form-label">
                        Site
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            <i class="bi bi-globe"></i>
                        </span>

                        <input id="site"  name="site" type="text" class="form-control" placeholder="www.exemplo.com">

                    </div>

                    <div class="invalid-feedback">
                        Digite um site válido.
                    </div>

                    <div class="valid-feedback">
                    </div>

                </div>

            </div>


            <!-- =========================================
                 BOTÕES
                 ========================================= -->

            <div class="evento-actions">

                <button type="button" class="btn btn-cancelar">

                    <i class="bi bi-x-circle me-2"></i>

                    Cancelar

                </button>


                <button type="submit" class="btn evento-button" id="btnSalvarEvento">

                    <i class="bi bi-check-circle me-2"></i>

                    Publicar evento

                </button>

            </div>

        </form>


        <!-- =========================================
     TABELA DE EVENTOS CADASTRADOS
========================================= -->

        <div class="card-form mt-4">

            <h4 class="mb-4">
                Eventos cadastrados
            </h4>


            <div class="table-responsive">

                <table class="table table-striped table-hover align-middle">

                    <thead>

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Título
                            </th>

                            <th>
                                Categoria
                            </th>

                            <th>
                                Data
                            </th>

                            <th>
                                Horário
                            </th>

                            <th>
                                Local
                            </th>

                            <th>
                                E-mail
                            </th>

                            <th class="text-center">
                                Ações
                            </th>

                        </tr>

                    </thead>

                    <tbody id="tabelaEventos">

                    </tbody>

                </table>

            </div>

        </div>

        <!-- =========================================
     TOAST - MENSAGEM DE SUCESSO
     ========================================= -->

        <div class="toast-container position-fixed top-0 end-0 p-3">

            <div id="toastSucesso" class="toast" role="alert" aria-live="assertive" aria-atomic="true">

                <div class="toast-header">

                    <i class="bi bi-check-circle-fill text-success me-2"></i>

                    <strong class="me-auto">
                        Sucesso!
                    </strong>

                    <small>Agora</small>

                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>

                </div>

                <div class="toast-body">
                    Evento cadastrado com sucesso!
                </div>

            </div>

        </div>

        <!-- =========================================
             MENSAGEM
             ========================================= -->

        <div id="mensagem" class="alert d-none mt-3">
        </div>

    </div>

</section>


<!-- =========================================
     JQUERY
     ========================================= -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- =========================================
     JQUERY VALIDATION
     ========================================= -->

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>


<!-- =========================================
     JQUERY MASK
     ========================================= -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<!-- =========================================
     SCRIPT DA PÁGINA
     ========================================= -->

<script src="assets/js/evento.js"></script>