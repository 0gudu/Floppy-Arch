-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/06/2023 às 17:26
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
  `pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `valor` int(111) NOT NULL,
  `statuss` varchar(30) NOT NULL,
  `datas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `usuario`, `valor`, `statuss`, `datas`) VALUES
(20, 'site', 0, 'carrinhos', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `telefone` int(11) NOT NULL,
  `adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoas`
--

INSERT INTO `pessoas` (`nome`, `email`, `endereco`, `senha`, `telefone`, `adm`) VALUES
('matheusburladap@cock.li', 'matheus burladao', 'reino da selva tarzan', '12123', 212, 0),
('site', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `caminhofoto` varchar(90) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `caminhofoto`, `descricao`) VALUES
(1, 'Disquete Colorido', '../images/personalizados/colorido.png', 'Disquete com uma ampla variedade de cores'),
(2, 'Disquete Veridian', '../images/personalizados/disquete veridiano.png', '@veridianoforaobaile'),
(3, 'Disquete Estampado', '../images/personalizados/estampa.png', 'rawr'),
(4, 'Disquete Fafase Lalau', '../images/personalizados/fafase lalau.png', 'Obra de arte'),
(5, 'Disquete Germano', '../images/personalizados/germanodisk.png', 'Altamente germanico'),
(6, 'Disquete Neymar Gold', '../images/personalizados/neymar_gold.png', 'Disquete Neymar ouro mais'),
(7, 'Disquete ratue', '../images/personalizados/ratuedisk-gudulegal.png', 'gudu765'),
(8, 'Disquete Retrô', '../images/personalizados/retrodisk.png', 'Somente classicos');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_coisa`),
  ADD KEY `item` (`item`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `pedido` (`pedido`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
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
  MODIFY `id_coisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`item`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `pessoas` (`nome`),
  ADD CONSTRAINT `carrinho_ibfk_3` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id_pedido`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `pessoas` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
