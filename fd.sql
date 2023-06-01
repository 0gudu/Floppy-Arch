-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2023 at 11:08 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fd`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id_coisa` int NOT NULL AUTO_INCREMENT,
  `item` int NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `valor` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `pedido` int NOT NULL,
  PRIMARY KEY (`id_coisa`),
  KEY `item` (`item`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrinho`
--

INSERT INTO `carrinho` (`id_coisa`, `item`, `usuario`, `valor`, `pedido`) VALUES
(41, 2, 'gustavo', 'R$40,00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `nome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` int NOT NULL,
  `adm` int NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoas`
--

INSERT INTO `pessoas` (`nome`, `email`, `endereco`, `senha`, `telefone`, `adm`) VALUES
('gustavo', 'fggfg', 'eee', 'fff', 24234, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int NOT NULL,
  `nome` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `caminhofoto` varchar(90) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `caminhofoto`, `descricao`) VALUES
(1, 'Disquete Colorido', 'images/personalizados/colorido.png', 'Disquete com uma ampla variedade de cores'),
(2, 'Disquete Veridian', 'images/personalizados/disquete veridiano.png', '@veridianoforaobaile'),
(3, 'Disquete Estampado', 'images/personalizados/estampa.png', 'rawr'),
(4, 'Disquete Fafase Lalau', 'images/personalizados/fafase lalau.png', 'Obra de arte'),
(5, 'Disquete Germano', 'images/personalizados/germanodisk.png', 'Altamente germanico'),
(6, 'Disquete Neymar Gold', 'images/personalizados/neymar_gold.png', 'Disquete Neymar ouro mais'),
(7, 'Disquete ratue', 'images/personalizados/ratuedisk-gudulegal.png', 'gudu765'),
(8, 'Disquete Retrô', 'images/personalizados/retrodisk.png', 'Somente classicos');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`item`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `pessoas` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
