CREATE TABLE IF NOT EXISTS developers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descr TEXT,
    logo VARCHAR(255), -- caminho para a imagem
    preco DECIMAL(10,2),
    classf_id INT, -- classificação indicativa
    data_lancamento DATE,
    developer_id INT, -- FK para developers
    
    FOREIGN KEY (developer_id) REFERENCES developers(id)
);

CREATE TABLE game_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT NOT NULL,
    url VARCHAR(255) NOT NULL,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);