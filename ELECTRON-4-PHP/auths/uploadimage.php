<?php
function handleAvatarUpload(string $inputName = 'imagem') {
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $ext = strtolower(pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

    if (!in_array($ext, $allowedExt)) {
        throw new RuntimeException("Formato de imagem inválido.");
    }

    $newName = uniqid("avatar_", true) . '.' . $ext;
    $uploadDir = 'C:/xampp/htdocs/SharpgearAPP/public/uploads/';
    $destination = $uploadDir . $newName;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!move_uploaded_file($_FILES[$inputName]['tmp_name'], $destination)) {
        throw new RuntimeException("Falha ao mover o arquivo de upload.");
    }
    $uploadDir = 'http://localhost:8080/SharpgearAPP/public/uploads/';
    return $uploadDir . $newName;
}
