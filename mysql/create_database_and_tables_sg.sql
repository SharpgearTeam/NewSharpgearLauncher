-- Criação do banco de dados
CREATE DATABASE sharpgear_users;
USE sharpgear_users;

-- ================================
-- TABELA: users (usuários)
-- ================================
CREATE TABLE users ( 
  id INT AUTO_INCREMENT PRIMARY KEY,                                             -- ID único do usuário
  username VARCHAR(50) NOT NULL UNIQUE,                                          -- Nome de usuário único
  email VARCHAR(100) NOT NULL UNIQUE,                                            -- Email único
  password CHAR(60) NOT NULL,                                                    -- Senha (ex: bcrypt = 60 caracteres)
  birth_date DATE,                                                               -- Data de nascimento
  description VARCHAR(207) NOT NULL DEFAULT 'Olá Sharpgear!',                    -- Descrição do Perfil
  is_active BOOLEAN DEFAULT TRUE,                                                -- Ativo ou não
  avatar_url VARCHAR(255) NOT NULL DEFAULT 'public/uploads/usertemplate.webp', -- URL do avatar (opcional)
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,                                 -- Registro da criação
  role ENUM('user', 'admin', 'vip') DEFAULT 'user',                              -- Diz se o usuário é um admin ou não
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP                                                  -- Atualizado automaticamente
);

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

-- ================================
-- TABELA: user_library (jogos comprados pelo usuário)
-- ================================
CREATE TABLE user_library (
  id INT AUTO_INCREMENT PRIMARY KEY,                       -- ID da entrada
  user_id INT NOT NULL,                                    -- Dono do jogo
  game_id INT NOT NULL,                                    -- Jogo comprado
  purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,        -- Data da compra
  FOREIGN KEY (user_id) REFERENCES users(id) 
    ON DELETE CASCADE,                                     -- Remove se o usuário for excluído
  FOREIGN KEY (game_id) REFERENCES games(id) 
    ON DELETE CASCADE                                      -- Remove se o jogo for excluído
);

-- ================================
-- TABELA: transactions (registro de compras)
-- ================================
CREATE TABLE transactions (
  id INT AUTO_INCREMENT PRIMARY KEY,                       -- ID da transação
  user_id INT,                                             -- Quem comprou
  game_id INT,                                             -- O que foi comprado
  price_paid DECIMAL(10,2),                                -- Quanto foi pago
  purchase_date DATETIME DEFAULT CURRENT_TIMESTAMP,        -- Quando comprou
  payment_method VARCHAR(50),                              -- Método (PIX, cartão, etc)
  FOREIGN KEY (user_id) REFERENCES users(id),              -- Vínculo com usuário
  FOREIGN KEY (game_id) REFERENCES games(id)               -- Vínculo com jogo
);