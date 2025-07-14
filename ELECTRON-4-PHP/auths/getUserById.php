<?php
require_once "database/conexao_bd.php";

function getUserById(int $id, array $fields = ['id', 'username', 'email', 'role', 'description', 'avatar_url']): ?array {
    $pdo = getPDO();
    $fieldList = implode(", ", $fields);

    $stmt = $pdo->prepare("SELECT $fieldList FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}
?>