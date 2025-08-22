<?php
    $servername = "localhost";
    $username   = "root"; // seu usuário do MySQL
    $password   = "";     // sua senha do MySQL

    // Criar conexão
    $conn = new mysqli($servername, $username, $password);

    // Verificar conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // ================================
    // CRIAÇÃO DO BANCO E USO
    // ================================
    $sql = "
    CREATE DATABASE IF NOT EXISTS sharpgear_users;
    USE sharpgear_users;

    -- ================================
    -- TABELA: users (usuários)
    -- ================================
    CREATE TABLE IF NOT EXISTS users ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password CHAR(60) NOT NULL,
    birth_date DATE,
    description VARCHAR(207) NOT NULL DEFAULT 'Olá Sharpgear!',
    is_active BOOLEAN DEFAULT TRUE,
    avatar_url VARCHAR(255) NOT NULL DEFAULT 'public/uploads/usertemplate.webp',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    role ENUM('user', 'admin', 'vip') DEFAULT 'user',
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP 
        ON UPDATE CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS developers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS games (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        descr TEXT,
        logo VARCHAR(255),
        cover VARCHAR(255),
        preco DECIMAL(10,2),
        classf_id INT,
        data_lancamento DATE,
        developer_id INT,
        FOREIGN KEY (developer_id) REFERENCES developers(id)
    );

    CREATE TABLE IF NOT EXISTS game_images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        game_id INT NOT NULL,
        url VARCHAR(255) NOT NULL,
        FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS user_library (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
    );

    CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    game_id INT,
    price_paid DECIMAL(10,2),
    purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_method VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (game_id) REFERENCES games(id)
    );

    -- ================================
    -- INSERTS
    -- ================================
    INSERT INTO developers (nome) 
    VALUES ('Sharpgear Studios')
    ON DUPLICATE KEY UPDATE id = id;

    INSERT INTO games (id, nome, descr, logo, cover, preco, classf_id, data_lancamento, developer_id) VALUES (
        1,
        'Surv N'' Live',
        'Surv N'' Live é um jogo indie top-down no qual você assume o papel de três jovens integrantes de um grupo de hackers, que foram \"convidados\" de maneira breve e gentil a participar de uma série de desafios que colocam em risco sua liberdade... e até mesmo suas vidas.',
        'src/placeholders/Surv N Live logo - White.png',
        'src/placeholders/splash_survnlive.png',
        19.99,
        16,
        '2025-10-15',
        1
    ) ON DUPLICATE KEY UPDATE id = id;

    INSERT INTO games (id, nome, descr, logo, cover, preco, classf_id, data_lancamento, developer_id) VALUES (
        2,
        'HELL-O WORLD',
        'HELL-O WORLD é um jogo PvP para 2-4 jogadores que utiliza o sistema de Rollback Beta do GMS2. Convide seus amigos (se você tiver algum) para destruí-los nesse jogo de tiro competitivo Top-Down. -Criado por AdriN.',
        'src/placeholders/HELL-O WORLD Color.svg',
        'src/placeholders/hell-oWorldCover.png',
        0.00,
        16,
        '2025-10-15',
        1
    ) ON DUPLICATE KEY UPDATE id = id;
    ";

    // Executar múltiplos comandos de uma vez
    if ($conn->multi_query($sql) === TRUE) {
        echo "Banco de dados e tabelas criados com sucesso, registros inseridos!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
?>
