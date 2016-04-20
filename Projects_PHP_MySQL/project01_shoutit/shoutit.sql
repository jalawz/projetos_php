-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/04/2016 às 02:29
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `shoutit`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `shouts`
--

CREATE TABLE IF NOT EXISTS `shouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `shouts`
--

INSERT INTO `shouts` (`id`, `user`, `message`, `time`) VALUES
(1, 'Brad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet rhoncus velit. Phasellus mattis efficitur dignissim.', '11:23:00'),
(2, 'John', 'Nunc nec urna luctus, tristique sapien sit amet, faucibus mauris. Fusce ut nunc consectetur nibh aliquam hendrerit. ', '11:24:00'),
(3, 'Sam', 'Integer interdum congue suscipit. Vestibulum odio neque, pretium sed laoreet a, mollis gravida purus. Ut ac condimentum nunc', '11:30:00'),
(4, 'Jen', 'Integer interdum congue suscipit. Vestibulum odio neque, pretium sed laoreet a, mollis gravida purus. Ut ac condimentum nunc', '11:34:00'),
(5, 'Paulo', 'This is a new Message!', '09:55:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
