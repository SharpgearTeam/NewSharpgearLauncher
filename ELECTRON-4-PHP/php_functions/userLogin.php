<?php

session_start();
require_once("ELECTRON-4-PHP\conexao_bd.php");
echo "Logando";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = getPDO();
    $email = trim($_POST["us_email"] ?? '');
    $password = trim($_POST["us_password" ??'']);

    $stmt = $pdo->prepare("SELECT id, username, password, description, avatar_url FROM users WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() === 1){
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user["password"])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['logged_in'] = true;
            $_SESSION['description'] = $user['description'];
            $_SESSION['avatar_url'] = $user['avatar_url'];
            header("Location: ../../index.php");
            exit;
        }
    }

    echo "Login não encontrado ou incorreto.";
}

?>