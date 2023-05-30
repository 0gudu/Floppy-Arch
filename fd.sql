-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/05/2023 às 15:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_coisa` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `valor` varchar(11) NOT NULL,
  `pedido` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `telefone` int(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoas`
--

INSERT INTO `pessoas` (`nome`, `email`, `endereco`, `senha`, `telefone`) VALUES
('gustavo', 'fggfg', 'eee', 'fff', 24234);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `caminhofoto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `caminhofoto`) VALUES
(1, 'Disquete Colorido', 'images/personalizados/colorido.png'),
(2, 'Disquete Veridian', 'images/personalizados/disquete veridiano.png'),
(3, 'Disquete Estampado', 'images/personalizados/estampa.png'),
(4, 'Disquete Fafase Lalau', 'images/personalizados/fafase lalau.png'),
(5, 'Disquete Germano', 'images/personalizados/germanodisk.png'),
(6, 'Disquete Neymar Gold', 'images/personalizados/neymar_gold.png'),
(7, 'Disquete ratue', 'images/personalizados/ratuedisk-gudulegal.png'),
(8, 'Disquete Retrô', 'images/personalizados/retrodisk.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_coisa`),
  ADD KEY `item` (`item`),
  ADD KEY `usuario` (`usuario`);

--
-- Índices de tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`nome`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_coisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`item`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `pessoas` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
