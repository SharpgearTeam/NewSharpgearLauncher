
<?php

require_once "conexao_games.php"; // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {  
        $name = $_POST['nm_nome'] ?? '';
        $description = $_POST['descricao'] ?? '';
        $price = $_POST['preco'] ?? 0.00;
        $cover_url = $_POST['URL_imagem'] ?? '';
        $icon_url = $_POST['URL_icone'] ?? '';
        $rating = $_POST['cla_indicativa'] ?? '';
        $release_date = $_POST['data_lancamento'] ?? null;
        $developer = $_POST['nm_desenvolvedora'] ?? '';

        // Validação do nome
        if (empty($name)) {
            throw new Exception("Nome não pode ser vazio.");
        }

        // Inserção no banco de dados
        $sql = "INSERT INTO Games (name, description, Price, cover_url, icon_url, rating, release_date, developer) 
                VALUES (:name, :description, :price, :cover_url, :icon_url , :rating , :release_date , :developer )";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':cover_url', $cover_url);
        $stmt->bindParam(':icon_url', $icon_url);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':release_date', $release_date);
        $stmt->bindParam(':developer', $developer);
        $stmt->execute();

        // Retorno de sucesso
        echo  "jogo cadastrado com sucesso!";
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
