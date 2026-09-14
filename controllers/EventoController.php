<?php

// =========================================
// 1. INICIA A SESSÃO
// =========================================

session_start();


// =========================================
// 2. DEFINE A RESPOSTA COMO JSON
// =========================================

header(
    "Content-Type: application/json; charset=utf-8"
);


// =========================================
// 3. VERIFICA SE O USUÁRIO ESTÁ LOGADO
// =========================================

if (!isset($_SESSION["usuario_id"])) {

    http_response_code(401);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Usuário não autenticado.",
        "dados" => null,
        "erros" => null
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// =========================================
// 4. CARREGA OS ARQUIVOS NECESSÁRIOS
// =========================================

require __DIR__ . "/../config/database.php";
require __DIR__ . "/../models/EventoModel.php";
require __DIR__ . "/../models/LogModel.php";
require __DIR__ . "/../libs/php/Validator.php";


// =========================================
// 5. CONECTA AO BANCO DE DADOS
// =========================================

$pdo = conectarBanco();


// =========================================
// 6. DESCOBRE A AÇÃO SOLICITADA
// =========================================

$acao = $_POST["acao"]  ??  $_GET["acao"]   ?? "listar";


// =========================================
// 7. DECIDE QUAL OPERAÇÃO EXECUTAR
// =========================================

switch ($acao) {


    // =====================================
    // LISTAR EVENTOS
    // =====================================

    case "listar":

        $eventos = listarEventos($pdo);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Eventos listados com sucesso.",
            "dados" => $eventos
        ], JSON_UNESCAPED_UNICODE);

        break;


    // =====================================
    // BUSCAR UM EVENTO
    // =====================================

    case "buscar":

        $id =
            $_GET["id"]
            ?? "";

        if ($id === "") {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Informe o evento.",
                "dados" => null
            ], JSON_UNESCAPED_UNICODE);

            break;
        }


        $evento =
            buscarEvento(
                $pdo,
                $id
            );


        if (!$evento) {

            http_response_code(404);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Evento não encontrado.",
                "dados" => null
            ], JSON_UNESCAPED_UNICODE);

            break;
        }


        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Evento encontrado.",
            "dados" => $evento
        ], JSON_UNESCAPED_UNICODE);

        break;


    // =====================================
    // CADASTRAR EVENTO
    // =====================================

    case "cadastrar":

        // Cria o Validator somente para
        // os dados enviados por POST
        $validator =
            new Validator($_POST);


        // Valida os campos do formulário
        validarEvento($validator);
      
        // Verifica os erros dos campos
        if ($validator->fails()) {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Corrija os campos indicados.",
                "erros" => $validator->errors()
            ], JSON_UNESCAPED_UNICODE);

            break;  
        }

        // Cadastra o evento
        $dados = $_POST;
        $idEvento =
            cadastrarEvento(
                $pdo,
                $dados
            );


        // Registra a ação no log
        registrarLog(
            $pdo,
            $_SESSION["usuario_id"],
            "CADASTROU",
            $idEvento
        );


        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Evento cadastrado com sucesso.",
            "dados" => [
                "id" => $idEvento
            ]
        ], JSON_UNESCAPED_UNICODE);

        break;


    // =====================================
    // EDITAR EVENTO
    // =====================================

    case "editar":

        // Valida se o ID foi enviado
        if (
            !isset($_POST["id"])
            ||
            $_POST["id"] === ""
        ) {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Informe o evento que será editado.",
                "dados" => null
            ], JSON_UNESCAPED_UNICODE);

            break;
        }


        // Cria o Validator
        $validator =
            new Validator($_POST);


        // Valida os campos do formulário
        validarEvento($validator);


        // Verifica erros dos campos
        if ($validator->fails()) {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Corrija os campos indicados.",
                "erros" => $validator->errors()
            ], JSON_UNESCAPED_UNICODE);

            break;
        }


        // Copia os dados recebidos
        $dados =
            $_POST;

        // Atualiza o evento
        editarEvento(
            $pdo,
            $dados
        );


        // Registra a edição
        registrarLog(
            $pdo,
            $_SESSION["usuario_id"],
            "EDITOU",
            $_POST["id"]
        );


        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Evento atualizado com sucesso.",
            "dados" => null
        ], JSON_UNESCAPED_UNICODE);

        break;


    // =====================================
    // EXCLUIR EVENTO
    // =====================================

    case "excluir":

        $id =
            $_POST["id"]
            ?? "";


        if ($id === "") {

            http_response_code(422);

            echo json_encode([
                "sucesso" => false,
                "mensagem" => "Informe o evento que será excluído.",
                "dados" => null
            ], JSON_UNESCAPED_UNICODE);

            break;
        }


        /*
         * Registra antes de excluir.
         *
         * Isso evita problema com a chave
         * estrangeira da tabela de logs.
         */
        registrarLog(
            $pdo,
            $_SESSION["usuario_id"],
            "EXCLUIU",
            $id
        );


        // Exclui o evento
        excluirEvento(
            $pdo,
            $id
        );


        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Evento excluído com sucesso.",
            "dados" => null
        ], JSON_UNESCAPED_UNICODE);

        break;


    // =====================================
    // AÇÃO INVÁLIDA
    // =====================================

    default:

        http_response_code(400);

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Ação inválida.",
            "dados" => null
        ], JSON_UNESCAPED_UNICODE);

        break;
}


