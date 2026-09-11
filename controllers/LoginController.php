<?php

session_start();


// Define resposta como JSON
header(
    "Content-Type: application/json; charset=utf-8"
);


// Importa conexão e Model
require __DIR__ . "/../config/database.php";
require __DIR__ . "/../models/UsuarioModel.php";
require __DIR__ . "/../models/LogModel.php";


// Conecta ao banco
$pdo = conectarBanco();


// Recebe os dados do formulário
$email =
    $_POST["email"]
    ?? "";

$senha =
    $_POST["senha"]
    ?? "";


// Validação simples
if ($email === "" || $senha === "") {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe e-mail e senha.",
        "dados" => null
    ]);

    exit;
}


// Busca usuário pelo e-mail
$usuario = buscarUsuarioPorEmail($pdo, $email);


// Usuário não encontrado
if (!$usuario) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "E-mail ou senha inválidos.",
        "dados" => null
    ]);

    exit;
}


// Verifica a senha
if (!password_verify($senha,  $usuario["senha"]
)) {

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "E-mail ou senha inválidos.",
        "dados" => null
    ]);

    exit;
}


// Cria a sessão
$_SESSION["usuario_id"] =  $usuario["id"];

$_SESSION["usuario_nome"] =    $usuario["nome"];

$_SESSION["usuario_email"] =     $usuario["email"];


// Registra o login
registrarLog(
    $pdo,
    $_SESSION["usuario_id"],
    "LOGIN"
);


// Retorna sucesso
echo json_encode([
    "sucesso" => true,
    "mensagem" => "Login realizado com sucesso.",
    "dados" => null]);