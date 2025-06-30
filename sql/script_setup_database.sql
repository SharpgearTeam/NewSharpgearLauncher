-- Criação do banco de dados
CREATE DATABASE sharpgear_users;
USE sharpgear_users;

-- ================================
-- TABELA: users (usuários)
-- ================================
CREATE TABLE users ( 
  id INT AUTO_INCREMENT ZEROFILL PRIMARY KEY,                       -- ID único do usuário
  username VARCHAR(50) NOT NULL UNIQUE,                    -- Nome de usuário único
  email VARCHAR(100) NOT NULL UNIQUE,                      -- Email único
  password CHAR(60) NOT NULL,                              -- Senha (ex: bcrypt = 60 caracteres)
  birth_date DATE,                                         -- Data de nascimento
  is_active BOOLEAN DEFAULT TRUE,                          -- Ativo ou não
  avatar_url VARCHAR(255) DEFAULT NULL,                    -- URL do avatar (opcional)
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,           -- Registro da criação
  role ENUM('user', 'admin') DEFAULT 'user',               -- Diz se o usuário é um admin ou não
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP                            -- Atualizado automaticamente
);

-- ================================
-- TABELA: games (jogos)
-- ================================
CREATE TABLE Games (
  id INT AUTO_INCREMENT PRIMARY KEY,                       -- ID único do jogo
  name VARCHAR(100) NOT NULL,                              -- Nome do jogo
  description TEXT,                                        -- Descrição longa
  price DECIMAL(10,2) NOT NULL DEFAULT 0.00,               -- Preço (ex: 59.99)
  cover_url VARCHAR(255),                                  -- URL da imagem de capa
  icon_url VARCHAR(255),                                   -- URL do ícone
  rating VARCHAR(10),                                      -- Classificação indicativa (ex: L, 12+)
  release_date DATE,                                       -- Data de lançamento
  developer VARCHAR(100),                                  -- Nome da desenvolvedora
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,           -- Registro de criação
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP 
    ON UPDATE CURRENT_TIMESTAMP                            -- Atualização automática
);

-- ================================
-- TABELA: game_images (galeria de imagens dos jogos)
-- ================================
CREATE TABLE game_images (
  id INT AUTO_INCREMENT PRIMARY KEY,                       -- ID da imagem
  game_id INT,                                             -- Jogo relacionado
  image_url VARCHAR(255),                                  -- URL da imagem
  FOREIGN KEY (game_id) REFERENCES games(id) 
    ON DELETE CASCADE                                      -- Remove imagens ao excluir jogo
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
