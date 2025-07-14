<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "quickAuth.php";
    require_once(__DIR__ . '/../database/conexao_bd.php');
    require_once "getUserInfo.php";
    require_once "uploadimage.php";

    $user = getUser();
    $pdo = getPDO();

    try {
        $uploadedAvatar = handleAvatarUpload();
    } catch (RuntimeException $e) {
        header("Location: ../perfil_page.php");
        exit($e->getMessage());
    }

    $avatar_url = $uploadedAvatar ?: $user['avatar_url'];
    $username = trim($_POST["username"] ?? $user['username']);
    $description = trim($_POST["description"] ?? $user['description']);
    $userId = $user['id'];

    if ($avatar_url !== $user['avatar_url']) {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, avatar_url = ?, description = ? WHERE id = ?");
        $stmt->execute([$username, $avatar_url, $description, $userId]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET username = ?, description = ? WHERE id = ?");
        $stmt->execute([$username, $description, $userId]);
    }

    $_SESSION['username'] = $username;
    $_SESSION['logged_in'] = true;
    $_SESSION['description'] = $description;
    $_SESSION['avatar_url'] = $avatar_url;

    header("Location: ../perfil_page.php");
    exit;
}
