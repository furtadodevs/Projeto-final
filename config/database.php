<?php

$host = "localhost"; 
$banco = "conecta_contagem";
$usuario = "root"; 
$senha = ""; 

function conectarBanco()
{
    global $host, $banco, $usuario, $senha;

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$banco;", $usuario, 
            $senha);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $erro) {
        die("Erro ao conectar: " . $erro->getMessage());
    }
}
