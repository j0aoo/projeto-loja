-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Out-2018 às 03:49
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(0, 'Masculino'),
(0, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `assunto` text NOT NULL,
  `tel` varchar(18) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `img_produto`
--

CREATE TABLE `img_produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `img_produto`
--

INSERT INTO `img_produto` (`id_produto`, `nome`) VALUES
(1, '0.27502300 1538797380.jpg'),
(1, 'b72a24bc839b0dacf5632955a2111856.jpg'),
(1, 'MC4yODkwMjQwMCAxNTM4Nzk3Mzgw.jpg'),
(2, '0.85368300 1538797437.jpg'),
(2, 'bf40b8db954f1d9ef10a911e6c749cb8.jpg'),
(2, 'MC44NTk2ODQwMCAxNTM4Nzk3NDM3.jpg'),
(3, '0.89583100 1538797475.jpg'),
(3, '3116a6943ab81e14f1f9b918378c425e.jpg'),
(3, 'MC44OTg4MzEwMCAxNTM4Nzk3NDc1.jpg'),
(4, '0.17658500 1539188474.jpg'),
(4, '01ceaefecbbb254fe3bfde6b0b7113f2.jpg'),
(4, 'MC4yMDQ1ODYwMCAxNTM5MTg4NDc0.jpg'),
(5, '0.36687200 1539188965.jpg'),
(5, '9f38042a3a99c4d776941694083c9cdbjpeg'),
(5, 'MC4zNjg4NzIwMCAxNTM5MTg4OTY1.jpg'),
(6, '0.26617700 1539189086.jpg'),
(6, 'b69d129099ccf408f0c49eda4e48c1fb.jpg'),
(6, 'MC4yNzMxNzgwMCAxNTM5MTg5MDg2.jpg'),
(7, '0.57032800 1539189472.jpg'),
(7, 'd398ff3812ca09046bbfdb137d564620.jpg'),
(7, 'MC41NzMzMjgwMCAxNTM5MTg5NDcy.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_contato` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `inform` text NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `cat`, `nome`, `preco`, `quantidade`, `descricao`, `inform`, `view`) VALUES
(1, 'Feminino', 'Calça Moletom Feminina', 40, 23, 'teste', 'teste', 22),
(2, 'Masculino', 'Camisa Social', 150, 12, 'teset', 'teste', 7),
(3, 'Feminino', 'Moletom Reglan', 230, 54, 'teste', 'teste', 5),
(4, 'Masculino', 'Calça Moletom Masculina', 130, 23, 'teste', 'teste', 2),
(5, 'Masculino', 'Cinto off white', 150, 34, 'teste', 'teste', 10),
(6, 'Masculino', 'Camisa #elenao', 12, 12, 'teste', 'teste', 0),
(7, 'Masculino', 'Capa de chuva amarela', 20, 12, 'teste', 'teste', 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usercomum`
--

CREATE TABLE `usercomum` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `user` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usercomum`
--

INSERT INTO `usercomum` (`id`, `nome`, `user`, `senha`, `email`) VALUES
(1, 'joaozim', 'joaoCarlos', '12345', 'joao_nog12@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_admin`
--

CREATE TABLE `users_admin` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url_img` varchar(36) NOT NULL,
  `nivel` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_admin`
--

INSERT INTO `users_admin` (`id`, `nome`, `usuario`, `senha`, `email`, `url_img`, `nivel`) VALUES
(1, 'João Carlos', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'dk.joao12@gmail.com', 'perfil.png', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercomum`
--
ALTER TABLE `usercomum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usercomum`
--
ALTER TABLE `usercomum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
