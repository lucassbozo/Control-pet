-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/12/2023 às 09:32
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
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telefone1` varchar(14) NOT NULL,
  `telefone2` varchar(14) DEFAULT NULL,
  `senha` varchar(10) NOT NULL,
  `confirmacao_senha` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `foto_cliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `cpf`, `data_nascimento`, `email`, `telefone1`, `telefone2`, `senha`, `confirmacao_senha`, `rua`, `numero`, `complemento`, `estado`, `cidade`, `status`, `foto_cliente`) VALUES
(1, 'Everton  Ostrufka', '06333654914', '1987-03-31', 'everton.ost@gmail', '41995575280', '', '1234', 'Nanda1326', 'Rua Anneliese G Krigsner', 2607, 'Bl 06 Ap $04', 'Parana', 'curitiba', 1, '../fotos_upload\\foto.jpeg'),
(2, 'Bruna Goncalves de Andrade', '06952886958', '1988-12-08', 'bruna.os@gmail.com', '41995575280', '', 'Davi1234', 'Davi1234', 'Rua Andre de Barros ', 22, 'casa 2', 'Parana', 'curitiba', 1, NULL),
(3, 'everton Ostrufka ', '06333654915', '1987-03-31', 'everton.osrt@gmail.com', '41995575280', '4188888888', 'Nanda1326', 'Nanda1326', 'rua andre', 423432, 'casa 2', 'parana ', 'curitiba', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `id_petshop` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_pet` varchar(15) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `status_pet` int(1) NOT NULL,
  `comportamento` varchar(255) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `foto_pet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`id`, `id_cliente`, `nome`, `tipo_pet`, `raca`, `genero`, `status_pet`, `comportamento`, `obs`, `foto_pet`) VALUES
(12, 2, 'Ana', 'Cachorro', 'Vira-lata', 'm', 0, 'qq', 'asdas', '../Imagens0cf561ba-cc20-45a2-87cc-f1e271f307e6.jpg'),
(13, 1, 'Mingau', 'Gato', 'Pug', 'm', 0, '4', 'fasfsa', 'Imagens1ef503b4-8a15-41c7-8f2e-c4f057cc0b88.jpg'),
(15, 1, 'bisteca', 'Gato', 'Vira-lata', 'm', 0, 'qq', 'gdf', 'Imagens/imagens_pet/2ef8001a-59d1-496e-aceb-17d71c4d1ba2.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `petshops`
--

CREATE TABLE `petshops` (
  `id_petshop` int(11) NOT NULL,
  `nome_petshop` varchar(220) NOT NULL,
  `foto_petshop` varchar(220) NOT NULL,
  `cnpj_petshop` varchar(220) NOT NULL,
  `email_petshop` varchar(220) DEFAULT NULL,
  `telefone1_petshop` varchar(220) NOT NULL,
  `telefone2_petshop` varchar(220) DEFAULT NULL,
  `senha_petshop` varchar(220) NOT NULL,
  `confirm_senha_petshop` varchar(220) NOT NULL,
  `rua_petshop` varchar(220) NOT NULL,
  `numero_petshop` varchar(220) NOT NULL,
  `complemento_petshop` varchar(220) DEFAULT NULL,
  `estado_petshop` varchar(220) NOT NULL,
  `cidade_petshop` varchar(220) NOT NULL,
  `status_petshop` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `petshops`
--

INSERT INTO `petshops` (`id_petshop`, `nome_petshop`, `foto_petshop`, `cnpj_petshop`, `email_petshop`, `telefone1_petshop`, `telefone2_petshop`, `senha_petshop`, `confirm_senha_petshop`, `rua_petshop`, `numero_petshop`, `complemento_petshop`, `estado_petshop`, `cidade_petshop`, `status_petshop`) VALUES
(2, 'Petshopzoo', 'imagenspetshop0F58EF12-4BBD-44EE-94CA-7ABB1BCEDDC5.jpg', '12333444000122 ', 'everton.ost@gmail.com', '41995575280', '4188888888', '1234', '1234', 'Rua Anneliese G Krigsner', '2607', 'casa 4', 'parana ', '3', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_petshop` (`id_petshop`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `petshops`
--
ALTER TABLE `petshops`
  ADD PRIMARY KEY (`id_petshop`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `petshops`
--
ALTER TABLE `petshops`
  MODIFY `id_petshop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_id_petshop` FOREIGN KEY (`id_petshop`) REFERENCES `petshops` (`id_petshop`);

--
-- Restrições para tabelas `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
