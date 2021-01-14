CREATE DATABASE IF NOT EXISTS db CHARSET utf8;

USE db;

CREATE TABLE `Usuario` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`nome`		VARCHAR(100) NOT NULL,
	`email`		VARCHAR(100) NOT NULL UNIQUE,
	`senha`		VARCHAR(100) NOT NULL,
	`bio`		VARCHAR(100),
	PRIMARY KEY(`id`)
);

CREATE TABLE `Solicitacao_jogo` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_usuario`	INTEGER NOT NULL,
	`solicitacao`	VARCHAR(255),
	PRIMARY KEY(`id`)
);

CREATE TABLE `Categoria` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`nome`		VARCHAR(70) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `Marca` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`nome`		VARCHAR(100) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE `Jogo` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_marca`	INTEGER NOT NULL,
	`titulo`	VARCHAR(255) NOT NULL,
	`descricao`	VARCHAR(500) NOT NULL,
	FOREIGN KEY(`id_marca`) REFERENCES `Marca`(`id`),
	PRIMARY KEY(`id`)
);

CREATE TABLE `Jogo_categoria` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_jogo`	INTEGER NOT NULL,
	`id_categoria`	INTEGER NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_jogo`) REFERENCES `Jogo`(`id`),
	FOREIGN KEY(`id_categoria`) REFERENCES `Categoria`(`id`)
);

CREATE TABLE `Produto` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_jogo`	INTEGER NOT NULL,
	`id_usuario`	INTEGER NOT NULL,
	`tipo`		INTEGER NOT NULL,
	`preco`		INTEGER NOT NULL,
	`descricao`	REAL NOT NULL,
	`status`	INTEGER NOT NULL,
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`),
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_jogo`) REFERENCES `Jogo`(`id`)
);

CREATE TABLE `Desejo` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_jogo`	INTEGER NOT NULL,
	`id_usuario`	INTEGER NOT NULL,
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`),
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_jogo`) REFERENCES `Jogo`(`id`)
);

CREATE TABLE `Favorito` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_usuario`	INTEGER NOT NULL,
	`id_produto`	INTEGER NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`),
	FOREIGN KEY(`id_produto`) REFERENCES `Produto`(`id`)
);

CREATE TABLE `Pergunta` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_usuario`	INTEGER NOT NULL,
	`id_produto`	INTEGER NOT NULL,
	`pergunta`	VARCHAR(500) NOT NULL,
	`resposta`	VARCHAR(500),
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_produto`) REFERENCES `Produto`(`id`),
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`)
);

CREATE TABLE `Chat` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_produto`	INTEGER NOT NULL,
	`id_usuario`	INTEGER NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`),
	FOREIGN KEY(`id_produto`) REFERENCES `Produto`(`id`)
);

CREATE TABLE `Mensagem` (
	`id`		INTEGER NOT NULL AUTO_INCREMENT,
	`id_chat`	INTEGER NOT NULL,
	`id_usuario`	INTEGER NOT NULL,
	`msg`		VARCHAR(200) NOT NULL,
	PRIMARY KEY(`id`),
	FOREIGN KEY(`id_usuario`) REFERENCES `Usuario`(`id`),
	FOREIGN KEY(`id_chat`) REFERENCES `Chat`(`id`)
);


INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('1', 'Affonsso Gonsalves', 'affg@gmail.com', '12345', 'Bora jogar de madrugada?');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('2', 'Juliana', 'juli@gmail.com', '12345', 'oiii XD');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('3', 'Camila', 'cami@hotmail.com', '12345', 'na minha mão é mais barato');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('4', 'Ursulá', 'ursula@gmail.com', '12345', 'Ariel você me paga...');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('5', 'Carlos', 'car69@gado.com', '12345', 'que jogo lixo...');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('6', 'Rafaela', 'rafa@bing.com', '12345', 'tudo que eu quero é um jogo barato');
INSERT INTO `Usuario` (`id`, `nome`, `email`, `senha`, `bio`) VALUES ('7', 'Maria das Neves', 'marineve@hotmail.com', '12345', 'quero jogos na neve');


INSERT INTO `Categoria` (`id`, `nome`) VALUES ('1', 'Aventura');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('2', 'Ação');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('3', 'Casual');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('4', 'Corrida');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('5', 'Esportes');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('6', 'Estrategia');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('7', 'Indie');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('8', 'Multijogador');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('9', 'RPG');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('10', 'Simulação');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('11', 'Terror');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('12', 'Suspense');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('13', 'Infantil');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('14', 'Competitivo');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('15', 'puzzle');
INSERT INTO `Categoria` (`id`, `nome`) VALUES ('16', 'FPS');

INSERT INTO `Marca` (`id`, `nome`) VALUES ('1', 'Arari');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('2', 'Konami');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('3', 'Capcom');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('4', 'Namco');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('5', 'EA');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('6', 'Nintendo');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('7', 'Ubisoft');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('8', 'LucasArts');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('9', 'Midway');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('10', 'MicroProse');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('11', 'Maxis');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('12', 'Sierra');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('13', 'Sega AM2');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('14', 'Blizzard Entertainment');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('15', 'Valve');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('16', 'Id Software');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('17', 'Taito');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('18', 'Westwoodt');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('19', 'Rare');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('20', 'Generia Jogos');
INSERT INTO `Marca` (`id`, `nome`) VALUES ('21', 'Bethesda Game Studios');

INSERT INTO `Jogo` (`id`, `id_marca`, `titulo`, `descricao`) VALUES ('1', '21', 'Fallout 4', 'Fallout 4 é um jogo eletrônico do gênero RPG de ação ambientado em mundo aberto produzido pela Bethesda Game Studios, sendo o quinto título principal da série Fallout.');

INSERT INTO `Jogo_categoria` (`id`, `id_jogo`, `id_categoria`) VALUES ('1', '1', '9');
INSERT INTO `Jogo_categoria` (`id`, `id_jogo`, `id_categoria`) VALUES ('2', '1', '16');