// Finaliza o Controller
exit;


// =========================================
// 8. VALIDA OS CAMPOS DO EVENTO
// =========================================

function validarEvento($validator)
{

    // =====================================
    // TÍTULO
    // =====================================

    $validator->required(
        "titulo",
        "Informe o título do evento."
    );

    $validator->string(
        "titulo",
        "O título deve ser um texto."
    );

    $validator->minLength(
        "titulo",
        3,
        "O título deve ter pelo menos 3 caracteres."
    );

    $validator->maxLength(
        "titulo",
        100,
        "O título deve ter no máximo 100 caracteres."
    );


    // =====================================
    // CATEGORIA
    // =====================================

    $validator->required(
        "categoria",
        "Selecione uma categoria."
    );

    $validator->in(
        "categoria",
        [
            "Música",
            "Cultura"
        ],
        "Selecione uma categoria válida."
    );


    // =====================================
    // DESCRIÇÃO
    // =====================================

    $validator->required(
        "descricao",
        "Informe a descrição do evento."
    );

    $validator->string(
        "descricao",
        "A descrição deve ser um texto."
    );

    $validator->minLength(
        "descricao",
        10,
        "A descrição deve ter pelo menos 10 caracteres."
    );

    $validator->maxLength(
        "descricao",
        2000,
        "A descrição deve ter no máximo 2000 caracteres."
    );


    // =====================================
    // DATA
    // =====================================

    $validator->required(
        "data",
        "Informe a data do evento."
    );

    $validator->regex(
        "data",
        "/^\d{4}-\d{2}-\d{2}$/",
        "Informe uma data válida."
    );


    // =====================================
    // HORÁRIO
    // =====================================

    $validator->required(
        "horario",
        "Informe o horário do evento."
    );

    $validator->regex(
        "horario",
        "/^(?:[01]\d|2[0-3]):[0-5]\d$/",
        "Informe um horário válido."
    );




    // =====================================
    // ENDEREÇO
    // =====================================

    $validator->required(
        "endereco",
        "Informe o endereço do evento."
    );

    $validator->string(
        "endereco",
        "O endereço deve ser um texto."
    );

    $validator->minLength(
        "endereco",
        5,
        "O endereço deve ter pelo menos 5 caracteres."
    );

    $validator->maxLength(
        "endereco",
        200,
        "O endereço deve ter no máximo 200 caracteres."
    );


    // =====================================
    // TELEFONE
    // =====================================

    $validator->required(
        "telefone",
        "Informe o telefone."
    );

    $validator->regex(
        "telefone",
        "/^\(\d{2}\) \d{5}-\d{4}$/",
        "Informe o telefone completo no formato (00) 00000-0000."
    );


    // =====================================
    // E-MAIL
    // =====================================

    $validator->required(
        "email",
        "Informe o e-mail."
    );

    $validator->email(
        "email",
        "Digite um e-mail válido."
    );


    // =====================================
    // SITE
    // =====================================

    $validator->required(
        "site",
        "Informe o site."
    );

    $validator->regex(
        "site",
        "/^(https?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,}(\/.*)?$/",
        "Digite um site válido."
    );
}

