-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projetotelecontrol
CREATE DATABASE IF NOT EXISTS `projetotelecontrol` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projetotelecontrol`;

-- Copiando estrutura para tabela projetotelecontrol.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projetotelecontrol.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `endereco`, `cidade`, `estado`, `idade`, `status`) VALUES
	(10, 'Marcos Alves', 'Rua B', 'Bauru', 'SP', 33, 'ATIVO'),
	(16, 'Maria Alves', 'Rua 15 de Novembro', 'Assis', 'SP', 34, 'ATIVO'),
	(18, 'Rogerio', 'Rua P', 'Londrina', 'PR', 26, 'ATIVO'),
	(19, 'Marcos Silva', 'Rua dos Ipes 200', 'Holambra', 'SP', 28, 'ATIVO'),
	(20, 'Pedro Neves', 'Rua Tiradentes 900', 'Ourinhos', 'SP', 43, 'ATIVO');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela projetotelecontrol.ordem_servico
CREATE TABLE IF NOT EXISTS `ordem_servico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_tecnico` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `tecnico` varchar(50) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`id_cliente`),
  KEY `fk_tecnico` (`id_tecnico`),
  KEY `fk_produto` (`id_produto`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `fk_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projetotelecontrol.ordem_servico: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `ordem_servico` DISABLE KEYS */;
INSERT INTO `ordem_servico` (`id`, `id_cliente`, `id_tecnico`, `id_produto`, `cliente`, `tecnico`, `produto`, `status`, `created_at`) VALUES
	(26, NULL, NULL, NULL, 'Macos Silva', 'Mario Lopes', 'Microondas', 'ATIVO', '2020-03-20 22:37:31'),
	(27, NULL, NULL, NULL, 'Pedro Neves', 'Mario Lopes', 'Microondas', 'ATIVO', '2020-03-23 10:05:15');
/*!40000 ALTER TABLE `ordem_servico` ENABLE KEYS */;

-- Copiando estrutura para tabela projetotelecontrol.peca
CREATE TABLE IF NOT EXISTS `peca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projetotelecontrol.peca: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `peca` DISABLE KEYS */;
/*!40000 ALTER TABLE `peca` ENABLE KEYS */;

-- Copiando estrutura para tabela projetotelecontrol.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projetotelecontrol.produto: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`id`, `nome`, `referencia`) VALUES
	(8, 'Tv', 'Smart Tv 40 polegadas'),
	(9, 'Microondas', 'Brastemp'),
	(10, 'ar-condicionado', 'Elgin 9000');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela projetotelecontrol.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projetotelecontrol.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`, `nome`, `data_cadastro`) VALUES
	(12, 'mat', '698d51a19d8a121ce581499d7b701668', 'matheus', '2020-03-20 17:54:40'),
	(13, 'mario', '202cb962ac59075b964b07152d234b70', 'Mario Lopes', '2020-03-20 22:36:18');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
