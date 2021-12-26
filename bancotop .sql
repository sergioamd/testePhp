-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Dez-2021 às 22:46
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancotop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens`
--

CREATE TABLE `tb_itens` (
  `itemId` int(11) NOT NULL,
  `itemNome` varchar(255) DEFAULT NULL,
  `itemCodigo` varchar(30) DEFAULT NULL,
  `itemPreco` varchar(20) DEFAULT NULL,
  `itemImposto` decimal(3,2) DEFAULT NULL,
  `descricao` varchar(900) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_itens`
--

INSERT INTO `tb_itens` (`itemId`, `itemNome`, `itemCodigo`, `itemPreco`, `itemImposto`, `descricao`) VALUES
(6, 'arroz', '1', '2.5', '0.25', 'arroz otimo'),
(7, 'bolacha', '3', '28', '1.35', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_itens_venda`
--

CREATE TABLE `tb_itens_venda` (
  `itemVendaId` int(11) NOT NULL,
  `vendaCodigo` int(11) DEFAULT NULL,
  `itemVenda` int(11) DEFAULT NULL,
  `itemQuant` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_itens_venda`
--

INSERT INTO `tb_itens_venda` (`itemVendaId`, `vendaCodigo`, `itemVenda`, `itemQuant`) VALUES
(1, 1, 1, '1'),
(2, 2, 3, '1'),
(3, 3, 3, '2'),
(4, 4, 3, '4'),
(5, 5, 5, '2'),
(6, 5, 3, '3'),
(7, 6, 1, '2'),
(11, 7, 6, '1'),
(12, 8, 6, '1'),
(17, 9, 6, '1'),
(18, 10, 7, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendas`
--

CREATE TABLE `tb_vendas` (
  `vendaId` int(11) NOT NULL,
  `vendaValor` varchar(20) DEFAULT NULL,
  `vendaImposto` varchar(20) NOT NULL,
  `vendaData` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_vendas`
--

INSERT INTO `tb_vendas` (`vendaId`, `vendaValor`, `vendaImposto`, `vendaData`) VALUES
(1, '2', '0.00', '24-12-21 03:18:07 PM'),
(2, '2.8', '0.00', '24-12-21 04:03:41 PM'),
(3, '5.6', '0.00', '24-12-21 04:03:53 PM'),
(4, '11.2', '0.00', '24-12-21 04:11:58 PM'),
(5, '13.4', '0.00', '24-12-21 05:00:24 PM'),
(6, '4', '', '24-12-21 05:16:19 PM'),
(7, '2.5', '', '24-12-21 06:17:12 PM'),
(8, '2.5', '', '24-12-21 06:23:42 PM'),
(9, '2.5', '', '24-12-21 06:33:20 PM'),
(10, '28', '28.378', '24-12-21 06:40:36 PM');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  ADD PRIMARY KEY (`itemId`);

--
-- Índices para tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  ADD PRIMARY KEY (`itemVendaId`),
  ADD KEY `vendaCodigo` (`vendaCodigo`);

--
-- Índices para tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  ADD PRIMARY KEY (`vendaId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_itens`
--
ALTER TABLE `tb_itens`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  MODIFY `itemVendaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_vendas`
--
ALTER TABLE `tb_vendas`
  MODIFY `vendaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_itens_venda`
--
ALTER TABLE `tb_itens_venda`
  ADD CONSTRAINT `tb_itens_venda_ibfk_1` FOREIGN KEY (`vendaCodigo`) REFERENCES `tb_vendas` (`vendaId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
