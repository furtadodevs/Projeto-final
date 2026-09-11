<?php

function buscarUsuarioPorEmail($pdo, $email)
{
    $stmt = $pdo->prepare(
        "SELECT *
         FROM usuarios
         WHERE email = ?"
    );

    $stmt->execute([$email]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function cadastrarUsuario($pdo, $nome, $email, $senha)
{
    $senhaHash = password_hash(
        $senha,
        PASSWORD_DEFAULT
    );

    $stmt = $pdo->prepare(
        "INSERT INTO usuarios
        (
            nome,
            email,
            senha
        )
        VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $nome,
        $email,
        $senhaHash
    ]);

    return $pdo->lastInsertId();
}
