<?php

header(
    "Content-Type: application/json; charset=utf-8"
);

require __DIR__ . "/../config/database.php";
require __DIR__ . "/../models/UsuarioModel.php";

$pdo = conectarBanco();

$acao = $_POST["acao"] ?? "";

if ($acao !== "cadastrar") {

    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Ação inválida."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


$nome =
    trim(
        $_POST["nome"]
        ?? ""
    );

$email =
    trim(
        $_POST["email"]
        ?? ""
    );

$senha =
    $_POST["senha"]
    ?? "";


if (
    $nome === ""
    ||
    $email === ""
    ||
    $senha === ""
) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha nome, e-mail e senha."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


if (
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Digite um e-mail válido."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


if (
    buscarUsuarioPorEmail(
        $pdo,
        $email
    )
) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Este e-mail já está cadastrado."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


$id =
    cadastrarUsuario(
        $pdo,
        $nome,
        $email,
        $senha
    );


echo json_encode([
    "sucesso" => true,
    "mensagem" => "Usuário cadastrado com sucesso.",
    "dados" => [
        "id" => $id
    ]
], JSON_UNESCAPED_UNICODE);
