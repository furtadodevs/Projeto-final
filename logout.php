<?php

session_start();


require __DIR__ . "/config/database.php";
require __DIR__ . "/models/LogModel.php";

$pdo = conectarBanco();


// Registra o logout antes de destruir a sessão.
if (isset($_SESSION["usuario_id"])) {

    registrarLog(
        $pdo,
        $_SESSION["usuario_id"],
        "LOGOUT"
    );

}

// Limpa e encerra a sessão.
session_unset();

session_destroy();


// Volta para o login.
header(
    "Location: index.php?page=login"
);

exit;