<?php

function listarEventos($pdo)
{
    $stmt = $pdo->query(
        "SELECT *
         FROM eventos
         ORDER BY data DESC, horario DESC"
    );

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function buscarEvento($pdo, $id)
{
    $stmt = $pdo->prepare(
        "SELECT *
         FROM eventos
         WHERE id = ?"
    );

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function cadastrarEvento($pdo, $dados)
{
    $stmt = $pdo->prepare(
        "INSERT INTO eventos
        (
            titulo,
            categoria,
            descricao,
            imagem,
            data,
            horario,
            local,
            endereco,
            telefone,
            email,
            site
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $dados["titulo"],
        $dados["categoria"],
        $dados["descricao"],
        'urlimagem.png',
        $dados["data"],
        $dados["horario"],
        $dados["local"],
        $dados["endereco"],
        $dados["telefone"],
        $dados["email"],
        $dados["site"],
    ]);

    return $pdo->lastInsertId();
}

function editarEvento($pdo, $dados)
{
    $stmt = $pdo->prepare(
        "UPDATE eventos
         SET
            titulo = ?,
            categoria = ?,
            descricao = ?,
            imagem = ?,
            data = ?,
            horario = ?,
            local = ?,
            endereco = ?,
            telefone = ?,
            email = ?
         WHERE id = ?"
    );

    return $stmt->execute([
        $dados["titulo"],
        $dados["categoria"],
        $dados["descricao"],
        'imagem.png',
        $dados["data"],
        $dados["horario"],
        $dados["local"],
        $dados["endereco"],
        $dados["telefone"],
        $dados["email"],
        $dados["id"]
    ]);
}

function excluirEvento($pdo, $id)
{
    $stmt = $pdo->prepare(
        "DELETE FROM eventos
         WHERE id = ?"
    );

    return $stmt->execute([$id]);
}
