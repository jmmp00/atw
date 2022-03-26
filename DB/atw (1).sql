-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2022 às 16:09
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `terms`
--

INSERT INTO `terms` (`id`, `title`, `description`, `timestamp`, `username`) VALUES
(1, 'movie', 'a cinema film.', '2022-03-21 22:59:50', 'olá'),
(2, 'joana', 'amazing person', '2022-03-21 23:04:38', 'juju'),
(3, 'rocha', 'mamador', '2022-03-22 16:08:51', 'juju'),
(4, 'telmo', 'tour eiffel', '2022-03-22 16:31:20', 'juju'),
(5, 'sergio largo', 'largo', '2022-03-22 16:31:46', 'juju'),
(6, 'pixa', 'pixa', '2022-03-22 16:31:54', 'juju'),
(7, 'qweqwe', 'qweqweqeqeqw', '2022-03-22 16:32:12', 'juju'),
(8, 'goskgsf', 'dfsdsdf', '2022-03-22 16:32:19', 'juju'),
(9, 'rfd', 'dsfsfsdf', '2022-03-22 16:33:30', 'juju'),
(10, 'tits', 'boobies', '2022-03-22 21:04:37', 'juju');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `avatar` blob NOT NULL,
  `code` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `username`, `password`, `avatar`, `code`, `token`, `status`) VALUES
(3, 'Telmo', 'Santos', 'telmo_escapaes@hotmail.com', 'jokerino', '$2y$10$RmA/mMIG68YoqKFYfsE94OX0LUCeWgxobzMBE1nDk88ZsQniw0fly', '', '', '', 0),
(6, 'Pedro', 'Rocha', 'pedrofiliperocha2001@gmail.com', 'rock', '$2y$10$x0vMafUEQykT16dXp8qA.uqaOqRtHehL6IfNTomnVJmFGUCC4.J7y', '', '', 'TESTE', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
