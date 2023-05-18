-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2023 às 13:48
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

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
-- Estrutura da tabela `coisa`
--

CREATE TABLE `coisa` (
  `id_coisa` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `valor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `telefone` int(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `caminhofoto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
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
-- Índices para tabela `coisa`
--
ALTER TABLE `coisa`
  ADD PRIMARY KEY (`id_coisa`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`nome`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `coisa`
--
ALTER TABLE `coisa`
  MODIFY `id_coisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;