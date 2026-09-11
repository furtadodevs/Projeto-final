DROP DATABASE IF EXISTS conecta_contagem;

CREATE DATABASE conecta_contagem
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE conecta_contagem;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) DEFAULT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    local VARCHAR(150) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL,
    site VARCHAR(150) NOT NULL
);

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    evento_id INT NULL,
    acao VARCHAR(100) NOT NULL,
    data_log DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_logs_usuario
        FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id),

    CONSTRAINT fk_logs_evento
        FOREIGN KEY (evento_id)
        REFERENCES eventos(id)
        ON DELETE SET NULL
);

-- Usuário inicial para teste.
-- Senha: 123456
INSERT INTO usuarios (nome, email, senha)
VALUES (
    'Administrador',
    'admin@teste.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.'
);
