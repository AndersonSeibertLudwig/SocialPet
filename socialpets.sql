-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 28/01/2016 às 14:16
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.24-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `socialpets`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`aluno`@`localhost` PROCEDURE `nome_completo`()
BEGIN
	DECLARE nome, sobrenome varchar(100);
DECLARE id int;
DECLARE cursor_nome CURSOR FOR SELECT nome, sobrenome, id FROM usuario;
OPEN cursor_nome;
nome_loop:
LOOP
FETCH cursor_nome INTO nome, sobrenome, id;
update usuario set nome_completo = concat_ws('',nome,sobrenome) where id = id;
END LOOP;
close cursor_nome;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `amizade`
--

CREATE TABLE IF NOT EXISTS `amizade` (
  `idPet` int(11) NOT NULL,
  `idPet2` int(11) NOT NULL,
  `confirmacao` varchar(10) DEFAULT NULL,
  KEY `idPet` (`idPet`),
  KEY `idPet2` (`idPet2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `amizade`
--

INSERT INTO `amizade` (`idPet`, `idPet2`, `confirmacao`) VALUES
(64, 60, 'solicitado'),
(65, 60, 'solicitado'),
(65, 66, 'aceito'),
(65, 56, 'solicitado'),
(66, 60, 'solicitado'),
(67, 68, 'aceito'),
(68, 60, 'solicitado'),
(65, 67, 'aceito'),
(69, 65, 'aceito'),
(60, 65, '1'),
(60, 65, 'aceito');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idPostagem` int(11) NOT NULL,
  `conteudo` varchar(2000) DEFAULT NULL,
  KEY `idPostagem` (`idPostagem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `emailUsuario_nomePet`
--
CREATE TABLE IF NOT EXISTS `emailUsuario_nomePet` (
`email` varchar(50)
,`nome` varchar(50)
);
-- --------------------------------------------------------

--
-- Estrutura para tabela `namoro`
--

CREATE TABLE IF NOT EXISTS `namoro` (
  `idPet` int(11) NOT NULL,
  `idPet2` int(11) NOT NULL,
  `confirmacao` varchar(10) DEFAULT NULL,
  KEY `idPet` (`idPet`),
  KEY `idPet2` (`idPet2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `namoro`
--

INSERT INTO `namoro` (`idPet`, `idPet2`, `confirmacao`) VALUES
(65, 66, 'aceito'),
(67, 60, 'aceito'),
(68, 65, 'aceito');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `nomeUsuario_racaPet`
--
CREATE TABLE IF NOT EXISTS `nomeUsuario_racaPet` (
`nome` varchar(50)
,`raca` varchar(50)
);
-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

CREATE TABLE IF NOT EXISTS `notificacao` (
  `idNotificacao` int(11) NOT NULL AUTO_INCREMENT,
  `idSolicitacao` int(11) NOT NULL,
  `tipo` varchar(7) NOT NULL,
  PRIMARY KEY (`idNotificacao`),
  KEY `idSolicitacao` (`idSolicitacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pet`
--

CREATE TABLE IF NOT EXISTS `pet` (
  `nome` varchar(50) DEFAULT NULL,
  `dataNascimento` varchar(12) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `pedigree` char(3) DEFAULT NULL,
  `adocao` char(3) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `idPet` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(300) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPet`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Fazendo dump de dados para tabela `pet`
--

INSERT INTO `pet` (`nome`, `dataNascimento`, `raca`, `pedigree`, `adocao`, `pais`, `estado`, `cidade`, `idPet`, `imagem`, `idUsuario`) VALUES
('Fred', '08/10/2015', 'Border Colie', 'sim', 'nÃ£', 'Brasil', 'Rio Grande do Sul', 'Bom PrincÃ­pio', 38, '../ImgPerfil/2.png', 36),
('Pilot', '07/05/2012', 'Vira-Lata', 'nÃ£', 'nÃ£', 'Brasil', 'Rio Grande do Sul', 'Bom PrincÃ­pio', 39, '../ImgPerfil/Sem tÃ­tulo.png', 36),
('Husky', '20/12/2000', 'Husky siberiano', 'sim', 'nÃ£', 'Brasil', 'RJ', 'Rio de Janeiro', 53, '../ImgPerfil/husky.jpg', 8),
('Thor', '23/09/2001', 'Salsicha', 'NÃ£', 'NÃ£', 'Brasil', 'RN', 'Natal', 54, '../ImgPerfil/cofapinho.jpg', 8),
('Natalina', '24/12/2005', 'Vira Lata', 'nÃ£', 'nÃ£', 'BR', 'RS', 'Feliz', 56, '../ImgPerfil/Natalina.jpg', 8),
('Shasha', '25/09', 'Vira Lata', 'sim', 'nÃ£', 'Brasil', 'Rio Grande do Sul', 'Feliz', 60, '../ImgPerfil/_SC00007.JPG', 44),
('Rex', '13/01/2010', 'Pastor AlemÃ£o', 'sim', 'nÃ£', 'Brasil', 'Rio Grande do Sul', 'SÃ£o Vendelino', 61, '../ImgPerfil/', 45),
('Thor', '22/02/1997', 'Dogo Argentino', 'sim', 'nÃ£', 'Brasil', 'Rio Grande do Sul', 'Bom PrincÃ­pio', 64, '../ImgPerfil/', 46),
('Xerife', '10/01/1998', 'Pinscher', 'NÃ£', 'NÃ£', 'Brasil', 'Rio Grande do Sul', 'TrÃªs Passos', 65, '../ImgPerfil/', 47),
('Sarah', '010101010', 'Brasilian can turner', 'NÃ£', 'NÃ£', 'Barsil', 'RS', 'feliz', 66, '../ImgPerfil/', 48),
('Billy', '14/12/2011', 'LinguiÃ§a', 'NÃ£', 'NÃ£', 'Brasil', 'RS', 'Feliz', 67, '../ImgPerfil/2012-06-10 16.00.28.jpg', 49),
('AlemÃ£o', '20/12/2000', 'Pastor AlemÃ£o', 'sim', '', 'BR', 'RS', 'Feliz', 68, '../ImgPerfil/pastor alemÃ£o.jpg', 8),
('Rex', 'asa', 'Vira', 'nÃ£', 'nÃ£', 'asa', 'asas', 'asas', 69, '../ImgPerfil/an-introduction-to-the-pinscher-dog-breeds-54a68ac0ee4a9.jpg', 47);

-- --------------------------------------------------------

--
-- Estrutura para tabela `postagem`
--

CREATE TABLE IF NOT EXISTS `postagem` (
  `idPostagem` int(11) NOT NULL AUTO_INCREMENT,
  `dataPostagem` char(10) DEFAULT NULL,
  `conteudo` varchar(2000) DEFAULT NULL,
  `imagem` varchar(400) DEFAULT NULL,
  `idPet` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPostagem`),
  KEY `idPet` (`idPet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE IF NOT EXISTS `solicitacao` (
  `idSolicitacao` int(11) NOT NULL AUTO_INCREMENT,
  `idPet` int(11) NOT NULL,
  `idPet2` int(11) NOT NULL,
  `tipo` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`idSolicitacao`),
  KEY `idPet` (`idPet`),
  KEY `idPet2` (`idPet2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `telefoneUsuario_nascimentoPet`
--
CREATE TABLE IF NOT EXISTS `telefoneUsuario_nascimentoPet` (
`telefone` varchar(20)
,`dataNascimento` varchar(12)
);
-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `senhaC` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `sobrenome`, `senha`, `id`, `email`, `telefone`, `nome_completo`, `senhaC`) VALUES
('Mari', 'Martini Ruschel', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 8, 'ruschelmari@yahoo.com.br', '(51)93455934', NULL, NULL),
('Thiago', 'Vettorazzi', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 28, 'thiagovettorazzi@hotmail.com', '51 9529-4774', NULL, NULL),
('JoÃ£o', 'SÃ­lva', '93f8bb0eb2c659b85694486c41717eaf0fe23cd4', 30, 'js@js.com', 'js', NULL, NULL),
('Ze', 'Pires', '1077a351b73e6567d29641caf89b10cc14b1adeb', 31, 'josearpires@yahoo.com.br', '36371657', NULL, NULL),
('Evandro', 'Ruschel', 'e1ea57845fa44316a43350f3d2161ef9eb808540', 32, 'ruschel@outlook.com', '51 9114-5844', NULL, NULL),
('Felipe', 'Ledur', '7c4a8d09ca3762af61e59520943dc26494f8941b', 36, 'felipeledur03@hotmail.com', '959449000', NULL, NULL),
('thiago', 'vettorazzi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 38, 'tvettorazzi@gmail.com', '51 95294774', NULL, NULL),
('Arthur', 'Schreiber', '615193f904a227a9cebf5ad3042a37668b81f4c6', 43, 'arthur.tuy_98@hotmail.com', '96013669', NULL, NULL),
('Anderson', 'Seibert Ludwig', '289358c74ae4c53e0a032b4c5db2cffc8444369a', 44, 'anderludwig@yahoo.com.br', '(51) 9726-8680', NULL, NULL),
('Tales Henrique', 'Willrich', '7c4a8d09ca3762af61e59520943dc26494f8941b', 45, 'talesh.thw@gmail.com', '41878674221', NULL, NULL),
('Steve', 'Arnhold', '3decd49a6c6dce88c16a85b9a8e42b51aa36f1e2', 46, 'baggins.noob@gmail.com', '5196012192', NULL, NULL),
('Vinicius', 'Ferreira', '8f2210046ab1e53e31dfb0e6807528825d4d46ef', 47, 'vinihf@gmail.com', '1', NULL, NULL),
('Eduardo', 'Spies', '17f9b61099ac5e158010e6eb47c30f6b6c64e6fb', 48, 'eduardo@teste.com', '515151515', NULL, NULL),
('Ana ', 'Paula', '7c4a8d09ca3762af61e59520943dc26494f8941b', 49, 'ana@ana', '222222222', NULL, NULL),
('eduardo', 'spies', 'e0f68134d29dc326d115de4c8fab8700a3c4b002', 50, 'eduardo@teste1.com', '51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para view `emailUsuario_nomePet`
--
DROP TABLE IF EXISTS `emailUsuario_nomePet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`aluno`@`localhost` SQL SECURITY DEFINER VIEW `emailUsuario_nomePet` AS select `usuario`.`email` AS `email`,`pet`.`nome` AS `nome` from (`usuario` join `pet` on((`usuario`.`id` = `pet`.`idUsuario`)));

-- --------------------------------------------------------

--
-- Estrutura para view `nomeUsuario_racaPet`
--
DROP TABLE IF EXISTS `nomeUsuario_racaPet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`aluno`@`localhost` SQL SECURITY DEFINER VIEW `nomeUsuario_racaPet` AS select `usuario`.`nome` AS `nome`,`pet`.`raca` AS `raca` from (`usuario` join `pet` on((`usuario`.`id` = `pet`.`idUsuario`)));

-- --------------------------------------------------------

--
-- Estrutura para view `telefoneUsuario_nascimentoPet`
--
DROP TABLE IF EXISTS `telefoneUsuario_nascimentoPet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`aluno`@`localhost` SQL SECURITY DEFINER VIEW `telefoneUsuario_nascimentoPet` AS select `usuario`.`telefone` AS `telefone`,`pet`.`dataNascimento` AS `dataNascimento` from (`usuario` join `pet` on((`usuario`.`id` = `pet`.`idUsuario`)));

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `amizade`
--
ALTER TABLE `amizade`
  ADD CONSTRAINT `amizade_ibfk_1` FOREIGN KEY (`idPet`) REFERENCES `pet` (`idPet`),
  ADD CONSTRAINT `amizade_ibfk_2` FOREIGN KEY (`idPet2`) REFERENCES `pet` (`idPet`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`idPostagem`) REFERENCES `postagem` (`idPostagem`);

--
-- Restrições para tabelas `namoro`
--
ALTER TABLE `namoro`
  ADD CONSTRAINT `namoro_ibfk_1` FOREIGN KEY (`idPet`) REFERENCES `pet` (`idPet`),
  ADD CONSTRAINT `namoro_ibfk_2` FOREIGN KEY (`idPet2`) REFERENCES `pet` (`idPet`);

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`idSolicitacao`) REFERENCES `solicitacao` (`idSolicitacao`);

--
-- Restrições para tabelas `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`idPet`) REFERENCES `pet` (`idPet`);

--
-- Restrições para tabelas `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `solicitacao_ibfk_1` FOREIGN KEY (`idPet`) REFERENCES `pet` (`idPet`),
  ADD CONSTRAINT `solicitacao_ibfk_2` FOREIGN KEY (`idPet2`) REFERENCES `pet` (`idPet`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
