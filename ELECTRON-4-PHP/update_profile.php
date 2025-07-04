<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "./ELECTRON-4-PHP\auths\quickAuth.php";
    require_once "./ELECTRON-4-PHP\conexao_bd.php";
    require_once "./ELECTRON-4-PHP\auths\quickAuth.php";
    
    $user = getUser();
    $avatar_url = $user['avatar_url'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'webp', 'png', 'jpeg'];
        
        if (!in_array($ext, $allowedExt)) {
            header("Location: editprofile.php");
            exit("Formato inválido de imagem.");
        }

       
        $newName = uniqid("avatar_", true) . '.' . $ext;
        $uploadDir = __DIR__ . '/../../public/uploads/';
        $destination = $uploadDir . $newName;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destination)) {
            $basePath = dirname($_SERVER['PHP_SELF'], 3);
            $avatar_url = $basePath . '/public/uploads/' . $newName;
        } else {
            exit("Erro ao dar upload na imagem, tente novamente.");
        }
    }

    $username = trim($_POST["username"] ?? $user['username']);
    $description = trim($_POST["description"] ?? $user['description']);
    $userId = $user['id'];

    $pdo = getPDO();

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

    header("Location: ../../profilepage.php?id={$userId}");
    exit;
}
?>
