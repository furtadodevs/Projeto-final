<?php

function registrarLog(
    $pdo,
    $usuarioId,
    $acao,
    $eventoId = null
) {
    $stmt = $pdo->prepare(
        "INSERT INTO logs
        (
            usuario_id,
            evento_id,
            acao
        )
        VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $usuarioId,
        $eventoId,
        $acao
    ]);
}
