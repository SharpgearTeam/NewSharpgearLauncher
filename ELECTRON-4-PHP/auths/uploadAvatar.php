<?php
require_once 'uploadimage.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(405);
  echo json_encode(['error' => 'Método não permitido']);
  exit;
}

try {
  $url = handleAvatarUpload('imagem');
  $array = ['success' => true, 'avatar_url' => $url];
  echo json_encode($array, JSON_UNESCAPED_UNICODE);
} catch (RuntimeException $e) {
  http_response_code(400);
  echo json_encode(['error' => $e->getMessage()]);
}
