<?php
session_start();
require_once "conexao_bd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try {  
        $nome = htmlspecialchars(trim($_POST["Username"] ?? ''));
        $dtbirth = $_POST["dt_birth"] ?? '';
        $usemail = htmlspecialchars(trim($_POST["us_email"] ?? ''));
        $uspassword = password_hash($_POST["us_password"] ?? '', PASSWORD_DEFAULT);
        $pdo = getPDO();
        // Validação do nome
        if (empty($nome)) {
            throw new Exception("Nome não pode ser vazio.");
        }

        // Inserção no banco de dados
        $sql = "INSERT INTO users (username, birth_date, email, password) 
                VALUES (:nome, :dtbirth, :usemail, :uspassword)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':dtbirth', $dtbirth);
        $stmt->bindParam(':usemail', $usemail);
        $stmt->bindParam(':uspassword', $uspassword);
        $stmt->execute();

        // Retorno de sucesso
        echo  "cliente cadastrado com sucesso!";
        header("Location: ../cadastro.php");
        exit;
    } catch (PDOException $e) {
        // Captura erro do banco e retorna JSON
        echo "Erro ao cadastrar: " . $e->getMessage();
    } catch (Exception $e) {
        // Captura erro geral e retorna JSON
        echo  "Erro: " . $e->getMessage();
    }  

} else {
    echo  "Erro no envio do formulário.";
}
exit; // Garante que o script encerre corretamente















?>